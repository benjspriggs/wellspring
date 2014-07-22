<?php
require 'lib/init.php';

if (Token::check(Input::get('token'))){
    $a = array('logIn', 'verifyEmail', 'registerUser', 'addSong', 'updateSong', 'deleteSong');
    if (in_array(Input::get('action'), $a)){
        require_once 'lib/actions/'. Input::get('action') .'.php';
    }
} elseif (Token::check(Input::get('exittoken'))){
    require_once 'lib/actions/logOut.php';
} else {
    echo 'CSRF test failed.<br>';
}

switch (Input::get('action')){
    case("addSong"):
        echo "<a href=\"write.php\">Return to upload page</a>";
        break;
    case("logIn"):
    case("verifyEmail"):
        echo "<a href=\"login.php\">Return to login page</a>";
        break;
    case("registerUser"):
        echo "<a href=\"register.php\">Return to register page</a>";
        break;
    default:
        echo "<a href=\"home.php\">Return to home</a>";
        break;
}
?>