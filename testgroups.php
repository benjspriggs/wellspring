<?php
require_once('lib/init.php');
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH, 1);
$song_id = array(30,32,33,34);
$SM->newGroup($song_id, 2, 'test', 'this is a test');
$SM->getErrors();
echo "Group created.";
?>