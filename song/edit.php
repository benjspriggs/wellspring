<?php //SONG
require_once('../lib/init.php');
require_once('../lib/checks/accepted.php');

$STH = new StatementHandler($PDO);
$s = new SongManager($STH);
$i = Input::get('song_id');
$check = $s->exists($i, 'song');
if ($check){
    if ($accepted){
        $t = new Template('Edit Song', array('main', 'form', 'edit'), 'edit_song_form.php', 'Edit a song in the Wellspring database!', array('edit'));
        require_once(Config::get('root/content') . 'template/template.php');
    } else {
        $t = new Template("Access Error | Song View", array('main'), 'errors/access.html', 'The song editor was accessed in error.', array('view'));
        require_once(Config::get('root/content') . 'template/template.php');
    }
} else {
    Input::put('resource', 'song');
    $t = new Template("404 | Song View", array('main'), 'errors/404.php', 'We couldn\'t find that song, sorry!', array('view'));
    require_once(Config::get('root/content') . 'template/template.php');
}
?>