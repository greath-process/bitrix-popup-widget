<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<?global $USER;if(!$USER->IsAuthorized()):?>

    <div class="auth">
        <div class="auth-form">
            <img src="/assets/img/auth/a-logo.svg">
            <div class="site-name">
                RichLink
            </div>
            <form id="register-form">
                <div class="auth-form__name">Регистрация</div>
                <label>
	                Ваше имя
	            </label>
                <div class="input">
                    <input type="text" name="name">
                </div>
                <label>
	                Email
	            </label>
                <div class="input">
                    <input type="text" name="email">
                </div>
                <label>
	                Пароль
	            </label>
                <div class="input">
                    <input type="password" rel="to-replace" name="password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="checkbox" checked="checked" name="checkbox">
                    <label for="checkbox">
	                    <span>я принимаю условия <a href="/policy/">Договора об оказании услуг, Политики конфиденциальности</a></span>
	                </label>
                </div>
                <button type="submit">
	                Зарегистрироваться
	            </button>
				<label id="reg-message" style="text-align: center;color: red;"></label>
                <div class="uge">
                    Уже зарегистрированы? <a href="/auth/" class="link">Войти</a>
                </div>
            </form>
        </div>
    </div>

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