<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


		
		<?//here you can place your own messages
			switch($arResult["MESSAGE_CODE"])
			{
			case "E01":
				?><? //When user not found
				break;
			case "E02":
				?><? //User was successfully authorized after confirmation
				break;
			case "E03":
				?><? //User already confirm his registration
				break;
			case "E04":
				?><? //Missed confirmation code
				break;
			case "E05":
				?><? //Confirmation code provided does not match stored one
				break;
			case "E06":
				?><? //Confirmation was successfull
				break;
			case "E07":
				?><? //Some error occured during confirmation
				break;
			}
		?>
		<?if($arResult["SHOW_FORM"]):?>
			<div class="auth">
			    <div class="auth-form">
			        <img src="/assets/img/auth/a-logo.svg">
			        <div class="site-name">
			            RichLink
			        </div>
					<form method="post" action="<?echo $arResult["FORM_ACTION"]?>">
		                <label style="text-align: center;color: red;">
		                    <?echo $arResult["MESSAGE_TEXT"]?>
		                </label>
		                <div class="auth-form__name"><?$APPLICATION->ShowTitle();?></div>
						<label>
		                    E-mail:
		                </label>
		                <div class="input">
		                    <input type="text" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17">
		                </div>

						<label>
		                    <?echo GetMessage("CT_BSAC_CONFIRM_CODE")?>:
		                </label>
		                <div class="input">
		                    <input type="text" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17">
		                </div>

		                <button type="submit">
		                    <?echo GetMessage("CT_BSAC_CONFIRM")?>
		                </button>

						<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
					</form>
			    </div>
			</div>
		<?elseif(!$USER->IsAuthorized()):?>
			<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array("MESSAGE_TEXT" => $arResult["MESSAGE_TEXT"]));?>
		<?endif?>
