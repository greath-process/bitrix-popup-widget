<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


CModule::IncludeModule('iblock');
global $USER;
$arSelect = Array("ID", "NAME", "PROPERTY_USER");
$arFilter = Array("IBLOCK_ID"=>4, "ID"=>$_POST['site-id'], "ACTIVE"=>"Y", "PROPERTY_USER"=>$USER->GetID());
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
if($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    if(isset($_POST['site-url'])&&!empty($_POST['site-url'])){
       
        $el = new CIBlockElement;

        $arLoadProductArray = Array(
          "NAME"           => $_POST['site-url'],
        );

        $res = $el->Update($_POST['site-id'], $arLoadProductArray);

        echo json_encode(array('type' => 'success', 'mess'=>'Сайт успешно изменен.'));
    }
    else{
        echo json_encode(array('type' => 'error', 'mess'=>'Ссылка обязательна к заполнению.'));
    }
}else{
    echo json_encode(array('type' => 'error', 'mess'=>'Ошибка доступа.'));
}

?>