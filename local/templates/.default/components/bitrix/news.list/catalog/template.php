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
<div class="catalog">
    <div class="catalog-filter">
        <div class="catalog-filter__left">
            <a href="product-add/" class="btn-fiolet btn-filter">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 7H9V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V7H1C0.734784 7 0.48043 7.10536 0.292893 7.29289C0.105357 7.48043 0 7.73478 0 8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H7V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V9H15C15.2652 9 15.5196 8.89464 15.7071 8.70711C15.8946 8.51957 16 8.26522 16 8C16 7.73478 15.8946 7.48043 15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7Z" fill="white"/>
                </svg> Добавить товар
            </a>
            <div class="file">
                <input type="file" id="file1">
                <label class="btn-light btn-filter" for="file1">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7H9V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V7H1C0.734784 7 0.48043 7.10536 0.292893 7.29289C0.105357 7.48043 0 7.73478 0 8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H7V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V9H15C15.2652 9 15.5196 8.89464 15.7071 8.70711C15.8946 8.51957 16 8.26522 16 8C16 7.73478 15.8946 7.48043 15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7Z" fill="white"/>
                        </svg>
                    Импорт товаров из файла    
                </label>
            </div>
            <a href="" download="" class="btn-light btn-filter">
                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 18H1C0.734784 18 0.48043 18.1053 0.292893 18.2929C0.105357 18.4804 0 18.7348 0 19C0 19.2652 0.105357 19.5196 0.292893 19.7071C0.48043 19.8946 0.734784 20 1 20H15C15.2652 20 15.5196 19.8946 15.7071 19.7071C15.8946 19.5196 16 19.2652 16 19C16 18.7348 15.8946 18.4804 15.7071 18.2929C15.5196 18.1053 15.2652 18 15 18ZM4.71 5.70999L7 3.40999V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V3.40999L11.29 5.70999C11.383 5.80372 11.4936 5.87811 11.6154 5.92888C11.7373 5.97965 11.868 6.00579 12 6.00579C12.132 6.00579 12.2627 5.97965 12.3846 5.92888C12.5064 5.87811 12.617 5.80372 12.71 5.70999C12.8037 5.61702 12.8781 5.50642 12.9289 5.38456C12.9797 5.26271 13.0058 5.132 13.0058 4.99999C13.0058 4.86798 12.9797 4.73727 12.9289 4.61541C12.8781 4.49355 12.8037 4.38295 12.71 4.28999L8.71 0.289988C8.6149 0.198947 8.50275 0.127582 8.38 0.0799879C8.13654 -0.0200301 7.86346 -0.0200301 7.62 0.0799879C7.49725 0.127582 7.3851 0.198947 7.29 0.289988L3.29 4.28999C3.19676 4.38323 3.1228 4.49392 3.07234 4.61574C3.02188 4.73756 2.99591 4.86813 2.99591 4.99999C2.99591 5.13185 3.02188 5.26242 3.07234 5.38424C3.1228 5.50606 3.19676 5.61675 3.29 5.70999C3.38324 5.80323 3.49393 5.87719 3.61575 5.92765C3.73757 5.97811 3.86814 6.00408 4 6.00408C4.13186 6.00408 4.26243 5.97811 4.38425 5.92765C4.50607 5.87719 4.61676 5.80323 4.71 5.70999Z" fill="white"/>
                    </svg> Экспорт
            </a>
        </div>
        <?/*$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"catalog-search", 
	array(
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "title-search",
		"PRICE_CODE" => array(
			0 => "BASE",
			1 => "RETAIL",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "150",
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"PAGE" => "#SITE_DIR#search/index.php",
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "10",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "Y",
		"SHOW_OTHERS" => "N",
		"CATEGORY_0_TITLE" => "Новости",
		"CATEGORY_0" => array(
			0 => "iblock_content",
		),
		"CATEGORY_0_iblock_news" => array(
			0 => "all",
		),
		"CATEGORY_1_TITLE" => "Форумы",
		"CATEGORY_1" => array(
			0 => "forum",
		),
		"CATEGORY_1_forum" => array(
			0 => "all",
		),
		"CATEGORY_2_TITLE" => "Каталоги",
		"CATEGORY_2" => array(
			0 => "iblock_books",
		),
		"CATEGORY_2_iblock_books" => "all",
		"CATEGORY_OTHERS_TITLE" => "Прочее",
		"COMPONENT_TEMPLATE" => "catalog-search",
		"CATEGORY_0_iblock_content" => array(
			0 => "5",
		)
	),
	false
);*/?>
        <form action="/catalog/" class="catalog__search">
            <button>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.07 14.83L17 12.71C16.5547 12.2868 15.9931 12.0063 15.3872 11.9047C14.7813 11.8032 14.1589 11.8851 13.6 12.14L12.7 11.24C13.7605 9.82292 14.2449 8.05668 14.0555 6.29684C13.8662 4.537 13.0172 2.91423 11.6794 1.7552C10.3417 0.596178 8.61452 -0.0130406 6.84565 0.0501869C5.07678 0.113414 3.39754 0.844393 2.14596 2.09597C0.894381 3.34755 0.163402 5.0268 0.100175 6.79567C0.0369472 8.56454 0.646165 10.2917 1.80519 11.6294C2.96421 12.9672 4.58699 13.8162 6.34683 14.0055C8.10667 14.1949 9.87291 13.7106 11.29 12.65L12.18 13.54C11.8951 14.0996 11.793 14.7346 11.8881 15.3553C11.9831 15.9761 12.2706 16.5513 12.71 17L14.83 19.12C15.3925 19.6818 16.155 19.9974 16.95 19.9974C17.745 19.9974 18.5075 19.6818 19.07 19.12C19.3557 18.8406 19.5828 18.5069 19.7378 18.1386C19.8928 17.7702 19.9726 17.3746 19.9726 16.975C19.9726 16.5754 19.8928 16.1798 19.7378 15.8114C19.5828 15.4431 19.3557 15.1094 19.07 14.83ZM10.59 10.59C9.89023 11.288 8.99929 11.7629 8.02973 11.9549C7.06017 12.1468 6.05549 12.047 5.14259 11.6682C4.2297 11.2894 3.44955 10.6485 2.9007 9.82654C2.35185 9.00457 2.05893 8.03837 2.05893 7.05C2.05893 6.06163 2.35185 5.09544 2.9007 4.27347C3.44955 3.45149 4.2297 2.81062 5.14259 2.43182C6.05549 2.05301 7.06017 1.95325 8.02973 2.14515C8.99929 2.33706 9.89023 2.812 10.59 3.51C11.0556 3.97446 11.4251 4.52621 11.6771 5.13367C11.9292 5.74112 12.0589 6.39233 12.0589 7.05C12.0589 7.70768 11.9292 8.35889 11.6771 8.96634C11.4251 9.57379 11.0556 10.1255 10.59 10.59ZM17.66 17.66C17.567 17.7537 17.4564 17.8281 17.3346 17.8789C17.2127 17.9297 17.082 17.9558 16.95 17.9558C16.818 17.9558 16.6873 17.9297 16.5654 17.8789C16.4436 17.8281 16.333 17.7537 16.24 17.66L14.12 15.54C14.0263 15.447 13.9519 15.3364 13.9011 15.2146C13.8503 15.0927 13.8242 14.962 13.8242 14.83C13.8242 14.698 13.8503 14.5673 13.9011 14.4454C13.9519 14.3236 14.0263 14.213 14.12 14.12C14.213 14.0263 14.3236 13.9519 14.4454 13.9011C14.5673 13.8503 14.698 13.8242 14.83 13.8242C14.962 13.8242 15.0927 13.8503 15.2146 13.9011C15.3364 13.9519 15.447 14.0263 15.54 14.12L17.66 16.24C17.7537 16.333 17.8281 16.4436 17.8789 16.5654C17.9296 16.6873 17.9558 16.818 17.9558 16.95C17.9558 17.082 17.9296 17.2127 17.8789 17.3346C17.8281 17.4564 17.7537 17.567 17.66 17.66Z" fill="#383838"/>
                    </svg>                                
            </button>
            <input type="text" name="q" placeholder="Поиск товара" value="<?=$_GET['q']?>">
        </form>
    </div>
    <div class="catalog__table">
        <div class="catalog__settign">
            <button class="catalog__setting__btn">
            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 0C8.60444 0 8.21776 0.117298 7.88886 0.337061C7.55996 0.556824 7.30362 0.869181 7.15224 1.23463C7.00087 1.60009 6.96126 2.00222 7.03843 2.39018C7.1156 2.77814 7.30608 3.13451 7.58579 3.41421C7.86549 3.69392 8.22186 3.8844 8.60982 3.96157C8.99778 4.03874 9.39992 3.99913 9.76537 3.84776C10.1308 3.69638 10.4432 3.44004 10.6629 3.11114C10.8827 2.78224 11 2.39556 11 2C11 1.46957 10.7893 0.96086 10.4142 0.585787C10.0391 0.210714 9.53043 0 9 0ZM2 0C1.60444 0 1.21776 0.117298 0.88886 0.337061C0.559962 0.556824 0.303617 0.869181 0.152242 1.23463C0.000866562 1.60009 -0.0387401 2.00222 0.0384303 2.39018C0.115601 2.77814 0.306082 3.13451 0.585787 3.41421C0.865492 3.69392 1.22186 3.8844 1.60982 3.96157C1.99778 4.03874 2.39992 3.99913 2.76537 3.84776C3.13082 3.69638 3.44318 3.44004 3.66294 3.11114C3.8827 2.78224 4 2.39556 4 2C4 1.46957 3.78929 0.96086 3.41421 0.585787C3.03914 0.210714 2.53043 0 2 0ZM16 0C15.6044 0 15.2178 0.117298 14.8889 0.337061C14.56 0.556824 14.3036 0.869181 14.1522 1.23463C14.0009 1.60009 13.9613 2.00222 14.0384 2.39018C14.1156 2.77814 14.3061 3.13451 14.5858 3.41421C14.8655 3.69392 15.2219 3.8844 15.6098 3.96157C15.9978 4.03874 16.3999 3.99913 16.7654 3.84776C17.1308 3.69638 17.4432 3.44004 17.6629 3.11114C17.8827 2.78224 18 2.39556 18 2C18 1.46957 17.7893 0.96086 17.4142 0.585787C17.0391 0.210714 16.5304 0 16 0Z" fill="black"/>
                </svg>
            </button>
            <div class="catalog__setting__wrap">
                <span class="catalog__setting__title">Показать выбранные</span>
                <ul>
					<?$z=1;
					foreach($arResult['MARKETS_LOGO'] as $key=>$logo):?>
	                    <li>
	                        <span>
		                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
		                            <path d="M0.44443 8.16853C0.608879 8.05865 0.802219 8 1 8C1.26522 8 1.51957 8.10536 1.70711 8.29289C1.89464 8.48043 2 8.73478 2 9C2 9.19778 1.94135 9.39112 1.83147 9.55557C1.72159 9.72002 1.56541 9.84819 1.38268 9.92388C1.19996 9.99957 0.998891 10.0194 0.80491 9.98079C0.610929 9.9422 0.432746 9.84696 0.292894 9.70711C0.153041 9.56726 0.0578004 9.38907 0.0192152 9.19509C-0.0193701 9.00111 0.000433281 8.80004 0.0761209 8.61732C0.151809 8.43459 0.279981 8.27841 0.44443 8.16853Z" fill="#E5E5E5"/>
		                            <path d="M0.44443 4.16853C0.608879 4.05865 0.802219 4 1 4C1.26522 4 1.51957 4.10536 1.70711 4.29289C1.89464 4.48043 2 4.73478 2 5C2 5.19778 1.94135 5.39112 1.83147 5.55557C1.72159 5.72002 1.56541 5.84819 1.38268 5.92388C1.19996 5.99957 0.998891 6.01937 0.80491 5.98079C0.610929 5.9422 0.432746 5.84696 0.292894 5.70711C0.153041 5.56725 0.0578004 5.38907 0.0192152 5.19509C-0.0193701 5.00111 0.000433281 4.80004 0.0761209 4.61732C0.151809 4.43459 0.279981 4.27841 0.44443 4.16853Z" fill="#E5E5E5"/>
		                            <path d="M0.44443 0.16853C0.608879 0.0586491 0.802219 0 1 0C1.26522 0 1.51957 0.105357 1.70711 0.292893C1.89464 0.48043 2 0.734784 2 1C2 1.19778 1.94135 1.39112 1.83147 1.55557C1.72159 1.72002 1.56541 1.84819 1.38268 1.92388C1.19996 1.99957 0.998891 2.01937 0.80491 1.98079C0.610929 1.9422 0.432746 1.84696 0.292894 1.70711C0.153041 1.56725 0.0578004 1.38907 0.0192152 1.19509C-0.0193701 1.00111 0.000433281 0.800042 0.0761209 0.617316C0.151809 0.43459 0.279981 0.278412 0.44443 0.16853Z" fill="#E5E5E5"/>
		                            <path d="M4.44443 8.16853C4.60888 8.05865 4.80222 8 5 8C5.26522 8 5.51957 8.10536 5.70711 8.29289C5.89464 8.48043 6 8.73478 6 9C6 9.19778 5.94135 9.39112 5.83147 9.55557C5.72159 9.72002 5.56541 9.84819 5.38268 9.92388C5.19996 9.99957 4.99889 10.0194 4.80491 9.98079C4.61093 9.9422 4.43275 9.84696 4.29289 9.70711C4.15304 9.56726 4.0578 9.38907 4.01922 9.19509C3.98063 9.00111 4.00043 8.80004 4.07612 8.61732C4.15181 8.43459 4.27998 8.27841 4.44443 8.16853Z" fill="#E5E5E5"/>
		                            <path d="M4.44443 4.16853C4.60888 4.05865 4.80222 4 5 4C5.26522 4 5.51957 4.10536 5.70711 4.29289C5.89464 4.48043 6 4.73478 6 5C6 5.19778 5.94135 5.39112 5.83147 5.55557C5.72159 5.72002 5.56541 5.84819 5.38268 5.92388C5.19996 5.99957 4.99889 6.01937 4.80491 5.98079C4.61093 5.9422 4.43275 5.84696 4.29289 5.70711C4.15304 5.56725 4.0578 5.38907 4.01922 5.19509C3.98063 5.00111 4.00043 4.80004 4.07612 4.61732C4.15181 4.43459 4.27998 4.27841 4.44443 4.16853Z" fill="#E5E5E5"/>
		                            <path d="M4.44443 0.16853C4.60888 0.0586491 4.80222 0 5 0C5.26522 0 5.51957 0.105357 5.70711 0.292893C5.89464 0.48043 6 0.734784 6 1C6 1.19778 5.94135 1.39112 5.83147 1.55557C5.72159 1.72002 5.56541 1.84819 5.38268 1.92388C5.19996 1.99957 4.99889 2.01937 4.80491 1.98079C4.61093 1.9422 4.43275 1.84696 4.29289 1.70711C4.15304 1.56725 4.0578 1.38907 4.01922 1.19509C3.98063 1.00111 4.00043 0.800042 4.07612 0.617316C4.15181 0.43459 4.27998 0.278412 4.44443 0.16853Z" fill="#E5E5E5"/>
		                        </svg> 
		                    </span> <?
									$res = CIBlockElement::GetByID($key);
									if($ar_res = $res->GetNext())
									  echo $ar_res['NAME'];
									?>
	                        <div class="checkbox-inline">
	                            <input type="checkbox" id="set<?=$key?>" checked>
	                            <label for="set<?=$key?>"></label>
	                        </div>
	                    </li>
                    <?$z++;
                	endforeach;?>
                </ul>
                <div class="catalog__setting__price">
                    Показать цены?
                    <div class="checkbox-inline">
                        <input type="checkbox" id="set5" checked>
                        <label for="set5"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="catalog__table__wrap">
            <div class="catalog__wrap2">
                <div class="catalog__head">
                    <div class="col col-1">
                        <div class="action">
                            <div class="checkbox">
                                <input type="checkbox" id="check3">
                                <label for="check3"></label>
                            </div>
                            <div class="action__wrap">
                                <div class="action__item active">Действие</div>
                                <div class="action__item">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2.15183" fill="#884594"/>
                                            <path d="M12.4601 10.5356H10.4783C10.3622 10.5356 10.2509 10.5817 10.1689 10.6638C10.0869 10.7458 10.0408 10.8571 10.0408 10.9731C10.0408 11.0892 10.0869 11.2004 10.1689 11.2825C10.2509 11.3645 10.3622 11.4106 10.4783 11.4106H11.5283C11.0457 11.9149 10.4233 12.2634 9.74115 12.4114C9.05898 12.5593 8.34817 12.4998 7.70004 12.2407C7.05191 11.9815 6.49608 11.5345 6.10396 10.957C5.71184 10.3795 5.50134 9.69802 5.49951 9C5.49951 8.88397 5.45342 8.77269 5.37137 8.69064C5.28932 8.60859 5.17804 8.5625 5.06201 8.5625C4.94598 8.5625 4.8347 8.60859 4.75265 8.69064C4.67061 8.77269 4.62451 8.88397 4.62451 9C4.62682 9.85435 4.87923 10.6893 5.35059 11.4019C5.82194 12.1144 6.49162 12.6734 7.27696 13.0098C8.06231 13.3462 8.92896 13.4452 9.76996 13.2948C10.611 13.1443 11.3895 12.7509 12.0095 12.1631V12.9375C12.0095 13.0535 12.0556 13.1648 12.1377 13.2469C12.2197 13.3289 12.331 13.375 12.447 13.375C12.563 13.375 12.6743 13.3289 12.7564 13.2469C12.8384 13.1648 12.8845 13.0535 12.8845 12.9375V10.9687C12.8834 10.8557 12.8386 10.7475 12.7595 10.6667C12.6804 10.586 12.5731 10.539 12.4601 10.5356ZM8.99951 4.625C7.87793 4.6282 6.80041 5.06202 5.98951 5.83687V5.0625C5.98951 4.94647 5.94342 4.83519 5.86137 4.75314C5.77932 4.67109 5.66804 4.625 5.55201 4.625C5.43598 4.625 5.3247 4.67109 5.24265 4.75314C5.16061 4.83519 5.11451 4.94647 5.11451 5.0625V7.03125C5.11451 7.14728 5.16061 7.25856 5.24265 7.34061C5.3247 7.42266 5.43598 7.46875 5.55201 7.46875H7.52076C7.63679 7.46875 7.74807 7.42266 7.83012 7.34061C7.91217 7.25856 7.95826 7.14728 7.95826 7.03125C7.95826 6.91522 7.91217 6.80394 7.83012 6.72189C7.74807 6.63984 7.63679 6.59375 7.52076 6.59375H6.47076C6.95309 6.08969 7.57505 5.74128 8.25681 5.59323C8.93857 5.44519 9.64902 5.50426 10.297 5.76288C10.9449 6.02149 11.5008 6.46784 11.8932 7.04464C12.2857 7.62143 12.4968 8.30236 12.4995 9C12.4995 9.11603 12.5456 9.22731 12.6277 9.30936C12.7097 9.39141 12.821 9.4375 12.937 9.4375C13.053 9.4375 13.1643 9.39141 13.2464 9.30936C13.3284 9.22731 13.3745 9.11603 13.3745 9C13.3745 8.42547 13.2613 7.85656 13.0415 7.32576C12.8216 6.79496 12.4994 6.31266 12.0931 5.90641C11.6868 5.50015 11.2046 5.17789 10.6738 4.95803C10.143 4.73816 9.57404 4.625 8.99951 4.625Z" fill="white"/>
                                            </svg> Спарсить
                                </div>
                                <div class="action__item">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2.15183" fill="#FFCACA"/>
                                            <path d="M12.4995 6.39069H10.7495V5.95319C10.7495 5.60509 10.6112 5.27125 10.3651 5.02511C10.1189 4.77897 9.78511 4.64069 9.43701 4.64069H8.56201C8.21392 4.64069 7.88008 4.77897 7.63393 5.02511C7.38779 5.27125 7.24951 5.60509 7.24951 5.95319V6.39069H5.49951C5.38348 6.39069 5.2722 6.43678 5.19015 6.51883C5.10811 6.60087 5.06201 6.71215 5.06201 6.82819C5.06201 6.94422 5.10811 7.0555 5.19015 7.13755C5.2722 7.21959 5.38348 7.26569 5.49951 7.26569H5.93701V12.0782C5.93701 12.4263 6.07529 12.7601 6.32143 13.0063C6.56758 13.2524 6.90142 13.3907 7.24951 13.3907H10.7495C11.0976 13.3907 11.4314 13.2524 11.6776 13.0063C11.9237 12.7601 12.062 12.4263 12.062 12.0782V7.26569H12.4995C12.6155 7.26569 12.7268 7.21959 12.8089 7.13755C12.8909 7.0555 12.937 6.94422 12.937 6.82819C12.937 6.71215 12.8909 6.60087 12.8089 6.51883C12.7268 6.43678 12.6155 6.39069 12.4995 6.39069ZM8.12451 5.95319C8.12451 5.83715 8.17061 5.72587 8.25265 5.64383C8.3347 5.56178 8.44598 5.51569 8.56201 5.51569H9.43701C9.55304 5.51569 9.66432 5.56178 9.74637 5.64383C9.82842 5.72587 9.87451 5.83715 9.87451 5.95319V6.39069H8.12451V5.95319ZM11.187 12.0782C11.187 12.1942 11.1409 12.3055 11.0589 12.3875C10.9768 12.4696 10.8655 12.5157 10.7495 12.5157H7.24951C7.13348 12.5157 7.0222 12.4696 6.94015 12.3875C6.85811 12.3055 6.81201 12.1942 6.81201 12.0782V7.26569H11.187V12.0782Z" fill="#FF6767"/>
                                            </svg> Удалить
                                </div>
                                <div class="action__toggle">
                                    <span>Выберите действие</span>
                                    <div class="action__toggle__item">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="18" height="18" rx="2.15183" fill="#884594"/>
                                                <path d="M12.4601 10.5356H10.4783C10.3622 10.5356 10.2509 10.5817 10.1689 10.6638C10.0869 10.7458 10.0408 10.8571 10.0408 10.9731C10.0408 11.0892 10.0869 11.2004 10.1689 11.2825C10.2509 11.3645 10.3622 11.4106 10.4783 11.4106H11.5283C11.0457 11.9149 10.4233 12.2634 9.74115 12.4114C9.05898 12.5593 8.34817 12.4998 7.70004 12.2407C7.05191 11.9815 6.49608 11.5345 6.10396 10.957C5.71184 10.3795 5.50134 9.69802 5.49951 9C5.49951 8.88397 5.45342 8.77269 5.37137 8.69064C5.28932 8.60859 5.17804 8.5625 5.06201 8.5625C4.94598 8.5625 4.8347 8.60859 4.75265 8.69064C4.67061 8.77269 4.62451 8.88397 4.62451 9C4.62682 9.85435 4.87923 10.6893 5.35059 11.4019C5.82194 12.1144 6.49162 12.6734 7.27696 13.0098C8.06231 13.3462 8.92896 13.4452 9.76996 13.2948C10.611 13.1443 11.3895 12.7509 12.0095 12.1631V12.9375C12.0095 13.0535 12.0556 13.1648 12.1377 13.2469C12.2197 13.3289 12.331 13.375 12.447 13.375C12.563 13.375 12.6743 13.3289 12.7564 13.2469C12.8384 13.1648 12.8845 13.0535 12.8845 12.9375V10.9687C12.8834 10.8557 12.8386 10.7475 12.7595 10.6667C12.6804 10.586 12.5731 10.539 12.4601 10.5356ZM8.99951 4.625C7.87793 4.6282 6.80041 5.06202 5.98951 5.83687V5.0625C5.98951 4.94647 5.94342 4.83519 5.86137 4.75314C5.77932 4.67109 5.66804 4.625 5.55201 4.625C5.43598 4.625 5.3247 4.67109 5.24265 4.75314C5.16061 4.83519 5.11451 4.94647 5.11451 5.0625V7.03125C5.11451 7.14728 5.16061 7.25856 5.24265 7.34061C5.3247 7.42266 5.43598 7.46875 5.55201 7.46875H7.52076C7.63679 7.46875 7.74807 7.42266 7.83012 7.34061C7.91217 7.25856 7.95826 7.14728 7.95826 7.03125C7.95826 6.91522 7.91217 6.80394 7.83012 6.72189C7.74807 6.63984 7.63679 6.59375 7.52076 6.59375H6.47076C6.95309 6.08969 7.57505 5.74128 8.25681 5.59323C8.93857 5.44519 9.64902 5.50426 10.297 5.76288C10.9449 6.02149 11.5008 6.46784 11.8932 7.04464C12.2857 7.62143 12.4968 8.30236 12.4995 9C12.4995 9.11603 12.5456 9.22731 12.6277 9.30936C12.7097 9.39141 12.821 9.4375 12.937 9.4375C13.053 9.4375 13.1643 9.39141 13.2464 9.30936C13.3284 9.22731 13.3745 9.11603 13.3745 9C13.3745 8.42547 13.2613 7.85656 13.0415 7.32576C12.8216 6.79496 12.4994 6.31266 12.0931 5.90641C11.6868 5.50015 11.2046 5.17789 10.6738 4.95803C10.143 4.73816 9.57404 4.625 8.99951 4.625Z" fill="white"/>
                                                </svg> Спарсить
                                    </div>
                                    <div class="action__toggle__item">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="18" height="18" rx="2.15183" fill="#FFCACA"/>
                                                <path d="M12.4995 6.39069H10.7495V5.95319C10.7495 5.60509 10.6112 5.27125 10.3651 5.02511C10.1189 4.77897 9.78511 4.64069 9.43701 4.64069H8.56201C8.21392 4.64069 7.88008 4.77897 7.63393 5.02511C7.38779 5.27125 7.24951 5.60509 7.24951 5.95319V6.39069H5.49951C5.38348 6.39069 5.2722 6.43678 5.19015 6.51883C5.10811 6.60087 5.06201 6.71215 5.06201 6.82819C5.06201 6.94422 5.10811 7.0555 5.19015 7.13755C5.2722 7.21959 5.38348 7.26569 5.49951 7.26569H5.93701V12.0782C5.93701 12.4263 6.07529 12.7601 6.32143 13.0063C6.56758 13.2524 6.90142 13.3907 7.24951 13.3907H10.7495C11.0976 13.3907 11.4314 13.2524 11.6776 13.0063C11.9237 12.7601 12.062 12.4263 12.062 12.0782V7.26569H12.4995C12.6155 7.26569 12.7268 7.21959 12.8089 7.13755C12.8909 7.0555 12.937 6.94422 12.937 6.82819C12.937 6.71215 12.8909 6.60087 12.8089 6.51883C12.7268 6.43678 12.6155 6.39069 12.4995 6.39069ZM8.12451 5.95319C8.12451 5.83715 8.17061 5.72587 8.25265 5.64383C8.3347 5.56178 8.44598 5.51569 8.56201 5.51569H9.43701C9.55304 5.51569 9.66432 5.56178 9.74637 5.64383C9.82842 5.72587 9.87451 5.83715 9.87451 5.95319V6.39069H8.12451V5.95319ZM11.187 12.0782C11.187 12.1942 11.1409 12.3055 11.0589 12.3875C10.9768 12.4696 10.8655 12.5157 10.7495 12.5157H7.24951C7.13348 12.5157 7.0222 12.4696 6.94015 12.3875C6.85811 12.3055 6.81201 12.1942 6.81201 12.0782V7.26569H11.187V12.0782Z" fill="#FF6767"/>
                                                </svg> Удалить
                                    </div>
                                </div>
                            </div>

                            <button class="btn-red">ОК</button>
                        </div>
                    </div>
                    <div class="col col-2">
                        <div class="site-name">
							<?
							$res = CIBlockElement::GetByID(currentSiteID($USER->GetID()));
							if($ar_res = $res->GetNext())
							  echo $ar_res['NAME'];
							?>
                        </div>
                    </div>
                    <?foreach($arResult['MARKETS_LOGO'] as $key=>$logo):?>
	                    <div class="col col-3 b-item market-<?=$key?>">
	                        <img src="<?=$logo?>">
	                    </div>
                    <?endforeach;?>
                    <div class="col col-4">

                    </div>

                </div>
                <div class="catalog__body">
                	<?if(!empty($arResult["ITEMS"])):?>
						<?foreach($arResult["ITEMS"] as $arItem):?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
		                    <div class="catalog__body__row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		                        <div class="catalog__body__row1">
		                            <div class="col col-1">
		                                <div class="catalog__item">
		                                    <div class="checkbox">
		                                        <input type="checkbox" id="check<?=$arItem['ID']?>" data-id="<?=$arItem['ID']?>">
		                                        <label for="check<?=$arItem['ID']?>"></label>
		                                    </div>
		                                    <div class="catalog__item__name">
		                                        <?=$arItem['NAME']?>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="col col-2">
		                                <div class="text-block">
		                                    <?=$arItem['PROPERTIES']['URL']['VALUE']?>
		                                </div>
		                            </div>
		                            <?foreach($arResult['MARKETS_LOGO'] as $key=>$logo):?>
			                            <div class="col col-3 b-item">
			                                <div class="text-block market-<?=$key?>">
			                                    <?= $arItem['MARKETS'][$key]['PROPERTY_MARKET_URL_VALUE'] ? $arItem['MARKETS'][$key]['PROPERTY_MARKET_URL_VALUE'] : '-'?>
			                                </div>
			                            </div>
		                            <?endforeach;?>

		                            <div class="col col-4">
		                                <a href="product-edit/?id=<?=$arItem['ID']?>" class="catalog-edit">
		                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                        <path d="M19 11C18.7348 11 18.4804 11.1054 18.2929 11.2929C18.1054 11.4804 18 11.7348 18 12V18C18 18.2652 17.8946 18.5196 17.7071 18.7071C17.5196 18.8946 17.2652 19 17 19H3C2.73478 19 2.48043 18.8946 2.29289 18.7071C2.10536 18.5196 2 18.2652 2 18V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H9C9.26522 3 9.51957 2.89464 9.70711 2.70711C9.89464 2.51957 10 2.26522 10 2C10 1.73478 9.89464 1.48043 9.70711 1.29289C9.51957 1.10536 9.26522 1 9 1H3C2.20435 1 1.44129 1.31607 0.87868 1.87868C0.316071 2.44129 0 3.20435 0 4V18C0 18.7956 0.316071 19.5587 0.87868 20.1213C1.44129 20.6839 2.20435 21 3 21H17C17.7956 21 18.5587 20.6839 19.1213 20.1213C19.6839 19.5587 20 18.7956 20 18V12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11ZM4 11.76V16C4 16.2652 4.10536 16.5196 4.29289 16.7071C4.48043 16.8946 4.73478 17 5 17H9.24C9.37161 17.0008 9.50207 16.9755 9.62391 16.9258C9.74574 16.876 9.85656 16.8027 9.95 16.71L16.87 9.78L19.71 7C19.8037 6.90704 19.8781 6.79644 19.9289 6.67458C19.9797 6.55272 20.0058 6.42201 20.0058 6.29C20.0058 6.15799 19.9797 6.02728 19.9289 5.90542C19.8781 5.78356 19.8037 5.67296 19.71 5.58L15.47 1.29C15.377 1.19627 15.2664 1.12188 15.1446 1.07111C15.0227 1.02034 14.892 0.994202 14.76 0.994202C14.628 0.994202 14.4973 1.02034 14.3754 1.07111C14.2536 1.12188 14.143 1.19627 14.05 1.29L11.23 4.12L4.29 11.05C4.19732 11.1434 4.12399 11.2543 4.07423 11.3761C4.02446 11.4979 3.99924 11.6284 4 11.76ZM14.76 3.41L17.59 6.24L16.17 7.66L13.34 4.83L14.76 3.41ZM6 12.17L11.93 6.24L14.76 9.07L8.83 15H6V12.17Z" fill="#EEA941"/>
		                                        </svg>

		                                </a>
		                            </div>
		                        </div>
		                        <div class="catalog__body__row2">
		                            <div class="catalog__price">
		                                <div class="catalog__price__wrap">
		                                    <div class="catalog__price__left">Цены</div>
		                                    <?foreach($arResult['MARKETS_LOGO'] as $key=>$logo):?>
		                                    	<div class="catalog__price__col b-item market-<?=$key?>"><?= $arItem['MARKETS'][$key]['PROPERTY_MARKET_PRICE_VALUE'] ? $arItem['MARKETS'][$key]['PROPERTY_MARKET_PRICE_VALUE'] : '-'?> ₽</div>
		                                    <?endforeach;?>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
						<?endforeach;?>
					<?else:?>
						<p style="padding-top: 21px;">Список товаров пуст.</p>
					<?endif;?>

                </div>
            </div>
        </div>
    </div>


</div>