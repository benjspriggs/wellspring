<?php
require_once('lib/init.php');
$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
//Find a way to check that a song exists
$i = Input::get('song_id');
$check = $s->exists($i);
if ($check){
    $array = $s->viewSong(escape(Input::get('song_id')));
    $view = $array;
    $t = new Template($view['song_name']. " | Song View", array('main', 'view'), 'view_content.php', array('view'));
    require_once('lib/content/template/view_template.php');
} else {
    $view = array('song_name' => '404');
    Input::put('resource', 'song');
    $t = new Template($view['song_name']. " | Song View", array('main', 'view'), 'errors/404.php', array('view'));
    require_once('lib/content/template/view_template.php');
}


?>