<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>
	<li><span><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/menu2.php"), false);?></span></li>
	
	<?
	foreach($arResult as $arItem):
		if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
			continue;
	?>
		
		<?if($arItem["SELECTED"]):?>
			<li><a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>
		
	<?endforeach?>

</ul>
<?endif?>