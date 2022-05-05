<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent("bitrix:search.page", "suggest1", Array(
	"AJAX_MODE" => "N",	// Включить режим AJAX
		"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
		"CHECK_DATES" => "Y",	// Искать только в активных по дате документах
		"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
		"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
		"arrWHERE" => "",
		"arrFILTER" => array(	// Ограничение области поиска
			0 => "iblock_content",
		),
		"SHOW_WHERE" => "N",	// Показывать выпадающий список "Где искать"
		"PAGE_RESULT_COUNT" => "50",	// Количество результатов на странице
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
		"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Название шаблона
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"COMPONENT_TEMPLATE" => "suggest",
		"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
		"FILTER_NAME" => "",	// Дополнительный фильтр
		"arrFILTER_iblock_content" => array(	// Искать в информационных блоках типа "iblock_content"
			0 => "5",
		),
		"SHOW_WHEN" => "N",	// Показывать фильтр по датам
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"SHOW_RATING" => "",	// Включить рейтинг
		"RATING_TYPE" => "",	// Вид кнопок рейтинга
		"PATH_TO_USER_PROFILE" => "",	// Шаблон пути к профилю пользователя
		"DISPLAY_TOP_PAGER" => "Y",	// Выводить над результатами
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>