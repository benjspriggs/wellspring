<?php
$STH = new StatementHandler($PDO);
$u = new User($STH);
$uid = Session::get('uid');
$accepted = $u->isAccepted($uid);
return $accepted;
?>