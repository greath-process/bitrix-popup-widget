<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Делаем редирект и передаем get параметр
$getParam = $arResult['SEARCH']['0']['ITEM_ID'];
LocalRedirect("/catalog/?ID=". $getParam);

if(mb_strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
{
	$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
	$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
	$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
}
?>