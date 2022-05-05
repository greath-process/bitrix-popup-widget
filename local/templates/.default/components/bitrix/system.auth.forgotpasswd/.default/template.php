<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="auth">
    <div class="auth-form">
        <img src="/assets/img/auth/a-logo.svg">
        <div class="site-name">
            RichLink
        </div>
		<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
			<?
			if ($arResult["BACKURL"] <> '')
			{
			?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?
			}
			?>
			<input type="hidden" name="AUTH_FORM" value="Y">
			<input type="hidden" name="TYPE" value="SEND_PWD">
			<p style="text-align: center;margin-bottom: 6px;"><?echo GetMessage("sys_forgot_pass_label")?></p>
		    <label>
		        Логин (E-mail)
		    </label>
		    <div class="input">
		        <input type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" />
		        <input type="hidden" name="USER_EMAIL" />
		    </div>
		    <button type="submit">
		        <?=GetMessage("AUTH_SEND")?>
		    </button>
			<label style="text-align: center;color: red;">
				<p>
					<?
					ShowMessage($arParams["~AUTH_RESULT"]);
					?>
				</p>
				<br>
			</label>
		    <div class="uge">
		        <a href="<?=$arResult["AUTH_AUTH_URL"]?>" class="link"> <?=GetMessage("AUTH_AUTH")?></a>
		    </div>
		</form>
		<script type="text/javascript">
			document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
			document.bform.USER_LOGIN.focus();
		</script>
    </div>
</div>