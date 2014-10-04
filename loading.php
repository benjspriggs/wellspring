<?php
ob_start();
require 'lib/init.php';

if (Token::check(Input::get('token'))){
    $a = array('logIn',
               'verifyEmail',
               'registerUser',
               'updateUser',
               'deleteUser',
               'addSong',
               'updateSong',
               'deleteSong',
               'addGroup',
               'updateGroup',
               'deleteGroup');
    if (in_array(Input::get('action'), $a)){
        ob_start();
        require_once 'lib/actions/'. Input::get('action') .'.php';
        ob_flush();
    }
} elseif (Token::check(Input::get('exittoken'))){
    require_once 'lib/actions/logOut.php';
} else {
    echo 'CSRF test failed.<br>';
}


if (!empty($_SERVER['HTTP_REFERER'])) {
    echo 'PREPARE FOR REDIRECTION. RESISTANCE IS FUTILE. T-MINUS 5 SECONDS.<br>';
    header("Refresh:5; url=". $_SERVER['HTTP_REFERER'], true, 303);
}

switch (Input::get('action')){
    case("addSong"):
        echo "<a href=\"write\">Return to upload page</a>";
        break;
    case("logIn"):
    case("verifyEmail"):
        echo "<a href=\"login\">Return to login page</a>";
        break;
    case("registerUser"):
        echo "<a href=\"register\">Return to register page</a>";
        break;
    default:
        echo "<a href=\"home\">Return to home</a>";
        break;
}

ob_end_flush();
?>