<?php
require_once('../lib/init.php');
$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
//Find a way to check that a song exists
$i = Input::get('song_id');
$check = $s->exists($i);
if ($check){
    $view = $s->viewSong(escape(Input::get('song_id')));
    $t = new Template($view['song_name']. " | Song View", array('main', 'song'), 'view_song_content.php', array('view'));
    require_once(Config::get('root/content') . 'template/view_template.php');
} else {
    Input::put('resource', 'song');
    $t = new Template("404 | Song View", array('main'), 'errors/404.php', array('view'));
    require_once(Config::get('root/content') . 'template/view_template.php');
}
?>