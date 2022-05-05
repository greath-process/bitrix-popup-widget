<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();



$markets = [];
$arResult['MARKETS_LOGO'] = [];
foreach($arResult['ITEMS'] as $key=>$arItem){
	$arSelect = Array("ID", "NAME", "PROPERTY_MARKET", "PROPERTY_MARKET_URL", "PROPERTY_MARKET_PRICE");
	$arFilter = Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", 'PROPERTY_10_VALUE'=>$arItem['ID']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement())
	{
	 	$arFields = $ob->GetFields();

	 	$markets[] = $arFields['PROPERTY_MARKET_VALUE'];
		/**/

	 	
	 	$arResult['ITEMS'][$key]['MARKETS'][$arFields['PROPERTY_MARKET_VALUE']] = $arFields;
	}
}



//логотипы
$markets = array_unique($markets);
foreach($markets as $marketid){
	$resMarketplace = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y", 'ID'=>$marketid), false, false, Array("ID", "NAME", "PROPERTY_LOGO"));
	if($obMarketplace = $resMarketplace->GetNextElement())
	{
	 	$arFieldsMarketplace = $obMarketplace->GetFields();
	 	$arResult['MARKETS_LOGO'][$marketid] = $arFieldsMarketplace['PROPERTY_LOGO_VALUE']>0 ? CFile::GetPath($arFieldsMarketplace['PROPERTY_LOGO_VALUE']) : '/assets/img/market/file.jpg';
	}
}

/*
echo "<pre>";
print_r($arResult['MARKETS_LOGO']);
echo "</pre>";
*/
/*
foreach($arResult['ITEMS'] as $key=>$arItem){
	echo "<pre>";
	print_r($arItem);
	echo "</pre>";
}*/
?>