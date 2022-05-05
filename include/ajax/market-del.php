<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['marketid'])&&!empty($_POST['marketid'])){

    CModule::IncludeModule('iblock'); 

    if(CIBlockElement::Delete($_POST['marketid'])){
      echo json_encode(array('type' => 'success', 'mess'=>'Сайт удален.'));
    }
    
}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Ошибка.'));
}

?>