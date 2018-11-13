<?php
session_start();
require_once __DIR__ . '/function603.php';
//session_destroy();

if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
    $login = $_SESSION['login'];
    $pass = $_SESSION['pass'];

    if (auth($login, $pass) === true) {
        if (isset ($_POST['Logout'])) {
            session_destroy();
            header('Location: C:OSPanel/domains/php/Task603/index603.php');
            exit();
        }

        $a = isset($_GET['a']) ? ($_GET['a']) : '';
        $b = isset($_GET['b']) ? ($_GET['b']) : '';
        $operation = isset($_GET['operation']) ? ($_GET['operation']) : '';

        if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['operation'])) {
            if ($b == 0 && $operation == '/') {
                $message = 'Ошибка!Деление на 0!';
            } else {
                $message = $a . " " . $operation . " " . $b . " = " . calculate($a, $b, $operation);
            }
        }

    } else {
        header('Location:  C:OSPanel/domains/php/Task603/index603.php');
        exit();
    }
} else {
    header('Location: C:OSPanel/domains/php/Task603/index603.php');
    exit();
}

?>
<html>
<body>
<p><b>Вы можете воспользоваться WEB-калькулятором!</b></p>

<form action="C:OSPanel/domains/php/Task603/home603.php" method="get">
    <table>
        <tr>
            <td>Введите первое число:</td>
            <td><input type="text" name="a" value="<?= $a ?>"></td>
        </tr>
        <?php $check = "checked=\"checked\""; ?>
        <tr>
            <td>Выберите знак оператора:</td>
            <td>
                <label>
                    •<input type="radio" <?php if ($_GET['operation'] == "+") {
                        echo $check;
                    }; ?> value="+" name="operation"> +
                </label><br/>
                <label>
                    •<input type="radio"<?php if ($_GET['operation'] == "-") {
                        echo $check;
                    }; ?> value="-" name="operation"> -
                </label><br/>
                <label>
                    •<input type="radio"<?php if ($_GET['operation'] == "*") {
                        echo $check;
                    }; ?> value="*" name="operation"> *
                </label><br/>
                <label>
                    •<input type="radio" <?php if ($_GET['operation'] == "/") {
                        echo $check;
                    }; ?>value="/" name="operation"> /
                </label>
            </td>
        </tr>
        <br/>
        <tr>
            <td>Введите второе число:</td>
            <td><input type="text" name="b" value="<?= $b ?>"></td>
        </tr>
        <tr>
            <td>Для вывода результата нажмите эту кнопку</td>
            <td><input type="submit" value="  =  "></td>
        </tr>
    </table>
    <?= $message;?>
</form>
<form method="post" action="C:OSPanel/domains/php/Task603/home603.php">
    <p><i><b> Для перехода на главную страницу нажмите эту кнопку <input type="submit" name="Logout" value="Перейти">
            </b> </i></p>
</form>
</body>
</html>


