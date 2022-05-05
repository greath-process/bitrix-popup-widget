<?
header('Access-Control-Allow-Origin: *');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?if(!empty($_REQUEST['id'])):?>
    <?
    extract($_REQUEST, EXTR_OVERWRITE, "");
    $http = ($_SERVER['SERVER_PORT'] == 80) ? 'https://' : 'http://';
    $url = $http.$_SERVER['SERVER_NAME'];
    $href = urldecode($href);
    $bez_palochki = (substr($href, -1) == '/') ? substr($href, 0, -1) : $href.'/';
    if (strpos($href,'xn--') !== false)
    {
        $href2 = $href;
        $iden = explode("/", $href);
        $punicode = idn_to_utf8($iden[2]);
        $href = str_replace($iden[2], $punicode, $href);
        $bez_palochki2 = (substr($href, -1) == '/') ? substr($href, 0, -1) : $href.'/';
        $PROPERTY_URL = [
            "LOGIC" => "OR",
            array("PROPERTY_URL" => $href),
            array("PROPERTY_URL" => $bez_palochki),
            array("PROPERTY_URL" => $href2),
            array("PROPERTY_URL" => $bez_palochki2),
        ];
    } else
    $PROPERTY_URL = [
        "LOGIC" => "OR",
        array("PROPERTY_URL" => $href),
        array("PROPERTY_URL" => $bez_palochki),
    ];
    \Bitrix\Main\Loader::includeModule('iblock');
    // по ИД виджета получаем сайт
    $dbItem = \Bitrix\Iblock\ElementTable::getList(array(
        'select' => array('ID', 'IBLOCK_ID'),
        'filter' => array('CODE' => $id),
    ));
    if ($arItem = $dbItem->fetch()) 
    {
        // по сайту и ссылке, на которой находимся - получаем товар
        $arSelect = Array("ID");
        $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "PROPERTY_SITE"=>$arItem['ID'] , $PROPERTY_URL);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        if($ob = $res->Fetch())
        {
            $PRODS = [];
            // по товару получаем товары на маркетплейсах (активные) у них берем логотип маркетплейса, ссылку и цену
            $rSelect = Array("ID", "IBLOCK_ID", "PROPERTY_MARKET_URL", "PROPERTY_MARKET_PRICE", "PROPERTY_MARKET"); 
            $rFilter = Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", "PROPERTY_PRODUCT"=>$ob['ID']);
            $rs = CIBlockElement::GetList(Array(), $rFilter, false, Array(), $rSelect);
            while ($b = $rs->GetNextElement()) 
            {
                $product_props_list = $b->GetProperties();
                if(!empty($product_props_list['MARKET']['VALUE']) && !empty($product_props_list['MARKET_URL']['VALUE']))
                {
                    $bItem = \Bitrix\Iblock\ElementTable::getList(array(
                        'select' => array('ID', 'IBLOCK_ID'),
                        'filter' => array('ID' => $product_props_list['MARKET']['VALUE']),
                    ));
                    while ($rItem = $bItem->fetch()) 
                    {
                        $dbProperty = \CIBlockElement::getProperty($rItem['IBLOCK_ID'], $rItem['ID'], array("sort", "asc"), array('CODE' => 'LOGO'));
                        while ($arProperty = $dbProperty->GetNext()) 
                        {
                            if ($arProperty['VALUE']) 
                            {
                                $LOGO = CFile::GetPath($arProperty['VALUE']);
                            } 
                        }
                    }
                    $PRODS[] = [
                        'IMAGE'=> $LOGO,
                        'PRICE'=> $product_props_list['MARKET_PRICE']['VALUE'],
                        'LINK' => $product_props_list['MARKET_URL']['VALUE'],
                    ];
                }
            }
        }
    }
    ?>

    <?if(!empty($PRODS)):?>
        <style>
        .vidget-v {
            background-color: #ffffff;
            width: 216px;
            padding: 14px 16px; 
        }
        .vidget-v span img {
            max-width: 86px;
            display: block; 
        }
        .vidget-v .vidget-v__row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
                align-items: center;
            -ms-flex-pack: justify;
                justify-content: space-between;
            margin-bottom: 19px; 
            text-decoration: none;
        }
        .vidget-v .vidget-v__row .vidget-v__right span {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
                align-items: center;
            -ms-flex-pack: center;
                justify-content: center;
            width: 36px;
            height: 36px;
            margin-left: 14px;
            border: 1px solid #ebebeb; 
        }
        .vidget-v .vidget-v__row .vidget-v__right {
            color: #000000;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
                align-items: center;
            font-size: 15px;
            font-family: 'Roboto', sans-serif; 
        }
        .vidget-v .vidget-v__row:last-child {
            margin-bottom: 0;
        }
        .rich-btn {
            display: -ms-flexbox;
            display: none; /*flex;*/
            -ms-flex-align: center;
                align-items: center;
            -ms-flex-pack: center;
                justify-content: center;
            border-radius: 37px;
            min-width: 216px;
            min-height: 49px;
            cursor: pointer;
            transition: 0.3s all;
            font-weight: 900;
            font-family: 'Roboto', sans-serif;
            letter-spacing: 0.03em;
            border: 1px solid #ebebeb; 
        }
        .rich-btn:hover {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.7); 
        }
        .vidget-v__bot {
            box-sizing: border-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
                align-items: center;
            width: 100%;
            margin-top: 8px;
            padding: 8px;
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.03em; 
        }
        .vidget-v__bot span {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -ms-flex: 1;
                flex: 1;
            padding-right: 15px; 
        }
        .vidget-v__bot__img {
            box-sizing: border-box;
            margin-right: 12px;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
                align-items: center;
            -ms-flex-pack: center;
                justify-content: center;
            width: 40px;
            height: 40px;
            -ms-flex: 0 0 40px;
                flex: 0 0 40px;
            border-radius: 100%;
            background-color: #ffffff;
            padding: 10px; 
        }
        .vidget-v__bot__img img {
            max-width: 100%; 
        }
        .vidget-v__wrap {
            background-color: #ffffff;
            width: 500px;
            margin: 0 auto;
            padding: 21px 15px;
            padding-bottom: 3px;
            position: relative; 
        }
        .vidget-v__wrap .vidget-v__title {
            margin-bottom: 10px;
            width: 100%;
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
            letter-spacing: 0.03em;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden; 
        }
        .vidget-v__wrap .close {
            position: absolute;
            cursor: pointer;
            right: 0;
            top: 0;
            padding: 5px;
            -webkit-transform: translate(60%, -50%);
                    transform: translate(60%, -50%); 
        }
        .vidget-v__wrap2 {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
                align-items: center; 
        }
        .content3__title {
            font-size: 13px;
            margin-bottom: 12px; 
        }
        .content3__title span {
            color: #ABA9A9; 
        }
        .shadow .vidget-v {
            box-shadow: 4px 4px 25px rgba(0, 92, 255, 0.15); 
        }
        .ugli .vidget-v {
            border-radius: 30px; 
        }
        .ugli .vidget-v__bot {
            border-radius: 37px; 
        }
        .ugli .vidget-v__right span {
            border-radius: 33px; 
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
        }
        @media (max-width: 767px) {
            .vidget {
            max-width: 100%; 
            }
            .vibor__text {
            font-size: 14px; 
            }
            .vibor__name {
            font-size: 14px; 
            }
            .vibor {
            overflow: auto;
            padding-bottom: 10px;
            margin: 0; 
            }
            .vibor__item {
            min-width: 180px;
            margin: 0;
            margin-right: 20px; 
            }
            .shag__title {
            font-size: 14px;
            padding: 19px 15px; 
            }
            .shag__title svg {
                margin-left: 15px;
                -ms-flex: 0 0 12px;
                    flex: 0 0 12px; 
            }
            .v__wrap {
            padding: 15px; 
            }
            .shag__content {
                padding: 19px 15px; 
            }
        }
        #vidget1 {
            display:none;
            width: 216px; 
            position: absolute;
        }
        #vidget2 {
            width: 216px; 
        }
        #vidget3 {
            display:none;
            padding-top: 28px;
            padding-bottom: 44px;
            padding-right: 15px;
            padding-left: 15px; 
            display: none;
            border:none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: rgba(0,0,0, 0.3);
        }
        @media (max-width: 767px) {
            #vidget3 .vidget-v__wrap2 {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                    flex-direction: column; 
            }
            #vidget3 .vidget-v__wrap {
                width: 225px; 
            }
            #vidget3 .vidget-v__title {
                max-width: 280px;
                margin: 0 auto;
                text-align: center;
                margin-bottom: 15px; 
            } 
        }
        #vidget3.shadow .vidget-v {
            box-shadow: none; 
        }
        #vidget3.shadow .vidget-v__wrap {
            box-shadow: 4px 4px 25px rgba(0, 92, 255, 0.15); 
        }
        #vidget3.ugli .vidget-v__wrap {
            border-radius: 30px; 
        }
        #vidget3 {
            padding-bottom: 25px; 
        }
        @media(min-width: 768px){
            #vidget3 .vidget-v__wrap{
                transform: translateY(-50%);
                position: relative;
                top: 50%;
            }
            #vidget3 .vidget-v__img{
                width: 50%;
            }
            #vidget3 .vidget-v__img img{
                width: 100%;
            }
        }
        /** 1 выделеный */
        .vidget-v__row1 .v-1-edit-btn-color-1 {
            background: #<?=$button1?>;
        }
        .vidget-v__row1 path {
            fill: #<?=$arrow1?>;
        }

        .vidget-v__row2 .v-1-edit-btn-color-1 {
            background: #<?=$button2?>;
        }
        .vidget-v__row2 path {
            fill: #<?=$arrow2?>;
        }
        #vidget1 .vidget-v{
            position: absolute;
            top: 0;
            transform: translateY(-100%);
        }
        /* новые */
        #vidget2{
            position: fixed;
            bottom: 50px;
            right: 15px;
            cursor: pointer;
            z-index: 999;
        }
        #vidget2 .vidget-v{
            display: none;
            box-sizing: border-box;
        }
        #vidget2:hover .vidget-v{
            display: block;
        }
        #vidget2:focus .vidget-v{
            display: block;
        }
        @media(max-width: 767px){
            #vidget2 .vidget-v__bot span{
                display: none;
            }
            #vidget2 .vidget-v__bot__img{
                margin-right: 0;
            }
            #vidget2 {
                width: 54px;
                bottom: 93px;
            }
            #vidget2:hover .vidget-v {
                transform: translateX(-73%);
            }
        }
        </style>
        <div id="vidget<?=preg_replace("/[^0-9]/", '', $type)?>" class="<?if(!empty($round)):?>ugli<?endif?> <?if(!empty($dark)):?>shadow<?endif?>">
            
            <?if($type == 'v1'):?><!-- кнопка -->
                <div class="vidget-v">
                    <?foreach ($PRODS as $key => $value):?>
                    <a href="<?=$value['LINK']?>" target="_blank" class="vidget-v__row vidget-v__row2" onmouseover="this.classList.remove('vidget-v__row2'); this.classList.add('vidget-v__row1')" onmouseout="this.classList.remove('vidget-v__row1'); this.classList.add('vidget-v__row2')" onclick="window.open('<?=$value['LINK']?>');">
                        <span><img src="<?=$url?><?=$value['IMAGE']?>"></span>
                        <div class="vidget-v__right"><?=$value['PRICE']?>₽
                            <span class="v-1-edit-btn-color-1" >
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="v-1-edit-arr-color-1" d="M5.46006 5.71002C5.55379 5.61706 5.62818 5.50646 5.67895 5.3846C5.72972 5.26274 5.75586 5.13203 5.75586 5.00002C5.75586 4.86801 5.72972 4.7373 5.67895 4.61544C5.62818 4.49359 5.55379 4.38298 5.46006 4.29002L2.46006 1.29002C2.27176 1.09641 2.01426 0.985538 1.7442 0.981787C1.47415 0.978037 1.21367 1.08172 1.02006 1.27002C0.826453 1.45833 0.715579 1.71583 0.711828 1.98588C0.708077 2.25593 0.811757 2.51641 1.00006 2.71002L3.34006 5.00002L1.00006 7.29002C0.906333 7.38298 0.831938 7.49359 0.78117 7.61544C0.730401 7.7373 0.704261 7.86801 0.704261 8.00002C0.704261 8.13203 0.730401 8.26274 0.78117 8.3846C0.831938 8.50646 0.906333 8.61706 1.00006 8.71002C1.09302 8.80375 1.20363 8.87814 1.32548 8.92891C1.44734 8.97968 1.57805 9.00582 1.71006 9.00582C1.84207 9.00582 1.97278 8.97968 2.09464 8.92891C2.2165 8.87814 2.3271 8.80375 2.42006 8.71002L5.46006 5.71002ZM6.54006 2.71002L8.84006 5.00002L6.54006 7.29002C6.44633 7.38298 6.37194 7.49359 6.32117 7.61544C6.2704 7.7373 6.24426 7.86801 6.24426 8.00002C6.24426 8.13203 6.2704 8.26274 6.32117 8.3846C6.37194 8.50646 6.44633 8.61706 6.54006 8.71002C6.63302 8.80375 6.74362 8.87814 6.86548 8.92891C6.98734 8.97968 7.11805 9.00582 7.25006 9.00582C7.38207 9.00582 7.51278 8.97968 7.63464 8.92891C7.7565 8.87814 7.8671 8.80375 7.96006 8.71002L10.9601 5.71002C11.0538 5.61706 11.1282 5.50646 11.179 5.3846C11.2297 5.26274 11.2559 5.13203 11.2559 5.00002C11.2559 4.86801 11.2297 4.7373 11.179 4.61544C11.1282 4.49359 11.0538 4.38298 10.9601 4.29002L7.96006 1.29002C7.77176 1.10172 7.51636 0.99593 7.25006 0.99593C6.98376 0.99593 6.72836 1.10172 6.54006 1.29002C6.35176 1.47833 6.24597 1.73372 6.24597 2.00002C6.24597 2.26632 6.35176 2.52172 6.54006 2.71002Z" fill="#<?=$arrow1?>"></path>
                                </svg>
                            </span>
                        </div>
                    </a>
                    <?endforeach?>
                </div>
            <?elseif($type == 'v2'):?><!-- виджет -->
                <div class="vidget-v">
                    <?foreach ($PRODS as $key => $value):?>
                    <a href="<?=$value['LINK']?>" target="_blank" class="vidget-v__row vidget-v__row2" onmouseover="this.classList.remove('vidget-v__row2'); this.classList.add('vidget-v__row1')" onmouseout="this.classList.remove('vidget-v__row1'); this.classList.add('vidget-v__row2')" onclick="window.open('<?=$value['LINK']?>');">
                        <span><img src="<?=$url?><?=$value['IMAGE']?>"></span>
                        <div class="vidget-v__right"><?=$value['PRICE']?>₽
                            <span class="v-1-edit-btn-color-1" >
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="v-2-edit-arr-color-2" d="M5.46006 5.71002C5.55379 5.61706 5.62818 5.50646 5.67895 5.3846C5.72972 5.26274 5.75586 5.13203 5.75586 5.00002C5.75586 4.86801 5.72972 4.7373 5.67895 4.61544C5.62818 4.49359 5.55379 4.38298 5.46006 4.29002L2.46006 1.29002C2.27176 1.09641 2.01426 0.985538 1.7442 0.981787C1.47415 0.978037 1.21367 1.08172 1.02006 1.27002C0.826453 1.45833 0.715579 1.71583 0.711828 1.98588C0.708077 2.25593 0.811757 2.51641 1.00006 2.71002L3.34006 5.00002L1.00006 7.29002C0.906333 7.38298 0.831938 7.49359 0.78117 7.61544C0.730401 7.7373 0.704261 7.86801 0.704261 8.00002C0.704261 8.13203 0.730401 8.26274 0.78117 8.3846C0.831938 8.50646 0.906333 8.61706 1.00006 8.71002C1.09302 8.80375 1.20363 8.87814 1.32548 8.92891C1.44734 8.97968 1.57805 9.00582 1.71006 9.00582C1.84207 9.00582 1.97278 8.97968 2.09464 8.92891C2.2165 8.87814 2.3271 8.80375 2.42006 8.71002L5.46006 5.71002ZM6.54006 2.71002L8.84006 5.00002L6.54006 7.29002C6.44633 7.38298 6.37194 7.49359 6.32117 7.61544C6.2704 7.7373 6.24426 7.86801 6.24426 8.00002C6.24426 8.13203 6.2704 8.26274 6.32117 8.3846C6.37194 8.50646 6.44633 8.61706 6.54006 8.71002C6.63302 8.80375 6.74362 8.87814 6.86548 8.92891C6.98734 8.97968 7.11805 9.00582 7.25006 9.00582C7.38207 9.00582 7.51278 8.97968 7.63464 8.92891C7.7565 8.87814 7.8671 8.80375 7.96006 8.71002L10.9601 5.71002C11.0538 5.61706 11.1282 5.50646 11.179 5.3846C11.2297 5.26274 11.2559 5.13203 11.2559 5.00002C11.2559 4.86801 11.2297 4.7373 11.179 4.61544C11.1282 4.49359 11.0538 4.38298 10.9601 4.29002L7.96006 1.29002C7.77176 1.10172 7.51636 0.99593 7.25006 0.99593C6.98376 0.99593 6.72836 1.10172 6.54006 1.29002C6.35176 1.47833 6.24597 1.73372 6.24597 2.00002C6.24597 2.26632 6.35176 2.52172 6.54006 2.71002Z" fill="#<?=$arrow2?>"></path>
                                </svg>
                            </span>
                        </div>
                    </a>
                    <?endforeach?>
                </div>
                <div class="vidget-v__bot v-2-edit-btn-color-1" style="background:#<?=$arrow1?>;">
                    <div class="vidget-v__bot__img">
                        <img src="<?=(!empty($logo)) ? $url.$logo : $url.'/assets/img/vidget/v-btn.png';?>">
                    </div>
                    <span class="v-1-edit-arr-color-1" style="color:#<?=$button1?>; fill:#<?=$button1?>;" id="v2-btn-bot-text"><?=$text?></span>
                </div>
            <?elseif($type == 'v3'):?><!-- баннер -->
                <div class="vidget-v__wrap">
                    <div class="close" onclick='document.getElementById("vidget<?=preg_replace("/[^0-9]/", "", $type)?>").style.display = "none"; document.getElementById("background_banner").style.display = "none";'>
                        <svg width="25" height="25" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4099 8.99994L16.7099 2.70994C16.8982 2.52164 17.004 2.26624 17.004 1.99994C17.004 1.73364 16.8982 1.47825 16.7099 1.28994C16.5216 1.10164 16.2662 0.99585 15.9999 0.99585C15.7336 0.99585 15.4782 1.10164 15.2899 1.28994L8.99994 7.58994L2.70994 1.28994C2.52164 1.10164 2.26624 0.99585 1.99994 0.99585C1.73364 0.99585 1.47824 1.10164 1.28994 1.28994C1.10164 1.47825 0.995847 1.73364 0.995847 1.99994C0.995847 2.26624 1.10164 2.52164 1.28994 2.70994L7.58994 8.99994L1.28994 15.2899C1.19621 15.3829 1.12182 15.4935 1.07105 15.6154C1.02028 15.7372 0.994141 15.8679 0.994141 15.9999C0.994141 16.132 1.02028 16.2627 1.07105 16.3845C1.12182 16.5064 1.19621 16.617 1.28994 16.7099C1.3829 16.8037 1.4935 16.8781 1.61536 16.9288C1.73722 16.9796 1.86793 17.0057 1.99994 17.0057C2.13195 17.0057 2.26266 16.9796 2.38452 16.9288C2.50638 16.8781 2.61698 16.8037 2.70994 16.7099L8.99994 10.4099L15.2899 16.7099C15.3829 16.8037 15.4935 16.8781 15.6154 16.9288C15.7372 16.9796 15.8679 17.0057 15.9999 17.0057C16.132 17.0057 16.2627 16.9796 16.3845 16.9288C16.5064 16.8781 16.617 16.8037 16.7099 16.7099C16.8037 16.617 16.8781 16.5064 16.9288 16.3845C16.9796 16.2627 17.0057 16.132 17.0057 15.9999C17.0057 15.8679 16.9796 15.7372 16.9288 15.6154C16.8781 15.4935 16.8037 15.3829 16.7099 15.2899L10.4099 8.99994Z" fill="#E5E5E5"></path>
                        </svg>
                    </div>
                    <div class="vidget-v__title" style="font-size: <?=$size?>px;" id="v3-edit-text"><?=$text?></div>
                    <div class="vidget-v__wrap2">
                        <div class="vidget-v__img">
                            <img src="<?=(!empty($logo)) ? $url.$logo : $url.'/assets/img/vidget/v3.jpg';?>">
                        </div>
                        <div class="vidget-v">
                        <?foreach ($PRODS as $key => $value):?>
                            <a href="<?=$value['LINK']?>" target="_blank" class="vidget-v__row vidget-v__row2" onmouseover="this.classList.remove('vidget-v__row2'); this.classList.add('vidget-v__row1')" onmouseout="this.classList.remove('vidget-v__row1'); this.classList.add('vidget-v__row2')" onclick="window.open('<?=$value['LINK']?>');">
                                <span><img src="<?=$url?><?=$value['IMAGE']?>"></span>
                                <div class="vidget-v__right"><?=$value['PRICE']?>₽
                                    <span class="v-1-edit-btn-color-1">
                                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="v-3-edit-arr-color-2" d="M5.46006 5.71002C5.55379 5.61706 5.62818 5.50646 5.67895 5.3846C5.72972 5.26274 5.75586 5.13203 5.75586 5.00002C5.75586 4.86801 5.72972 4.7373 5.67895 4.61544C5.62818 4.49359 5.55379 4.38298 5.46006 4.29002L2.46006 1.29002C2.27176 1.09641 2.01426 0.985538 1.7442 0.981787C1.47415 0.978037 1.21367 1.08172 1.02006 1.27002C0.826453 1.45833 0.715579 1.71583 0.711828 1.98588C0.708077 2.25593 0.811757 2.51641 1.00006 2.71002L3.34006 5.00002L1.00006 7.29002C0.906333 7.38298 0.831938 7.49359 0.78117 7.61544C0.730401 7.7373 0.704261 7.86801 0.704261 8.00002C0.704261 8.13203 0.730401 8.26274 0.78117 8.3846C0.831938 8.50646 0.906333 8.61706 1.00006 8.71002C1.09302 8.80375 1.20363 8.87814 1.32548 8.92891C1.44734 8.97968 1.57805 9.00582 1.71006 9.00582C1.84207 9.00582 1.97278 8.97968 2.09464 8.92891C2.2165 8.87814 2.3271 8.80375 2.42006 8.71002L5.46006 5.71002ZM6.54006 2.71002L8.84006 5.00002L6.54006 7.29002C6.44633 7.38298 6.37194 7.49359 6.32117 7.61544C6.2704 7.7373 6.24426 7.86801 6.24426 8.00002C6.24426 8.13203 6.2704 8.26274 6.32117 8.3846C6.37194 8.50646 6.44633 8.61706 6.54006 8.71002C6.63302 8.80375 6.74362 8.87814 6.86548 8.92891C6.98734 8.97968 7.11805 9.00582 7.25006 9.00582C7.38207 9.00582 7.51278 8.97968 7.63464 8.92891C7.7565 8.87814 7.8671 8.80375 7.96006 8.71002L10.9601 5.71002C11.0538 5.61706 11.1282 5.50646 11.179 5.3846C11.2297 5.26274 11.2559 5.13203 11.2559 5.00002C11.2559 4.86801 11.2297 4.7373 11.179 4.61544C11.1282 4.49359 11.0538 4.38298 10.9601 4.29002L7.96006 1.29002C7.77176 1.10172 7.51636 0.99593 7.25006 0.99593C6.98376 0.99593 6.72836 1.10172 6.54006 1.29002C6.35176 1.47833 6.24597 1.73372 6.24597 2.00002C6.24597 2.26632 6.35176 2.52172 6.54006 2.71002Z" fill="#<?=$arrow2?>"></path>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
            <?endif?>

        </div>

        <?if($type == 'v1'):?><!-- кнопка -->
            <button 
                class="rich-btn" 
                id="richbtn" 
                <?=$event?> 
                style="background-color:#<?=$back_button?>; color:#<?=$color_text?>; font-size: <?=$size?>px;"
                onmouseover='document.getElementById("vidget<?=preg_replace("/[^0-9]/", "", $type)?>").style.display = "block";'
                >
                <?=$text?>
            </button>
            <script>
                console.log('<?=$anchor?>')
                <?if(!empty($anchor)):?>
                    console.log('anchor not empty', '<?=$anchor?>');
                    if (document.querySelector('[href="#<?=$anchor?>"]')){
                        console.log('anchor exist');
                        var sp1 = document.getElementById('vidget<?=preg_replace("/[^0-9]/", '', $type)?>');
                        var sp2 = document.querySelector('[href="#<?=$anchor?>"]'); // querySelectorAll querySelector
                        var parentDiv = sp2.parentNode;
                        parentDiv.insertBefore(sp1, sp2);
                        sp2.setAttribute('onmouseover', 'document.getElementById("vidget<?=preg_replace("/[^0-9]/", "", $type)?>").style.display = "block";' )
                    } else {
                        document.getElementById('richbtn').style.display = "flex";
                    }
                <?else:?>
                    document.getElementById('richbtn').style.display = "flex";
                <?endif?>
                let vidget = document.querySelector('.widget')
                vidget.addEventListener('mouseleave', function(e){
                    document.getElementById("vidget<?=preg_replace("/[^0-9]/", "", $type)?>").style.display = "none";
                })
            </script>
        <?endif?>

        <?if(!empty($timer)):?>
            <script>
            setTimeout(function(){
                var div = document.getElementById("vidget3");
                div.style.display = "block";
            }, <?=$timer?>000);
            </script>
        <?endif?>

    <?endif?>
<?endif?>