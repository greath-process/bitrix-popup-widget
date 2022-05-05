<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["PHONE_REGISTRATION"])
{
	CJSCore::Init('phone_auth');
}
?>

<div class="auth">
    <div class="auth-form">
        <img src="/assets/img/auth/a-logo.svg">
        <div class="site-name">
            RichLink
        </div>

		<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">
		    <label style="text-align: center;color: red;">
				<?
				ShowMessage($arParams["~AUTH_RESULT"]);
				?>
		    </label>
		    <?if($arResult["SHOW_FORM"]):?>

				<?if ($arResult["BACKURL"] <> ''): ?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<? endif ?>
				<input type="hidden" name="AUTH_FORM" value="Y">
				<input type="hidden" name="TYPE" value="CHANGE_PWD">

				<div class="auth-form__name"><?=GetMessage("AUTH_CHANGE_PASSWORD")?></div>
			    <label>
			        *<?=GetMessage("AUTH_LOGIN")?>
			    </label>
			    <div class="input">
			        <input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" />
			    </div>

				<?
					if($arResult["USE_PASSWORD"]):
				?>
				    <label>
				        *<?echo GetMessage("sys_auth_changr_pass_current_pass")?>
				    </label>
				    <div class="input">
				        <input type="password" name="USER_CURRENT_PASSWORD" maxlength="255" value="<?=$arResult["USER_CURRENT_PASSWORD"]?>" autocomplete="new-password" />
				    </div>
				<?
					else:
				?>
				    <label>
				        *<?=GetMessage("AUTH_CHECKWORD")?>
				    </label>
				    <div class="input">
				        <input type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" autocomplete="off" />
				    </div>

				<?
					endif
				?>



			    <label>
			        *<?=GetMessage("AUTH_NEW_PASSWORD_REQ")?>
			    </label>
			    <div class="input">
			        <input type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" autocomplete="new-password" />
			    </div>

			    <label>
			        *<?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?>
			    </label>
			    <div class="input">
			        <input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" autocomplete="new-password" />
			    </div>


			    <button type="submit">
			        <?=GetMessage("AUTH_CHANGE")?>
			    </button>


				<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
				<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

			<?endif?>

		    <div class="uge">
		        <a href="<?=$arResult["AUTH_AUTH_URL"]?>" class="link"> <?=GetMessage("AUTH_AUTH")?></a>
		    </div>
		    
		</form>

    </div>
</div>