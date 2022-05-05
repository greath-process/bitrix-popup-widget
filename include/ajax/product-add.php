<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['siteid'])&&!empty($_POST['siteid'])&&isset($_POST['prod-url'])&&!empty($_POST['prod-url'])&&(!empty($_POST['prod-name'])&&$_POST['prod-name']!='Название товара')){

    CModule::IncludeModule('iblock'); 
    $el = new CIBlockElement;

    $PROP = array();
    $PROP['URL'] = $_POST['prod-url'];
    $PROP['SITE'] = $_POST['siteid'];


    $arLoadProductArray = Array(
      "IBLOCK_ID"      => 5,            //id нужного инфоблока
      "PROPERTY_VALUES"=> $PROP,        //массив свойств
      "NAME"           => $_POST['prod-name'], //название элемента
      "ACTIVE"         => "Y",          //активность элемента
    );

    $PRODUCT_ID = $el->Add($arLoadProductArray);

    if(!empty($_POST['prod'])){

      foreach($_POST['prod'] as $key=>$prod){

        $el1 = new CIBlockElement;

        $PROP1 = array();
        $PROP1['PRODUCT'] = $PRODUCT_ID;
        $PROP1['MARKET'] = $key;
        $PROP1['MARKET_URL'] = $prod['url'];
        $PROP1['MARKET_PRICE'] = $prod['price'];

        $arLoadProductArray1 = Array(
          "IBLOCK_ID"      => 6,            //id нужного инфоблока
          "PROPERTY_VALUES"=> $PROP1,        //массив свойств
          "NAME"           => $_POST['prod-name'], //название элемента
          "ACTIVE"         => "Y",          //активность элемента
        );

        $PRODUCT_ID1 = $el1->Add($arLoadProductArray1);

      }

    }

    echo json_encode(array('type' => 'success', 'mess'=>'Товар успешно добавлен.'));
    
}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Название и ссылка обязательны к заполнению.'));
}

?>