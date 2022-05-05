<?
$_SESSION['USER_SITE_ID'] = '';
function currentSiteID($user_id)
{
    CModule::IncludeModule('iblock');
    global $_SESSION;
    if($_SESSION['USER_SITE_ID'] > 0)
    {
        return $_SESSION['USER_SITE_ID'];
    }
    else
    {
        $arSelect = Array("ID", "NAME");
        $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "PROPERTY_4_VALUE"=>$user_id);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        $str = $res->result;
        $find = $str->num_rows; 
        if($find !== 0)
        {
            if($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                $_SESSION['USER_SITE_ID'] = $arFields['ID'];
                return $_SESSION['USER_SITE_ID'];
            }
        }
        else
        {
            $_SESSION['USER_SITE_ID'] = 16;
            return $_SESSION['USER_SITE_ID'];
        }
    }
}

AddEventHandler("main", "OnBeforeProlog", "MyOnBeforePrologHandler", 50);
function MyOnBeforePrologHandler()
{
    global $_SESSION;
    if(empty($_SESSION['SAVED_USER_ID']) || $_SESSION['SESS_AUTH']['USER_ID'] <= 0)
        $_SESSION['SAVED_USER_ID'] = $_SESSION['SESS_AUTH']['USER_ID'];
    if(!empty($_SESSION['SAVED_USER_ID']) && $_SESSION['SAVED_USER_ID'] != $_SESSION['SESS_AUTH']['USER_ID'])
        unset($_SESSION['USER_SITE_ID']);
}
?>