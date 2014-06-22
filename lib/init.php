<?php
session_save_path('/hermes/bosnaweb04b/b1942/ipw.spricoco/phpsessions');

$fp = dirname(__FILE__);
require_once $fp . '/database.php';
include_once $fp . '/functions.php';
require_once $fp . '/config.php';

spl_autoload_register(function($class){
    if (is_file(dirname(__FILE__). '/classes/'. $class .'.php')){
        include dirname(__FILE__). '/classes/'. $class .'.php';
    }}, true);

Session::create();
//Session garbage checks
//Delete the old sessions from the database periodically, once every day
$STH = new StatementHandler($PDO);
$t = Config::get('session/expiry');
$STH->query('DELETE FROM '. Config::get('session/db') .' WHERE `timestamp` < (NOW() - INTERVAL '. $t .');');
?>