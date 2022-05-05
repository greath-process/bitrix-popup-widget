<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="auth">
    <div class="auth-form">
        <img src="/assets/img/auth/a-logo.svg">
        <div class="site-name">
            RichLink
        </div>
		<form id="auth-form">
		    <label style="text-align: center;color: red;">
				<?=$arParams["MESSAGE_TEXT"]?>
		    </label>
		    <div class="auth-form__name">Вход</div>
		    <label>
		        Email
		    </label>
		    <div class="input">
		        <input type="text" name="login">
		    </div>
		    <label>
		        Пароль
		    </label>
		    <div class="input">
		        <input type="password" rel="to-replace" name="password">
		        <a href="/auth/?forgot_password=yes" class="link">Забыли пароль?</a>
		    </div>
		    <button type="submit">
		        Войти
		    </button>
		    <label id="auth-message" style="text-align: center;color: red;"></label>
		    <div class="uge">
		        Не зарегистрированы?<a href="/register/" class="link"> Зарегистрироваться</a>
		    </div>
		</form>
    </div>
</div>