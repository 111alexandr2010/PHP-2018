<?php
session_start();
require_once __DIR__ . '/function603.php';

if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
    $login = $_SESSION['login'];
    $pass = $_SESSION['pass'];
    $massage = 'Вы можете воспользоваться WEB-калькулятором!';

    if (auth($login, $pass) === true) {
        $a = isset($_GET['a']) ? ($_GET['a']) : '';
        $b = isset($_GET['b']) ? ($_GET['b']) : '';
        $operation = isset($_GET['operation']) ? ($_GET['operation']) : '';
        ?>
        <html>
        <body>
        <form method="post" action="/Task603/home603.php">
            <p><i><b> Для перехода на главную страницу нажмите эту кнопку <input type="submit" name="Logout" value="Перейти">
                    </b>  </i></p>
            <p><b><?= $massage; ?></b></p>
        </form>
        <form action="home603.php" method="get">
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
                        <?php ; ?>
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
        </form>
        </body>
        </html>
        <?php
        if (isset ($_POST['Logout'])) {
            session_destroy();
            header('Location: /Task603/index603.php');
            exit();
        }
    } else {
        header('Location: /Task603/index603.php');
        exit();
    }
} else {
    header('Location: /Task603/index603.php');
    exit();
}
calculate($a, $b, $operation);

?>

