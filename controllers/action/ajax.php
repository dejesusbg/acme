<?php

session_start();

$_SESSION["AJAX"] = json_encode("");

function send_response($res, $code = 201)
{
    if (is_bool($res)) {
        $res = ["done" => $res];
        !$res and $code = 401;
    }

    $_SESSION["AJAX"] = json_encode($res);

    http_response_code($code);
    echo json_encode($res);
}

function array_session($array, $sufix)
{
    foreach ($array as $index => $value) {
        $new_index = strtoupper($index) . '_' . $sufix;
        $_SESSION[$new_index] = $value;
    }
}

