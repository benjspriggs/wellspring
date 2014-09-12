<?php
$STH = new StatementHandler($PDO);
$User = new User($STH);

$info = json_decode(Input::get('info')); //Pre-existing song information
$id = htmlspecialchars_decode($info->user_id);
ob_start();
require_once(Config::get('root/lib').'checks/loggedin');
ob_flush();
if ($loggedin){
    $User->deleteUser($id);
    $User->getErrors();
    $STH->getErrors();
}
?>