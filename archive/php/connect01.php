<?php
##This script defines the $dbc variable as being connected to the first defined database

$username = "root";
$password = "9ahil30jxm1";
$hostname = "localhost";

$dbc = mysqli_connect($hostname, $username, $password);
?>