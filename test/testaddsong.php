<?php
require_once('classes/database.php');
require_once('classes/songmanager.php');

$SH = new SongManager($PDO, 0);
$view = $SH->viewSong(11);
var_dump($view);
?>