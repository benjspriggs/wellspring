<?php
require_once('../lib/init');
require_once('../lib/checks/accepted');

$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
$i = Input::get('group_id');
$check = $s->exists($i, 'group');
if ($check){
    if ($accepted){
        $t = new Template('Edit Song', array('main', 'form', 'edit'), 'edit_group_form', 'Edit a group in the Wellspring database!', array('edit'));
        require_once(Config::get('root/content') . 'template/template');
    } else {
        $t = new Template("Access Error | Song View", array('main'), 'errors/access.html', 'The group editor was accessed in error.', array('view'));
        require_once(Config::get('root/content') . 'template/template');
    }
} else {
    Input::put('resource', 'song');
    $t = new Template("404 | Song View", array('main'), 'errors/404', 'We couldn\'t find that group, sorry!', array('view'));
    require_once(Config::get('root/content') . 'template/template');
}
?>