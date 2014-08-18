<?php //GROUP
require_once('../lib/init.php');
$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
if (Input::exists('get')){
    //They wanna see a specific group
    $i = Input::get('group_id');
    $check = $s->exists($i, 'group');
    if ($check){
        $view = $s->viewGroup(escape(Input::get('group_id')), TRUE);
        $t = new Template($view['group_name']. " | Group View", array('main', 'song'), 'view_group_basic.php', 'View all groups in the Wellspring database!', array('view'));
        require_once(Config::get('root/content') . 'template/template.php');
    } else {
        Input::put('resource', 'group');
        $t = new Template("404 | Group View", array('main'), 'errors/404.php', '404, that group could not be found.', array('view'));
        require_once(Config::get('root/content') . 'template/template.php');
    }
} else {
    //They just wanna see groups
    $t = new Template('Groups', array('main', 'song'), 'group_view_content.php', 'View a group in the Wellspring database!',array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
}



?>