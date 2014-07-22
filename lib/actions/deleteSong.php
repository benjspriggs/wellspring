<?php
$info = json_decode(Input::get('info')); //Pre-existing song information
$id = htmlspecialchars_decode($info->song_id);
$uid = Session::get('uid');
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$SM->deleteSong($id, $uid);
$SM->getErrors();
$STH->getErrors();
?>