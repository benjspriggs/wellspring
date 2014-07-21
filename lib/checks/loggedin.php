<?php
$STH = new StatementHandler($PDO);
$u = new User($STH);
$uid = Session::get('uid');
if ($u->isLoggedin($uid) >= 2){
    $logged = TRUE;
} else {
    $logged = FALSE;
}
return $logged;
?>