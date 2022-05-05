<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>

<?global $USER;if(!$USER->IsAuthorized()):?>

<?else:?>
    <div class="auth">
        <div class="auth-form">
            <img src="/assets/img/auth/a-logo.svg">
            <div class="site-name">
                RichLink
            </div>
            <form style="text-align: center;">
                <p>Вы зарегистрированы и успешно авторизовались.</p>
                <p><a href="/">Вернуться на главную страницу</a></p>
            </form>
        </div>
    </div>
<?endif;?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>