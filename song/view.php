<?php //SONG
require_once('../lib/init.php');
$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
$i = Input::get('song_id');
$check = $s->exists($i);
if ($check){
    $view = $s->viewSong(escape(Input::get('song_id')));
    $t = new Template($view['song_name']. " | Song View", array('main', 'song'), 'view_song_content.php', 'View a song in the Wellspring database!', array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
} else {
    Input::put('resource', 'song');
    $t = new Template("404 | Song View", array('main'), 'errors/404.php', 'We couldn\'t find that song, sorry!', array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
}
?>