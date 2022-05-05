<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Установка и внешний вид");
?>
<?$APPLICATION->IncludeComponent(
	"richlink:wiget", 
	".default", 
	array(),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>