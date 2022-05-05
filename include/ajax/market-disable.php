<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['marketid'])&&!empty($_POST['marketid']) && isset($_POST['check'])&&!empty($_POST['check'])){

    CModule::IncludeModule('iblock'); 

    if($_POST['check']=='enable'){
        CIBlockElement::SetPropertyValuesEx($_POST['marketid'], false, array("ACT" => "1"));
        echo json_encode(array('type' => 'success', 'mess' => 'enable'));
    }else{
        CIBlockElement::SetPropertyValuesEx($_POST['marketid'], false, array("ACT" => false));
        echo json_encode(array('type' => 'success', 'mess' => 'disable'));
    }

}else{
    echo json_encode(array('type' => 'error'));
}
?>