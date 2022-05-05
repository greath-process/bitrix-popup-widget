<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование сайта");
?>
<?
use \Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs('/assets/js/site-edit.js');
?>


<?
global $USER;
if($_GET['id']>0){
    $arSelect = Array("ID", "NAME", "PROPERTY_USER");
    $arFilter = Array("IBLOCK_ID"=>4, "ID"=>$_GET['id'], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        ?>

        <?if($arFields['PROPERTY_USER_VALUE']==$USER->GetID()):?>
            <form method="post" id="site-edit" class="addsite"> 
                <input type="hidden" name="site-id" value="<?=$_GET['id']?>">
                <label>
                    Ссылка на сайт
                </label>
                <div class="site-input">
                    <input type="text" name="site-url" value="<?=$arFields['NAME']?>">
                </div>
                <button class="addsite__save btn-red">Сохранить изменения</button>
                <div id="site-mess"></div>
            </form>
        <?else:?>
            Ошибка доступа.
        <?endif;?>
        <?
    }
}

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>