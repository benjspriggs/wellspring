<?php
session_start();
$fp = dirname(__FILE__);
require_once $fp . '/database.php';
include_once $fp . '/functions.php';
require_once $fp . '/config.php';

spl_autoload_register(function($class){
    if(is_file(dirname(__FILE__). '/classes/'. $class .'.php')){
        include dirname(__FILE__). '/classes/'. $class .'.php';
    }}, true);
?>