<?php
require_once('../lib/init.php');
require_once('../lib/actions/userIsLoggedin.php');
$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
$i = Input::get('song_id');
$check = $s->exists($i);
if ($check){
    if ($a){
        $t = new Template('Edit Song', array('main', 'form', 'edit'), 'edit_song_form.php', array('edit'));
        require_once(Config::get('root/content') . 'template/template.php');
    } else {
        $t = new Template("Access Error | Song View", array('main'), 'errors/access.html', array('view'));
        require_once(Config::get('root/content') . 'template/view_template.php');
    }
} else {
    Input::put('resource', 'song');
    $t = new Template("404 | Song View", array('main'), 'errors/404.php', array('view'));
    require_once(Config::get('root/content') . 'template/view_template.php');
}
?>