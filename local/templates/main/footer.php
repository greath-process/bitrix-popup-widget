	<?
	use \Bitrix\Main\Page\Asset;
	?>
	<?
    //global $USER;
    //if($USER->IsAuthorized()):
    if($APPLICATION->GetCurPage()!='/auth/' && $APPLICATION->GetCurPage()!='/register/'):?>
	        </div>
	    </div>
    <?endif;?>

</body>
<?if($APPLICATION->GetCurPage()!='/auth/' && $APPLICATION->GetCurPage()!='/register/'):?>

	<?
	Asset::getInstance()->addJs('/assets/libs/jquery/jquery.min.js');
	Asset::getInstance()->addJs('/assets/libs/niseSelect/nice-select.min.js');
	Asset::getInstance()->addJs('/assets/js/main.js');
	?>

<?else:?>

	<?
	Asset::getInstance()->addJs('/assets/libs/jquery/jquery.min.js');
	Asset::getInstance()->addJs('/assets/js/auth-register.js');
	?>
	
<?endif;?>

<?
Asset::getInstance()->addJs('/assets/js/custom.js');
?>

</html>