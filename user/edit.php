<?php //USER
require_once('../lib/init.php');
require_once('../lib/checks/accepted.php');

$STH = new StatementHandler($PDO);
$u = new User($STH);
$user_id = Input::get('user_id');
$check = $u->isLoggedIn($user_id);
if ($check >= 2){
    if ($accepted){
        $t = new Template('Edit User', array('main', 'form', 'edit'), 'edit_user_form.php', 'Edit your account details in the Wellspring database!', array('edit'));
        require_once(Config::get('root/content') . 'template/template.php');
    } else {
        $t = new Template("Access Error | Edit User", array('main'), 'errors/access.html', 'The user editor was accessed in error.', array('view'));
        require_once(Config::get('root/content') . 'template/template.php');
    }
} elseif ($check == 1){
    $t = new Template("Access Error | Edit User", array('main'), 'errors/access.html', 'The user editor was accessed in error.', array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
} elseif ($check == 0){
    Input::put('resource', 'user');
    $t = new Template("404 | Edit User", array('main'), 'errors/404.php', 'We couldn\'t find that user, sorry!', array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
}
?>