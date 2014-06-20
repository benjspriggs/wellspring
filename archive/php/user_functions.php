<?php
##User function definitions

function logged_in($username, $password){
    return (isset($_SESSION['user_id'])) ? ($_SESSION['user_id']) : false;
}

function username_exists($username){
    return () ? true : false;
}
?>