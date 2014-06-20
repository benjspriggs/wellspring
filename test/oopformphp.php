<?php
require_once 'core/init.php';

$_POST['sname'] = 'ricky';
$_POST['sdesc'] = 'thing';
$_POST['lyrics'] = 'heyo';

$song_name = $_POST['sname'];
$song_desc = $_POST['sdesc'];
$lyrics = $_POST['lyrics'];
$ricky = new Song($song_name, $song_desc, $lyrics);
$SM = new SongManager($PDO, 0);
//Statment handler

$SM->addSong($ricky);
//add a header("Location: nextpage.php") here, but make sure that no text is returned.
//or AJAX
//AJAX works
?>