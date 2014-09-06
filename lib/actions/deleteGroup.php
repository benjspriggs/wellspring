<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$info = json_decode(Input::get('info')); //Pre-existing song information
$id = htmlspecialchars_decode($info->group_id);
ob_start();
require_once(Config::get('root/lib').'checks/loggedin.php');
require_once(Config::get('root/lib').'checks/accepted.php');
ob_flush();
if ($loggedin && $accepted){
    $SM->destroyGroup($id, $uid);
    $SM->getErrors();
    $STH->getErrors();
}
?>