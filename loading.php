<?php
require 'lib/init.php';

switch(Input::get('action')){
    case("logOut"):
        require_once 'lib/actions/logOut.php';
        break;
    case("addSong"):
        require_once 'lib/actions/addSong.php';
        break;
    case("logIn"):
        require_once 'lib/actions/logIn.php';
        break;
    case("verifyEmail"):
        require_once 'lib/actions/verifyEmail.php';
        break;
    case("registerUser"):
        require_once 'lib/actions/registerUser.php';
        break;
}
echo "<a href=\"home.php\">Home</a>";
//header("Location: home.php");
?>