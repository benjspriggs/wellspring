<?php
$STH = new StatementHandler($PDO);
$u = new User($STH);
$uid = Session::get('uid');
$a = $u->isAccepted($uid);
return $a;
?>