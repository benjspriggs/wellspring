<?php //USER
require_once('../lib/init');
require_once('../lib/checks/accepted');

$STH = new StatementHandler($PDO);
$u = new User($STH);
$user_id = Input::get('user_id');
$check = $u->isLoggedIn($user_id);
if ($check >= 2){
    if ($accepted){
        $t = new Template('Edit User', array('main', 'form', 'edit'), 'edit_user_form', 'Edit your account details in the Wellspring database!', array('edit'));
        require_once(Config::get('root/content') . 'template/template');
    } else {
        $t = new Template("Access Error | Edit User", array('main'), 'errors/access.html', 'The user editor was accessed in error.', array('view'));
        require_once(Config::get('root/content') . 'template/template');
    }
} elseif ($check == 1){
    $t = new Template("Access Error | Edit User", array('main'), 'errors/access.html', 'The user editor was accessed in error.', array('view'));
    require_once(Config::get('root/content') . 'template/template');
} elseif ($check == 0){
    Input::put('resource', 'user');
    $t = new Template("404 | Edit User", array('main'), 'errors/404', 'We couldn\'t find that user, sorry!', array('view'));
    require_once(Config::get('root/content') . 'template/template');
}
?>