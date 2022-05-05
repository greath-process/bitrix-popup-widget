<?

IncludeModuleLangFile(__FILE__);
use \Bitrix\Main\ModuleManager;

Class Logelems extends CModule
{

    var $MODULE_ID = "logelems";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "1.0.0";
        $this->MODULE_VERSION_DATE = "29.08.2021";
        $this->MODULE_NAME = "Логгирование элементов";
        $this->MODULE_DESCRIPTION = "Логгирование изменений элементов выбранных инфоблоков, тестовый модуль";
        $this->PARTNER_NAME = "Денис Великий";
        $this->PARTNER_URI = "https://www.linkedin.com/in/denis-velykyi-7a683b1b6/";
    }

    function DoInstall()
    {
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule($this->MODULE_ID);
        return true;
    }

    function DoUninstall()
    {
		$context = Bitrix\Main\Application::getInstance()->getContext();
		$request = $context->getRequest();
		$step = intval($request["step"]);

		if($step < 2)
		{
			$APPLICATION->IncludeAdminFile(GetMessage("ELEMENTSLOG_UNINSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/local/modules/logelems/install/unstep1.php");
		}
		elseif($step == 2)
		{
			if($request["step"] != 'Y')
            {
                $this->UnInstallDB();
            }
			$this->UnInstallEvents();
			$this->UnInstallFiles();

			\Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);

			$APPLICATION->IncludeAdminFile(GetMessage("ELEMENTSLOG_UNINSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/local/modules/logelems/install/unstep2.php");
		}
        return true;
    }

    function InstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/logelems/install/db/install.sql");
        if (!$this->errors) {

            return true;
        } else
            return $this->errors;
    }

    function UnInstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/logelems/install/db/uninstall.sql");
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles()
    {
        //CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/logelems/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin", true);
        return true;
    }

    function UnInstallFiles()
    {
		//DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/logelems/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
        return true;
    }
}