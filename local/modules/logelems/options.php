<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\HttpApplication;
use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

$request = HttpApplication::getInstance()->getContext()->getRequest();
$module_id = htmlspecialchars($request['mid'] != '' ? $request['mid'] : $request['id']);
Loader::includeModule($module_id);
Loader::includeModule('iblock');

$dbItem = \Bitrix\Iblock\IblockTable::getList(array(
    'select' => array('ID', 'NAME'),
    'filter' => array('ACTIVE' => 'Y'),
    'order' => array('NAME' => 'ASC')
));
while ($arItem = $dbItem->fetch()) 
{
    $IBLOKS[ $arItem['ID'] ] = $arItem['NAME'];
}

$aTabs = array(
    array(
        'DIV'     => 'edit1',
        'TAB'     => Loc::getMessage('LOGELEMS_OPTIONS_TAB_GENERAL'),
        'TITLE'   => Loc::getMessage('LOGELEMS_OPTIONS_TAB_GENERAL'),
        'OPTIONS' => array(
            array(
                'ibloks',
                Loc::getMessage('LOGELEMS_OPTIONS_IBLOKS'),
				'',
                array(
                    'selectbox',
                    $IBLOKS
                )
            )
        )
    ),
);

/*
 * Создаем форму для редактирвания параметров модуля
 */
$tabControl = new CAdminTabControl(
    'tabControl',
    $aTabs
);

$tabControl->begin();
?>
<form action="<?= $APPLICATION->getCurPage(); ?>?mid=<?=$module_id; ?>&lang=<?= LANGUAGE_ID; ?>" method="post">
    <?= bitrix_sessid_post(); ?>
    <?php
    foreach ($aTabs as $aTab) { // цикл по вкладкам
        if ($aTab['OPTIONS']) {
            $tabControl->beginNextTab();
            __AdmSettingsDrawList($module_id, $aTab['OPTIONS']);
        }
    }
    $tabControl->buttons();
    ?>
    <input type="submit" name="apply" 
           value="<?= Loc::GetMessage('LOGELEMS_OPTIONS_INPUT_APPLY'); ?>" class="adm-btn-save" />
</form>

<?php
$tabControl->end();

/*
 * Обрабатываем данные после отправки формы
 */
if ($request->isPost() && check_bitrix_sessid()) {

    foreach ($aTabs as $aTab) { // цикл по вкладкам
        foreach ($aTab['OPTIONS'] as $arOption) {
            if (!is_array($arOption)) { // если это название секции
                continue;
            }
            if ($arOption['note']) { // если это примечание
                continue;
            }
            if ($request['apply']) { // сохраняем введенные настройки
                $optionValue = $request->getPost($arOption[0]);
                if ($arOption[0] == 'switch_on') {
                    if ($optionValue == '') {
                        $optionValue = 'N';
                    }
                }
                if ($arOption[0] == 'jquery_on') {
                    if ($optionValue == '') {
                        $optionValue = 'N';
                    }
                }
                Option::set($module_id, $arOption[0], is_array($optionValue) ? implode(',', $optionValue) : $optionValue);
            } elseif ($request['default']) { // устанавливаем по умолчанию
                Option::set($module_id, $arOption[0], $arOption[2]);
            }
        }
    }

    LocalRedirect($APPLICATION->getCurPage().'?mid='.$module_id.'&lang='.LANGUAGE_ID);

}
?>