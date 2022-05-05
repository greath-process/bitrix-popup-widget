<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['site-url'])&&!empty($_POST['site-url'])){

    CModule::IncludeModule('iblock'); 

    $arSelect = Array("ID", "NAME", "PROPERTY_USER");
    $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "NAME"=>$_POST['site-url'], "PROPERTY_USER"=>$USER->GetID());
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        echo json_encode(array('type' => 'error', 'mess'=>'Этот сайт уже добавлен.'));
    }
    else
    {
        $el = new CIBlockElement;
        $PROP = array();
        global $USER;
        $PROP['USER'] = $USER->GetID();
        $arLoadProductArray = Array(
            "IBLOCK_ID"      => 4,            //id нужного инфоблока
            "PROPERTY_VALUES"=> $PROP,        //массив свойств
            "NAME"           => $_POST['site-url'], //название элемента
            "ACTIVE"         => "Y",          //активность элемента
        );
        $PRODUCT_ID = $el->Add($arLoadProductArray);

        // копирование маркетплейсов и привязка к сайту
        $already_done = [283,284,285,286,287];
        foreach ($already_done as $key => $value) 
        {
            $resource = CIBlockElement::GetByID($value);
            if ($ob = $resource->GetNextElement())
            {
                $arFields = $ob->GetFields();
                $arFields['PROPERTIES'] = $ob->GetProperties();
                
                $arFieldsCopy = [
                    "NAME" => $arFields['NAME'],
                    "IBLOCK_ID" => 3,
                    "SORT" => $arFields['SORT'],
                    "ACTIVE" => "Y",
                ];

                $arFieldsCopy['PROPERTY_VALUES'] = array();
                foreach ($arFields['PROPERTIES'] as $property)
                {
                    if ($property['PROPERTY_TYPE']=='L')
                    {
                        $arFieldsCopy['PROPERTY_VALUES'][$property['CODE']]['VALUE_ENUM_ID'] = $property['VALUE_ENUM_ID'];
                    }
                    else if($property['PROPERTY_TYPE']=='F')
                    {
                        $arFieldsCopy['PROPERTY_VALUES'][$property['CODE']] = CFile::CopyFile($property['VALUE']);
                    }
                    else
                        $arFieldsCopy['PROPERTY_VALUES'][$property['CODE']] = $property['VALUE'];
                }
                $arFieldsCopy['PROPERTY_VALUES']['SITE'] = $PRODUCT_ID;
                $el = new CIBlockElement();
                $NEW_ID = $el->Add($arFieldsCopy);
            }
        }
        echo json_encode(array('type' => 'success', 'mess'=>'Сайт успешно добавлен.'));
    }
}
else
{
    echo json_encode(array('type' => 'error', 'mess'=>'Ссылка обязательна к заполнению.'));
}
?>