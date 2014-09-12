<?php
$fp = dirname(__FILE__);
require_once $fp . '/database';
require_once $fp . '/functions';
require_once $fp . '/config';


spl_autoload_register(function($class){
    if (is_file(dirname(__FILE__). '/classes/'. $class .'')){
        include dirname(__FILE__). '/classes/'. $class .'';
    }}, true);

session_save_path(Config::get('session/save_loc'));

Session::create();

//Session garbage checks
//Delete the old sessions from the database periodically, once every day
$STH = new StatementHandler($PDO);
$t = Config::get('session/expiry');
$STH->query('DELETE FROM '. Config::get('session/db') .' WHERE `timestamp` < (NOW() - INTERVAL '. $t .');');
$user = new User($STH);
if (($user->isLoggedIn(Session::get('uid'))) <= 1.5 && Session::get('uid') != NULL){
    session_unset();
}
?>