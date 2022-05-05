<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Аналитика");
?>

<script async src="https://richlink.ru/assets/js/widget.js"></script>

<div data-widget-id="60b0af13199bb"></div>

<?if($_GET['widget'] == 'widget'):?>
widget
<script type="text/javascript">
$(document).ready(function() {
	Widget_initialization({
		id: "60b0af13199bb", 
		type: "v2", 
		button1: "#2B2B2C", 
		arrow1: "#ffffff", 
		button2: "#e5e5e5", 
		arrow2: "#aba9a9", 
		text: "Это товар на маркетплейсах", 
		logo: "", 
		round: "on", 
		dark: "on", 
	});
});
</script>
<?elseif($_GET['widget'] == 'banner'):?>
	banner
<script type="text/javascript">
$(document).ready(function() {
	Widget_initialization({
		id: "60b0af13199bb", 
		type: "v3", 
		text: "Закажи по самой выгодной цене", 
		size: "19", 
		logo: "", 
		button1: "#005CFF", 
		arrow1: "#ffffff", 
		button2: "#e5e5e5", 
		arrow2: "#aba9a9", 
		round: "on", 
		dark: "on", 
		timer: "2", 
	});
});
</script>
<?elseif($_GET['widget'] == 'button'):?>
<span id="popup">111111111111</span>
	button
<script type="text/javascript">
$(document).ready(function() {
	Widget_initialization({
		id: "60b0af13199bb", 
		type: "v1", 
		anchor: "#popup", 
		event: "", 
		button1: "#005CFF", 
		arrow1: "#ffffff", 
		button2: "#e5e5e5", 
		arrow2: "#aba9a9", 
		round: "on", 
		dark: "on", 
		text: "Купить", 
		size: "19", 
		back_button: "#2B2B2C", 
		color_text: "#ffffff", 
	});
});
</script>
<?endif?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>