<!DOCTYPE html>
<html>

<head>
    <?
    use \Bitrix\Main\Page\Asset;
    $APPLICATION->ShowHead();
    ?>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?$APPLICATION->ShowTitle();?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <?if($APPLICATION->GetCurPage()!='/auth/' && $APPLICATION->GetCurPage()!='/register/'):?>
        <?
        Asset::getInstance()->addCss('/assets/libs/niseSelect/nice-select.css');
        Asset::getInstance()->addCss('/assets/css/main.min.css');
        ?>
    <?else:?>
        <?
        Asset::getInstance()->addCss('/assets/css/auth.min.css');
        ?>    
    <?endif;?>
<script src="//code-ya.jivosite.com/widget/YKVu6c2YhW" async></script>
</head>
<?
global $USER;
if (!$USER->IsAuthorized() && ($APPLICATION->GetCurPage()!='/auth/' && $APPLICATION->GetCurPage()!='/register/')){
    header('Location: /auth/');
}
?>
<body>
    <?$APPLICATION->ShowPanel();?>
    
    <?
    //global $USER;
    //if($USER->IsAuthorized()):
    if($APPLICATION->GetCurPage()!='/auth/' && $APPLICATION->GetCurPage()!='/register/'):?>

        <div class="app">
            <div class="sidebar">

                <div class="close">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.1875 4.8125L4.8125 17.1875" stroke="#E5E5E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.1875 17.1875L4.8125 4.8125" stroke="#E5E5E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                </div>
                <div class="logo">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/logo.php"), false);?>
                </div>
                <nav class="left-menu">
                    <ul>
                        <li><span>Адрес сайта:</span></li>
                        <li>

                            <a href="/site/" class="site-link">
                                <?
                                CModule::IncludeModule("iblock");
                                $res = CIBlockElement::GetByID(currentSiteID($USER->GetID()));
                                if($ar_res = $res->GetNext()){
                                    echo $ar_res['NAME'];
                                }else{
                                    echo "-";
                                }
                                ?>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11C18.7348 11 18.4804 11.1054 18.2929 11.2929C18.1054 11.4804 18 11.7348 18 12V18C18 18.2652 17.8946 18.5196 17.7071 18.7071C17.5196 18.8946 17.2652 19 17 19H3C2.73478 19 2.48043 18.8946 2.29289 18.7071C2.10536 18.5196 2 18.2652 2 18V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H9C9.26522 3 9.51957 2.89464 9.70711 2.70711C9.89464 2.51957 10 2.26522 10 2C10 1.73478 9.89464 1.48043 9.70711 1.29289C9.51957 1.10536 9.26522 1 9 1H3C2.20435 1 1.44129 1.31607 0.87868 1.87868C0.316071 2.44129 0 3.20435 0 4V18C0 18.7956 0.316071 19.5587 0.87868 20.1213C1.44129 20.6839 2.20435 21 3 21H17C17.7956 21 18.5587 20.6839 19.1213 20.1213C19.6839 19.5587 20 18.7956 20 18V12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11ZM4 11.76V16C4 16.2652 4.10536 16.5196 4.29289 16.7071C4.48043 16.8946 4.73478 17 5 17H9.24C9.37161 17.0008 9.50207 16.9755 9.62391 16.9258C9.74574 16.876 9.85656 16.8027 9.95 16.71L16.87 9.78L19.71 7C19.8037 6.90704 19.8781 6.79644 19.9289 6.67458C19.9797 6.55272 20.0058 6.42201 20.0058 6.29C20.0058 6.15799 19.9797 6.02728 19.9289 5.90542C19.8781 5.78356 19.8037 5.67296 19.71 5.58L15.47 1.29C15.377 1.19627 15.2664 1.12188 15.1446 1.07111C15.0227 1.02034 14.892 0.994202 14.76 0.994202C14.628 0.994202 14.4973 1.02034 14.3754 1.07111C14.2536 1.12188 14.143 1.19627 14.05 1.29L11.23 4.12L4.29 11.05C4.19732 11.1434 4.12399 11.2543 4.07423 11.3761C4.02446 11.4979 3.99924 11.6284 4 11.76ZM14.76 3.41L17.59 6.24L16.17 7.66L13.34 4.83L14.76 3.41ZM6 12.17L11.93 6.24L14.76 9.07L8.83 15H6V12.17Z" fill="#EEA941"></path>
                                </svg>
                                
                            </a>
                        </li>
                    </ul>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "left1",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left1",
                            "USE_EXT" => "N"
                        )
                    );?>


                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "left2",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left2",
                            "USE_EXT" => "N"
                        )
                    );?>
                </nav>
                <div class="sidebar__bot">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "left3",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left3",
                            "USE_EXT" => "N"
                        )
                    );?>
                    <ul class="sidebar__list2">
                        <li><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/email.php"), false);?></li>
                        <li><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header/copy.php"), false);?></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="top-row">
                    <div class="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="tow-row__left">
                        <div class="top-select">
                            Сайт
                            <select class="nise-select site-choose">
                                <?
                                CModule::IncludeModule('iblock');
                                $arSelect = Array("ID", "NAME");
                                $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "PROPERTY_4_VALUE"=>$USER->GetID());
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                                while($ob = $res->GetNextElement())
                                {
                                    $arFields = $ob->GetFields();
                                    ?>
                                    <option data-siteid="<?=$arFields['ID']?>"<?if($arFields['ID']==currentSiteID($USER->GetID())):?> selected<?endif;?>><?=$arFields['NAME']?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="tow-row__left tow-row__lefе--mid">
                        <a href="/site/site-add/" class="btn-fiolet">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 7H9V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0C7.73478 0 7.48043 0.105357 7.29289 0.292893C7.10536 0.48043 7 0.734784 7 1V7H1C0.734784 7 0.48043 7.10536 0.292893 7.29289C0.105357 7.48043 0 7.73478 0 8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H7V15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16C8.26522 16 8.51957 15.8946 8.70711 15.7071C8.89464 15.5196 9 15.2652 9 15V9H15C15.2652 9 15.5196 8.89464 15.7071 8.70711C15.8946 8.51957 16 8.26522 16 8C16 7.73478 15.8946 7.48043 15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7Z" fill="white"/>
                            </svg> Добавить сайт
                        </a>
                    </div>
                    <?
                    global $USER;
                    $rsUser = CUser::GetByID($USER->GetID());
                    $arUser = $rsUser->Fetch();
                    ?>
                    <div class="top-row__right">
                        <a href="" class="btn-fiolet">Premium</a>
                        <div class="avatar">
                            <div class="avatar__img" style="background-image: url('<?= $arUser['PERSONAL_PHOTO'] ? CFile::GetPath($arUser['PERSONAL_PHOTO']) : "/assets/img/no-photo.png"?>');"></div>
                            <div class="menu">
                                <nav class="nav">
                                    <div class="close">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.1875 4.8125L4.8125 17.1875" stroke="#E5E5E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17.1875 17.1875L4.8125 4.8125" stroke="#E5E5E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:menu",
                                        "personal1",
                                        Array(
                                            "ALLOW_MULTI_SELECT" => "N",
                                            "CHILD_MENU_TYPE" => "left",
                                            "DELAY" => "N",
                                            "MAX_LEVEL" => "1",
                                            "MENU_CACHE_GET_VARS" => array(""),
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "ROOT_MENU_TYPE" => "personal1",
                                            "USE_EXT" => "N"
                                        )
                                    );?>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:menu",
                                        "personal2",
                                        Array(
                                            "ALLOW_MULTI_SELECT" => "N",
                                            "CHILD_MENU_TYPE" => "left",
                                            "DELAY" => "N",
                                            "MAX_LEVEL" => "1",
                                            "MENU_CACHE_GET_VARS" => array(""),
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "ROOT_MENU_TYPE" => "personal2",
                                            "USE_EXT" => "N"
                                        )
                                    );?>
                                    <ul>
                                        <li>
                                            <a href="<?=$APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), array("login","logout","register","forgot_password","change_password"));?>">
                                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 10C0 10.2652 0.105357 10.5196 0.292893 10.7071C0.48043 10.8946 0.734784 11 1 11H8.59L6.29 13.29C6.19627 13.383 6.12188 13.4936 6.07111 13.6154C6.02034 13.7373 5.9942 13.868 5.9942 14C5.9942 14.132 6.02034 14.2627 6.07111 14.3846C6.12188 14.5064 6.19627 14.617 6.29 14.71C6.38296 14.8037 6.49356 14.8781 6.61542 14.9289C6.73728 14.9797 6.86799 15.0058 7 15.0058C7.13201 15.0058 7.26272 14.9797 7.38458 14.9289C7.50644 14.8781 7.61704 14.8037 7.71 14.71L11.71 10.71C11.801 10.6149 11.8724 10.5028 11.92 10.38C12.02 10.1365 12.02 9.86346 11.92 9.62C11.8724 9.49725 11.801 9.3851 11.71 9.29L7.71 5.29C7.61676 5.19676 7.50607 5.1228 7.38425 5.07234C7.26243 5.02188 7.13186 4.99591 7 4.99591C6.86814 4.99591 6.73757 5.02188 6.61575 5.07234C6.49393 5.1228 6.38324 5.19676 6.29 5.29C6.19676 5.38324 6.1228 5.49393 6.07234 5.61575C6.02188 5.73757 5.99591 5.86814 5.99591 6C5.99591 6.13186 6.02188 6.26243 6.07234 6.38425C6.1228 6.50607 6.19676 6.61676 6.29 6.71L8.59 9H1C0.734784 9 0.48043 9.10536 0.292893 9.29289C0.105357 9.48043 0 9.73478 0 10ZM13 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7C1.26522 7 1.51957 6.89464 1.70711 6.70711C1.89464 6.51957 2 6.26522 2 6V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H13C13.2652 2 13.5196 2.10536 13.7071 2.29289C13.8946 2.48043 14 2.73478 14 3V17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V14C2 13.7348 1.89464 13.4804 1.70711 13.2929C1.51957 13.1054 1.26522 13 1 13C0.734784 13 0.48043 13.1054 0.292893 13.2929C0.105357 13.4804 0 13.7348 0 14V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V3C16 2.20435 15.6839 1.44129 15.1213 0.87868C14.5587 0.316071 13.7956 0 13 0Z" fill="#FDD290"></path>
                                                </svg> Выйти
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title">
                    <?$APPLICATION->ShowTitle();?>
                </div>

    <?endif;?>
    <?/*global $USER;?>
    <?=$USER->GetID()?><br>
    <?=currentSiteID($USER->GetID());?>
    <pre><?print_r($_SESSION)?></pre>
    <?*/?>