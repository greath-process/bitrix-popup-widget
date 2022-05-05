<?
namespace Logging\Elements;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class StatTable
 * 
 * Fields:
 * <ul>
 * <li> COUNT int mandatory
 * <li> TIME datetime optional
 * </ul>
 *
 * @package Bitrix\Data
 **/

class StatTable extends Entity\DataManager
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
			'COUNT' => array(
				'data_type' => 'integer',
				'primary' => true,
				'required' => true,
				'title' => Loc::getMessage('STAT_ENTITY_COUNT_FIELD'),
			),
			'TIME' => array(
				'data_type' => 'datetime',
				'title' => Loc::getMessage('STAT_ENTITY_TIME_FIELD'),
			),
		);
	}
}
/*
\Logging\Elements\StatTable::add(array(
	'COUNT' => $count,
	'TIME' => new \Bitrix\Main\Type\DateTime(null,0)
));
*/
/*		
		При добавлении/изменении/удалении элемента инфоблока 
		//создаваться записи в таблице логов в зависимости от выбранных инфоблоков в настройках модуля.
		if (file_exists($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/sale_send/log_and_pass.php"))

		EVENT – наименование события (допустимые значения ADD, UPDATE, DELETE) при котором было добавлена запись, тип поля: строка;
		IBLOCK_ID – код информационного блока, тип поля: целое число;
		NAME – название элемента инфоблока, тип поля: строка;
		DATE_AND_TIME_RECORD – дата и время события, тип поля: дата и время;
		DATE_RECORD – дата события, тип поля: дата;
		USER_ID 
*/