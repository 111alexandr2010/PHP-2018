<?php

function auth($login, $pass)
{
    $trueLogin = 'admin';
    $truePassword = 111;

    if ($login == $trueLogin && $pass == $truePassword) {
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        return true;
    };

    return false;
}

function calculate($a, $b, $operation)
{
    switch ($operation) {
        case '+':
            $result = $a + $b;
            $srt1 = "$a  $operation  $b = $result";
            echo $srt1;
            file_put_contents('data/data603.txt', $srt1 . PHP_EOL, FILE_APPEND);
            break;
        case '-':
            $result = $a - $b;
            $srt2 = "$a  $operation  $b = $result";
            echo $srt2;
            file_put_contents('data/data603.txt', $srt2 . PHP_EOL, FILE_APPEND);
            break;
        case '*':
            $result = $a * $b;
            $srt3 = "$a  $operation  $b = $result";
            echo $srt3;
            file_put_contents('data/data603.txt', $srt3 . PHP_EOL, FILE_APPEND);
            break;
        case '/':
            if ($b == 0) {
                echo 'Ошибка!Деление на 0!';
            } else {
                $result = $a / $b;
                $srt4 = "$a  $operation  $b = $result";
                echo $srt4;
                file_put_contents('data/data603.txt', $srt4 . PHP_EOL, FILE_APPEND);
            }
            break;
    }
}
