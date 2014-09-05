<?php
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
        require_once 'lib/actions/'. Input::get('action') .'.php';
    }
} elseif (Token::check(Input::get('exittoken'))){
    require_once 'lib/actions/logOut.php';
} else {
    echo 'CSRF test failed.<br>';
}
##Uncomment to automatically redirect after error/ success page
//if (!empty($_SERVER['HTTP_REFERER'])) {
//    header("Refresh:5; url=". $_SERVER['HTTP_REFERER'], true, 303);
//}

if (!empty($_SERVER['HTTP_REFERER'])) {
    header("Refresh:5; url=". $_SERVER['HTTP_REFERER'], true, 303);
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