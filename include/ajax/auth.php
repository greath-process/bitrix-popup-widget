<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
//if(!empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=='xmlhttprequest'){
	if(!$USER->IsAuthorized()){
		$res = $USER->Login(strip_tags($_POST['login']), strip_tags($_POST['password']), 'Y');
		if(empty($res['MESSAGE'])){
			echo json_encode(array('type' => 'success'));
		}else{
			echo json_encode(array('type' => 'error', 'mess'=>'<p>'.strip_tags($res['MESSAGE']).'</p><br>'));
		}
	}
//}
?>