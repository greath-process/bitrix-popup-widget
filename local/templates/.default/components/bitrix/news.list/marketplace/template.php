<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
use \Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs('/assets/js/market-disable.js');
?>
<div class="market">
    <div class="market__info">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 7C9.73478 7 9.48043 7.10536 9.29289 7.29289C9.10536 7.48043 9 7.73478 9 8V11C9 11.2652 9.10536 11.5196 9.29289 11.7071C9.48043 11.8946 9.73478 12 10 12C10.2652 12 10.5196 11.8946 10.7071 11.7071C10.8946 11.5196 11 11.2652 11 11V8C11 7.73478 10.8946 7.48043 10.7071 7.29289C10.5196 7.10536 10.2652 7 10 7ZM17 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V13C0 13.7956 0.316071 14.5587 0.87868 15.1213C1.44129 15.6839 2.20435 16 3 16H14.59L18.29 19.71C18.3834 19.8027 18.4943 19.876 18.6161 19.9258C18.7379 19.9755 18.8684 20.0008 19 20C19.1312 20.0034 19.2613 19.976 19.38 19.92C19.5626 19.845 19.7189 19.7176 19.8293 19.5539C19.9396 19.3901 19.999 19.1974 20 19V3C20 2.20435 19.6839 1.44129 19.1213 0.87868C18.5587 0.316071 17.7956 0 17 0ZM18 16.59L15.71 14.29C15.6166 14.1973 15.5057 14.124 15.3839 14.0742C15.2621 14.0245 15.1316 13.9992 15 14H3C2.73478 14 2.48043 13.8946 2.29289 13.7071C2.10536 13.5196 2 13.2652 2 13V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H17C17.2652 2 17.5196 2.10536 17.7071 2.29289C17.8946 2.48043 18 2.73478 18 3V16.59ZM10 4C9.80222 4 9.60888 4.05865 9.44443 4.16853C9.27998 4.27841 9.15181 4.43459 9.07612 4.61732C9.00043 4.80004 8.98063 5.00111 9.01921 5.19509C9.0578 5.38907 9.15304 5.56725 9.29289 5.70711C9.43275 5.84696 9.61093 5.9422 9.80491 5.98079C9.99889 6.01937 10.2 5.99957 10.3827 5.92388C10.5654 5.84819 10.7216 5.72002 10.8315 5.55557C10.9414 5.39112 11 5.19778 11 5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4Z" fill="#383838"/>
        </svg> Выберите маркетплейсы, на которых представлен ваш товар, чтобы добавить эти поля в каталог товаров.
    </div>

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
	    <div class="market__item<?if($arItem['PROPERTIES']['ACT']['VALUE']!='Y'):?> not-active<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	        <div class="market__row">
	            <div class="market__left">
	            	<?if($arItem['PROPERTIES']['LOGO']['VALUE']):?>
		                <div class="market__img">
							<a href="/market/market-edit/?id=<?=$arItem['ID']?>"><img src="<?=CFile::GetPath($arItem['PROPERTIES']['LOGO']['VALUE']);?>" alt="<?=$arItem['NAME']?>"></a>
		                </div>
		            <?else:?>
		                <div class="market__img">
		                    <a href="/market/market-edit/?id=<?=$arItem['ID']?>"><img src="/assets/img/market/file.jpg" alt="<?=$arItem['NAME']?>"></a>
		                </div>
	                <?endif;?>
	                <div class="checkbox-inline">
	                    <input type="checkbox"<?if($arItem['PROPERTIES']['ACT']['VALUE']=='Y'):?> checked="checked"<?endif;?> id="check<?=$arItem['ID']?>" class="market-list" data-elementid="<?=$arItem['ID']?>">
	                    <label for="check<?=$arItem['ID']?>"></label>
	                </div>
	            </div>
	            <div class="market__right">
	                <button type="button" class="btn-api fiolet">
	                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path d="M10.1098 13.39L6.22984 17.27C5.76007 17.7233 5.1327 17.9767 4.47984 17.9767C3.82698 17.9767 3.1996 17.7233 2.72984 17.27C2.49944 17.0405 2.31663 16.7678 2.19189 16.4675C2.06715 16.1671 2.00294 15.8452 2.00294 15.52C2.00294 15.1948 2.06715 14.8728 2.19189 14.5725C2.31663 14.2722 2.49944 13.9995 2.72984 13.77L6.60984 9.88997C6.79814 9.70167 6.90393 9.44627 6.90393 9.17997C6.90393 8.91367 6.79814 8.65828 6.60984 8.46997C6.42153 8.28167 6.16614 8.17588 5.89984 8.17588C5.63353 8.17588 5.37814 8.28167 5.18984 8.46997L1.30984 12.36C0.528193 13.2108 0.105457 14.3306 0.129911 15.4857C0.154365 16.6408 0.624118 17.7418 1.44107 18.5587C2.25802 19.3757 3.359 19.8454 4.51408 19.8699C5.66917 19.8944 6.78904 19.4716 7.63984 18.69L11.5298 14.81C11.7181 14.6217 11.8239 14.3663 11.8239 14.1C11.8239 13.8337 11.7181 13.5783 11.5298 13.39C11.3415 13.2017 11.0861 13.0959 10.8198 13.0959C10.5535 13.0959 10.2981 13.2017 10.1098 13.39ZM18.6898 1.30997C17.8486 0.47398 16.7108 0.00476074 15.5248 0.00476074C14.3389 0.00476074 13.2011 0.47398 12.3598 1.30997L8.46984 5.18997C8.3766 5.28321 8.30264 5.3939 8.25218 5.51572C8.20172 5.63755 8.17575 5.76811 8.17575 5.89997C8.17575 6.03183 8.20172 6.1624 8.25218 6.28422C8.30264 6.40604 8.3766 6.51673 8.46984 6.60997C8.56308 6.70321 8.67377 6.77717 8.79559 6.82763C8.91741 6.87809 9.04798 6.90406 9.17984 6.90406C9.3117 6.90406 9.44226 6.87809 9.56409 6.82763C9.68591 6.77717 9.7966 6.70321 9.88984 6.60997L13.7698 2.72997C14.2396 2.2766 14.867 2.02323 15.5198 2.02323C16.1727 2.02323 16.8001 2.2766 17.2698 2.72997C17.5002 2.95946 17.683 3.23218 17.8078 3.53249C17.9325 3.8328 17.9967 4.15479 17.9967 4.47997C17.9967 4.80516 17.9325 5.12714 17.8078 5.42745C17.683 5.72776 17.5002 6.00049 17.2698 6.22997L13.3898 10.11C13.2961 10.2029 13.2217 10.3135 13.1709 10.4354C13.1202 10.5573 13.094 10.688 13.094 10.82C13.094 10.952 13.1202 11.0827 13.1709 11.2045C13.2217 11.3264 13.2961 11.437 13.3898 11.53C13.4828 11.6237 13.5934 11.6981 13.7153 11.7489C13.8371 11.7996 13.9678 11.8258 14.0998 11.8258C14.2318 11.8258 14.3626 11.7996 14.4844 11.7489C14.6063 11.6981 14.7169 11.6237 14.8098 11.53L18.6898 7.63997C19.5258 6.79875 19.995 5.66095 19.995 4.47497C19.995 3.289 19.5258 2.15119 18.6898 1.30997ZM6.82984 13.17C6.92328 13.2627 7.03409 13.336 7.15593 13.3857C7.27777 13.4355 7.40823 13.4607 7.53984 13.46C7.67144 13.4607 7.80191 13.4355 7.92374 13.3857C8.04558 13.336 8.1564 13.2627 8.24984 13.17L13.1698 8.24997C13.3581 8.06167 13.4639 7.80627 13.4639 7.53997C13.4639 7.27367 13.3581 7.01828 13.1698 6.82997C12.9815 6.64167 12.7261 6.53588 12.4598 6.53588C12.1935 6.53588 11.9381 6.64167 11.7498 6.82997L6.82984 11.75C6.73611 11.8429 6.66171 11.9535 6.61095 12.0754C6.56018 12.1973 6.53404 12.328 6.53404 12.46C6.53404 12.592 6.56018 12.7227 6.61095 12.8445C6.66171 12.9664 6.73611 13.077 6.82984 13.17Z" fill="#884594"/>
	                        </svg>
	                        
	                    Подключить по API
	                </button>
					<button type="button" class="btn-del red market-del" data-marketid="<?=$arItem['ID']?>">
						Удалить маркетплейс
					</button>
	                <button type="button" class="btn-red btn-save">Сохранить</button>
	            </div>
	        </div>
	        <div class="market__wrap">
	            <label>Подключение по API</label>
	            <div class="input">
	                <input type="text">
	            </div>
	            <label>Логин</label>
	            <div class="input">
	                <input type="text">
	            </div>
	            <label>Пароль</label>
	            <div class="input">
	                <input type="password">
	            </div>
	        </div>
	    </div>
	<?endforeach;?>

    <div class="market__info">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 7C9.73478 7 9.48043 7.10536 9.29289 7.29289C9.10536 7.48043 9 7.73478 9 8V11C9 11.2652 9.10536 11.5196 9.29289 11.7071C9.48043 11.8946 9.73478 12 10 12C10.2652 12 10.5196 11.8946 10.7071 11.7071C10.8946 11.5196 11 11.2652 11 11V8C11 7.73478 10.8946 7.48043 10.7071 7.29289C10.5196 7.10536 10.2652 7 10 7ZM17 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V13C0 13.7956 0.316071 14.5587 0.87868 15.1213C1.44129 15.6839 2.20435 16 3 16H14.59L18.29 19.71C18.3834 19.8027 18.4943 19.876 18.6161 19.9258C18.7379 19.9755 18.8684 20.0008 19 20C19.1312 20.0034 19.2613 19.976 19.38 19.92C19.5626 19.845 19.7189 19.7176 19.8293 19.5539C19.9396 19.3901 19.999 19.1974 20 19V3C20 2.20435 19.6839 1.44129 19.1213 0.87868C18.5587 0.316071 17.7956 0 17 0ZM18 16.59L15.71 14.29C15.6166 14.1973 15.5057 14.124 15.3839 14.0742C15.2621 14.0245 15.1316 13.9992 15 14H3C2.73478 14 2.48043 13.8946 2.29289 13.7071C2.10536 13.5196 2 13.2652 2 13V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H17C17.2652 2 17.5196 2.10536 17.7071 2.29289C17.8946 2.48043 18 2.73478 18 3V16.59ZM10 4C9.80222 4 9.60888 4.05865 9.44443 4.16853C9.27998 4.27841 9.15181 4.43459 9.07612 4.61732C9.00043 4.80004 8.98063 5.00111 9.01921 5.19509C9.0578 5.38907 9.15304 5.56725 9.29289 5.70711C9.43275 5.84696 9.61093 5.9422 9.80491 5.98079C9.99889 6.01937 10.2 5.99957 10.3827 5.92388C10.5654 5.84819 10.7216 5.72002 10.8315 5.55557C10.9414 5.39112 11 5.19778 11 5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4Z" fill="#383838"/>
        </svg> Вы можете добавить свой маркетплейс, если его нет в списке, нажав кнопку ниже. Или <a style="text-decoration: underline; display: contents;" href="?restore=marketplace">восстановить стартовый набор маркетплейсов</a>. 
    </div>
    <a href="market-add/" class="btn-red marker-add">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 7H9V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V7H1C0.734784 7 0.48043 7.10536 0.292893 7.29289C0.105357 7.48043 0 7.73478 0 8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H7V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V9H15C15.2652 9 15.5196 8.89464 15.7071 8.70711C15.8946 8.51957 16 8.26522 16 8C16 7.73478 15.8946 7.48043 15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7Z" fill="white"/>
        </svg> Добавить маркетплейс
    </a>
    <a href="/catalog/" class="btn-fiolet marker-add">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 7H9V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V7H1C0.734784 7 0.48043 7.10536 0.292893 7.29289C0.105357 7.48043 0 7.73478 0 8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H7V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V9H15C15.2652 9 15.5196 8.89464 15.7071 8.70711C15.8946 8.51957 16 8.26522 16 8C16 7.73478 15.8946 7.48043 15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7Z" fill="white"/>
        </svg> Перейти к добавлению товаров
    </a>
</div>



<div class="modal" id="delete-modal" style="display: none">
	<form method="post" class="modal__wrap" id="market-del">
		<input type="hidden" id="marketid-input" name="marketid" value="">
		<div class="close btn-close"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></svg></div>
		<div class="modal__text">Вы уверены, что хотите удалить элемент?</div>
		<div class="modal__btn">
			<button class="btn-fiolet" type="submit">Да</button>
			<button class="btn-light btn-close" type="button">Нет</button>
		</div>						
	</form>
</div>