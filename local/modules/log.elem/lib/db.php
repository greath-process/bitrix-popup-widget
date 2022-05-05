<?php

namespace Log\Elem;

class DB extends Entity\DataManager
{
    public static function getFilePath()
    {
        return __FILE__;
    }

    public static function getTableName()
    {
        return 'bx_log_elems';
    }

    public static function getMap()
    {
        return array(
            'EVENT' => array(
                'data_type' => 'varchar',
                'title' => Loc::getMessage('STAT_ENTITY_COUNT_FIELD'),
            ),
            'IBLOCK_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('STAT_ENTITY_COUNT_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'varchar',
                'title' => Loc::getMessage('STAT_ENTITY_COUNT_FIELD'),
            ),
            'DATE_AND_TIME_RECORD' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('STAT_ENTITY_TIME_FIELD'),
            ),
            'DATE_RECORD' => array(
                'data_type' => 'date',
                'title' => Loc::getMessage('STAT_ENTITY_TIME_FIELD'),
            ),
            'USER_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('STAT_ENTITY_COUNT_FIELD'),
            ),   
        );
    }

    public static function DoLog(&$arFields) 
    {
        $ibloks = COption::GetOptionString("log.elem", "ibloks");
        if($ibloks!="")
            $ibloks = explode(",",$default_group);

        if (in_array($arFields['IBLOCK_ID'], $ibloks))
        {

            // добавить тип ADD, UPDATE, DELETE и проверить
            // вывести второй вкладкой таблицу

            self::add(array(
                'EVENT' => $count,
                'IBLOCK_ID' => $arFields['IBLOCK_ID'],
                'NAME' => $arFields['NAME'],
                'DATE_AND_TIME_RECORD' => new \Bitrix\Main\Type\DateTime(null,0),
                'DATE_RECORD' => new \Bitrix\Main\Type\Date(null,0),
                'USER_ID' => $arFields['MODIFIED_BY'],
            ));
        }
    }
}
