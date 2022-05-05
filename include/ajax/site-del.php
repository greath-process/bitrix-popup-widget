<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['siteid'])&&!empty($_POST['siteid'])){

    CModule::IncludeModule('iblock'); 

    if(CIBlockElement::Delete($_POST['siteid'])){
      echo json_encode(array('type' => 'success', 'mess'=>'Сайт удален.'));
    }
    
}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Ошибка.'));
}

?>