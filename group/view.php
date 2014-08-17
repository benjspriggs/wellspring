<?php //GROUP
require_once('../lib/init.php');
$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
$i = Input::get('group_id');
$check = $s->exists($i, 'group');
if ($check){
    $view = $s->viewGroup(escape(Input::get('group_id')), TRUE);
    $t = new Template($view['group_name']. " | Song View", array('main', 'song'), 'view_group_basic.php', array('view'));
    require_once(Config::get('root/content') . 'template/view_template.php');
} else {
    Input::put('resource', 'group');
    $t = new Template("404 | Group View", array('main'), 'errors/404.php', array('view'));
    require_once(Config::get('root/content') . 'template/view_template.php');
}
?>