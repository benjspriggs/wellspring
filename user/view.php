<?php //USER
require_once('../lib/init.php');
$STH = new StatementHandler($PDO);
$u = new User($STH);
$i = Input::get('user_id');
$name = $u->getUsername($i);
if ($name){
    $t = new Template($name. "'s profile ", array('main', 'user'), 'profile_basic.php', "User profile of $name", array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
} else {
    Input::put('resource', 'user');
    $t = new Template("404 | User Profile", array('main'), 'errors/404.php', 'Sorry, we couldn\'t find that user!', array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
}
?>