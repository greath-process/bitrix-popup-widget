<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Sale,
    Bitrix\Main\Loader,
    Bitrix\Main\Application;

class NewWidget extends CBitrixComponent
{
    private function checkModules()
    {
        if (!Loader::includeModule('iblock')) {
            throw new \Exception('Не загружен модуль iblock');
        }
        return true;
    }
    // проверка статуса виджета
    public function CheckStatus($site_id)
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $update = $request->get("update");
        // ловим проверку
        if($update == 'status' && !empty($site_id))
        {
            $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_URL");
            $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "PROPERTY_SITE"=>$site_id);
            // ищем товары к сайту. несколько потому что не у всех заполнены могут быть страницы
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
            while($ob = $res->Fetch())
            {
                // если есть ссылка на товар
                if(!empty($ob['PROPERTY_URL_VALUE']))
                {
                    // собираем данные для обновления статуса
                    $PROP = array();
                    $dbItem = \Bitrix\Iblock\ElementTable::getList(array(
                        'select' => array('ID', 'IBLOCK_ID'),
                        'filter' => array('CODE' => $site_id),
                    ));
                    if ($arItem = $dbItem->fetch()) 
                    {
                        $dbProperty = \CIBlockElement::getProperty($arItem['IBLOCK_ID'], $arItem['ID'], array("sort", "asc"), array());
                        while ($arProperty = $dbProperty->GetNext()) 
                        {
                            if(!empty($arProperty['VALUE']))
                            {
                                $PROP[ $arProperty['CODE'] ] = $arProperty['VALUE'];
                            }
                            if($arProperty['PROPERTY_TYPE'] == 'L')
                            {
                                $dbEnums = \Bitrix\Iblock\PropertyEnumerationTable::getList(array(
                                    'order' => array('SORT' => 'asc'),
                                    'select' => array('*'),
                                    'filter' => array('PROPERTY_ID' => $arProperty['ID'])
                                ));
                                while($arEnum = $dbEnums->fetch()) 
                                {
                                    if($arEnum['VALUE'] == $arProperty['VALUE']) $PROP[ $arProperty['CODE'] ] = $arEnum['ID'];
                                    // собираем ид статусов
                                    if($arProperty['CODE'] == 'STATUS')
                                    {
                                        if($arEnum['XML_ID'] == 'y') $y = $arEnum['ID'];
                                        if($arEnum['XML_ID'] == 'n') $n = $arEnum['ID'];
                                        if($arEnum['XML_ID'] == 'none') $none = $arEnum['ID'];
                                    }
                                }
                            }
                        }
                    }
                    // запрос на страницу товара и получение его содержимого
                    $cookie = tmpfile();
                    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31' ;
                    $ch = curl_init($ob['PROPERTY_URL_VALUE']);
                    $options = array(
                        CURLOPT_CONNECTTIMEOUT => 20 , 
                        CURLOPT_USERAGENT => $userAgent,
                        CURLOPT_AUTOREFERER => true,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_COOKIEFILE => $cookie,
                        CURLOPT_COOKIEJAR => $cookie ,
                        CURLOPT_SSL_VERIFYPEER => 0 ,
                        CURLOPT_SSL_VERIFYHOST => 0
                    );
                    curl_setopt_array($ch, $options);
                    $kl = curl_exec($ch);
                    curl_close($ch);
                    // проверка, ставим статус "не установлено"
                    $new_status = $none;
                    // если есть скрипт инициализации
                    if (strpos($kl,'<script async src="https://richlink.ru/assets/js/widget.js"></script>') !== false)
                        $new_status = $n; // скрипт есть, ставим что есть, но ещё не работает
                    if (strpos($kl,'<script async src="https://richlink.ru/assets/js/widget.js"></script>') !== false && strpos($kl,'data-widget-id') !== false)
                        $new_status = $y; // виджет есть - работает

                    // обновление статуса
                    if(!empty($PROP))
                    {
                        $PROP['STATUS'] = $new_status;
                        $PROP['DATE'] = date("d.m.Y");
                        $el = new CIBlockElement;
                        $arLoadProductArray = Array(
                            "PROPERTY_VALUES"=> $PROP,
                        );
                        $res = $el->Update($site_id, $arLoadProductArray);
                        break;
                    }
                }
            }
        }
        return $update;
    }

    // создаем ид виджета если нет
    public function CreateID($PRODUCT_ID)
    {
        $el = new CIBlockElement;
        $name = uniqid();
        $arLoadProductArray = Array(
            "CODE" => $name,
        );
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
        return $name;
    }
    // ид виджета
    public function GetResult()
    {
        global $_SESSION;
        $dbItem = \Bitrix\Iblock\ElementTable::getList(array(
            'select' => array('CODE', 'ID', 'IBLOCK_ID'),
            'filter' => array('ID' => $_SESSION['USER_SITE_ID']),
        ));
        if ($arItem = $dbItem->fetch()) 
        {
            $this->CheckStatus($arItem['ID']);
            $result['WIDGET_ID'] = $arItem['CODE'];
            $dbProperty = \CIBlockElement::getProperty($arItem['IBLOCK_ID'], $arItem['ID'], array("sort", "asc"), array());
            while ($arProperty = $dbProperty->GetNext()) 
            {
                if ($arProperty['CODE'] == 'STATUS') 
                    $result['STATUS'] = $arProperty['VALUE_XML_ID'];
                if ($arProperty['CODE'] == 'DATE') 
                    $result['DATE'] = $arProperty['VALUE'];
            }
        }
        if(empty($result['WIDGET_ID']))
        {
            $result['WIDGET_ID'] = $this->CreateID($_SESSION['USER_SITE_ID']);
        }
        return $result;
    }
    
    public function onPrepareComponentParams($arParams)
    {
        $result = array(
            "CACHE_TYPE" => 'N',
            "CACHE_TIME" => 36000000,
        );
        return $result;
    }

    public function executeComponent()
    {
        if($this->startResultCache())
        {
            $this->checkModules();
            $this->arResult = $this->GetResult();
            $this->includeComponentTemplate();
        }
        return $this->arResult;
    }
}?>