<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if($_POST['name'] && $_POST['email'] && $_POST['password'] && $_POST['checkbox']=='on'){

    $data = CUser::GetList(
        ($by="ID"), 
        ($order="ASC"),
        array(
            'LOGIN' => $_POST['email']
        )
    );
    if($arUser = $data->Fetch()) {
        //есть такой юзер - ошибка
        echo json_encode(array('type' => 'error', 'mess'=>'<p>Пользователь с указанным E-mail уже зарегистрирован.<p><br>'));
    }else{
        //нет такого юзера
        $USER->Register($_POST['email'], $_POST['name'], '', $_POST['password'], $_POST['password'], $_POST['email']);
        echo json_encode(array('type' => 'success', 'mess'=>'<p>Регистрация прошла успешно. Необходимо подтвердить адрес электронной почты.<p><br>'));
    }
    
}else{

    $error = '';
    if(!$_POST['name'] || !$_POST['email'] || !$_POST['password']){
        $error .= '<p>Все поля обязательны к заполнению.<p><br>';
    }
    if($_POST['checkbox']!='on'){
        $error .= '<p>Согласие с условиями договора об оказании услуг и политикой конфиденциальности обязательны.<p><br>';
    }
    echo json_encode(array('type' => 'error', 'mess'=>$error));

}

?>