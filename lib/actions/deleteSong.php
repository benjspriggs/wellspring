<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$info = json_decode(Input::get('info')); //Pre-existing song information
$id = htmlspecialchars_decode($info->song_id);
$uid = Session::get('uid');
$SM->deleteSong($id, $uid);
$SM->getErrors();
$STH->getErrors();
?>