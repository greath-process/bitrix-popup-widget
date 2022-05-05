<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['siteid'])&&!empty($_POST['siteid'])&&isset($_POST['prod-id'])&&!empty($_POST['prod-id'])&&isset($_POST['prod-url'])&&!empty($_POST['prod-url'])&&(!empty($_POST['prod-name'])&&$_POST['prod-name']!='Название товара')){

    CModule::IncludeModule('iblock'); 

    CIBlockElement::SetPropertyValuesEx($_POST['prod-id'], false, array("URL" => $_POST['prod-url']));

    $el = new CIBlockElement;
    $res = $el->Update($_POST['prod-id'], array("NAME" => $_POST['prod-name']));

    foreach($_POST['prod'] as $key=>$prod){

      $arSelectQ = Array("ID", "NAME");
      $arFilterQ = Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", 'PROPERTY_MARKET'=>$key, 'PROPERTY_PRODUCT'=>$_POST['prod-id']);
      $resQ = CIBlockElement::GetList(Array(), $arFilterQ, false, false, $arSelectQ);
      if($obQ = $resQ->GetNextElement())
      {
        $arFields = $obQ->GetFields();

        CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, array("MARKET_URL" => $prod['url']));
        CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, array("MARKET_PRICE" => $prod['price']));

      }else{

        $el1 = new CIBlockElement;

        $PROP1 = array();
        $PROP1['PRODUCT'] = $_POST['prod-id'];
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

    echo json_encode(array('type' => 'success', 'mess'=>'Товар успешно изменен.'));
    
}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Название и ссылка обязательны к заполнению.'));
}

?>