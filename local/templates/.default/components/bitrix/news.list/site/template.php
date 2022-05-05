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
?>
<div class="sites" style="margin-top: 0px;">
    <div class="siter__wrap">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
	        <div class="sites__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	            <div class="sites__name">
	                <a href="/site/site-edit/?id=<?=$arItem['ID']?>"><img src="/assets/img/vhod/favicon.jpg"> <?echo $arItem["NAME"]?></a>
	            </div>
	            <a href="javascript:void(0);" class="btn-fiolet site-settings" data-siteid="<?=$arItem['ID']?>">Перейти в настройки</a>
	            <a href="javascript:void(0);" class="btn-light site-del" data-siteid="<?=$arItem['ID']?>">Удалить сайт</a>
	        </div>
		<?endforeach;?>
    </div>

</div>

<div class="modal" id="delete-modal" style="display: none">
	<form method="post" class="modal__wrap" id="site-del">
		<input type="hidden" id="siteid-input" name="siteid" value="">
		<div class="close btn-close"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></svg></div>
		<div class="modal__text">Вы уверены, что хотите удалить элемент?</div>
		<div class="modal__btn">
			<button class="btn-fiolet" type="submit">Да</button>
			<button class="btn-light btn-close" type="button">Нет</button>
		</div>						
	</form>
</div>