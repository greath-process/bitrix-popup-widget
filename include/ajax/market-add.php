<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['market-url'])&&!empty($_POST['market-url'])&&isset($_POST['site-id'])&&!empty($_POST['site-id'])&&(!empty($_POST['market-name'])&&$_POST['market-name']!='Название')){

    CModule::IncludeModule('iblock'); 
    $el = new CIBlockElement;

    $PROP = array();
    $PROP['URL'] = $_POST["market-url"];
    $PROP['SITE'] = $_POST["site-id"];
    if($_FILES['market-logo']){
        $fid =  CFile::SaveFile($_FILES['market-logo'], "market");
        $PROP['LOGO'] = $fid;
    }

    $arLoadProductArray = Array(
      "IBLOCK_ID"      => 3,            //id нужного инфоблока
      "PROPERTY_VALUES"=> $PROP,        //массив свойств
      "NAME"           => $_POST['market-name'], //название элемента
      "ACTIVE"         => "Y",          //активность элемента
    );

    $PRODUCT_ID = $el->Add($arLoadProductArray);

    echo json_encode(array('type' => 'success', 'mess'=>'Маркетплейс успешно добавлен.'));
}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Название и ссылка обязательны к заполнению.'));
}

?>