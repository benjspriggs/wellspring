<?php
$STH = new StatementHandler($PDO);
$u = new User($STH);
$l = Session::get('uid');
if ($u->isLoggedin($l) >= 2){
    $a = TRUE;
} else {
    $a = FALSE;
}
return $a;
?>