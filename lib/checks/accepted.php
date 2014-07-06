<?php
$STH = new StatementHandler($PDO);
$u = new User($STH);
$l = Session::get('uid');
$a = $u->isAccepted($l);
return $a;
?>