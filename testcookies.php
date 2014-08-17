<?php
require_once('lib/init.php');
Cookie::create(Config::get('remember/cookie_name'), TRUE, Config::get('remember/cookie_expiry'));
Cookie::destroy(Config::get('remember/cookie_name'));
//header("Location: home.php");
?>