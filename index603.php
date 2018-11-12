<?php
session_start();
require_once __DIR__ . '/function603.php';
$error = null;
if (count($_POST) > 0){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (auth($login, $pass) === true){
        header('Location: /Task603/home603.php');
        exit();
    } else {
        $error = 'Введите верные данные!';
        session_destroy();
    }
}

if (isset($_SESSION['login']) && isset($_SESSION['pass'])){
    $login = $_SESSION['login'];
    $pass = $_SESSION['pass'];
    if (auth($login, $pass) === true){
        header('Location: /Task603/home603.php');
        exit();
    }
}
?>

<p style="color:red;"><?= $error; ?></p>
<html><body>
<form method="post" action="/Task603/index603.php">
    <p>Введите "логин" <input type="text" name="login"></p>
    <p>Введите "пароль" <input type="password" name="pass" ></p>
    <p><input type="submit" value="Login"></p>
</form>
</body> </html>
