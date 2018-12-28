<?php
if($act === 'login'):?>
    <form action="login" method="post">
        <p>Логин</p>
        <input type="text" name="login">
        <p>Пароль</p>
        <input type="password" name="password"><br>
        <input type="Submit" value="Войти">
    </form>
<?php endif;?>
<?php if($act === 'reg'):?>
    <form action="reg" method="post">
        <p>Ваше имя</p>
        <input type="text" name="name">
        <p>Ваша фамилия</p>
        <input type="text" name="surname">
        <p>Логин</p>
        <input type="text" name="login">
        <p>Пароль</p>
        <input type="password" name="password"><br>
        <input type="Submit" value="Зарегистрироваться">
    </form>
<?php endif;?>
