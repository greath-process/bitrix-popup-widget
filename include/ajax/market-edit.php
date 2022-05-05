<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


CModule::IncludeModule('iblock');
global $USER;
$arSelect = Array("ID", "NAME", "PROPERTY_SITE");
$arFilter = Array("IBLOCK_ID"=>3, "ID"=>$_POST['market-id'], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
if($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arSelectMarket = Array("ID", "NAME", "PROPERTY_USER");
    $arFilterMarket = Array("IBLOCK_ID"=>4, "ID"=>$arFields['PROPERTY_SITE_VALUE'], "ACTIVE"=>"Y", "PROPERTY_USER"=>$USER->GetID());
    $resMarket = CIBlockElement::GetList(Array(), $arFilterMarket, false, false, $arSelectMarket);
    if($obMarket = $resMarket->GetNextElement())
    {
        $arFieldsMarket = $obMarket->GetFields();

        if(isset($_POST['market-url'])&&!empty($_POST['market-url'])&&isset($_POST['site-id'])&&!empty($_POST['site-id'])&&(!empty($_POST['market-name'])&&$_POST['market-name']!='Название')){

            $el = new CIBlockElement;

            $PROP = array();
            $PROP['URL'] = $_POST["market-url"];
            $PROP['SITE'] = $_POST["site-id"];
            if($_FILES['market-logo']){
                $fid =  CFile::SaveFile($_FILES['market-logo'], "market");
                $PROP['LOGO'] = $fid;
            }
            if($_POST['market-act']=='Y'){
                $PROP['ACT'] = '1';
            }
            

            $arLoadProductArray = Array(
                "NAME"           => $_POST['market-name'],
                "PROPERTY_VALUES"=> $PROP
            );

            $res = $el->Update($_POST['market-id'], $arLoadProductArray);

            echo json_encode(array('type' => 'success', 'mess'=>'Маркетплейс успешно изменен.'));
        }
        else{
            echo json_encode(array('type' => 'error', 'mess'=>'Название и ссылка обязательны к заполнению.'));
        }
    }else{
        echo json_encode(array('type' => 'error', 'mess'=>'Ошибка доступа.'));
    }

}else{
    echo json_encode(array('type' => 'error', 'mess'=>'Ошибка.'));
}

?>