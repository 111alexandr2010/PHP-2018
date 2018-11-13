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
    $result = '';
    switch ($operation) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
        case '/':
            if ($b != 0) {
                $result = $a / $b;
            }
            break;
    }

    file_put_contents('C:OSPanel/domains/php/Task603/data/data603.txt', "$a  $operation  $b = $result" . PHP_EOL, FILE_APPEND);
    return $result;
}
