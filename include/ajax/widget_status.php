<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Application;
$request = Application::getInstance()->getContext()->getRequest();
$id = $request->get("id");
$status = $request["status"];
if(empty($id) && !empty($_POST['id'])) $id = $_POST['id'];
if(empty($status) && !empty($_POST['status'])) $status = $_POST['status'];

if(!empty($id))
{
    // меняем статус на "не работает"
    \Bitrix\Main\Loader::includeModule('iblock');
	$el = new CIBlockElement;
	$PROP = array();

    $dbItem = \Bitrix\Iblock\ElementTable::getList(array(
        'select' => array('ID', 'IBLOCK_ID'),
        'filter' => array('CODE' => $id),
    ));
    if ($arItem = $dbItem->fetch()) 
    {
        $dbProperty = \CIBlockElement::getProperty($arItem['IBLOCK_ID'], $arItem['ID'], array("sort", "asc"), array());
        while ($arProperty = $dbProperty->GetNext()) 
        {
            if(!empty($arProperty['VALUE']))
            {
                $PROP[ $arProperty['ID'] ] = $arProperty['VALUE'];
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
                    if($arEnum['VALUE'] == $arProperty['VALUE']) $PROP[ $arProperty['ID'] ] = $arEnum['ID'];
                    if($arEnum['XML_ID'] == 'y') $y = $arEnum['ID'];
                    if($arEnum['XML_ID'] == 'n') $n = $arEnum['ID'];
                    if($arEnum['XML_ID'] == 'none') $none = $arEnum['ID'];
                }
            }
        }
        $new_status = (empty($status)) ? $n : $y;
        $PROP[13] = $new_status;
        $PRODUCT_ID = $arItem['ID'];
    }
    if(!empty($PROP))
    {
        $arLoadProductArray = Array(
            "PROPERTY_VALUES"=> $PROP,
        );
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
    }
}
?>