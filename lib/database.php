<?php

define('hostname', 'localhost');
define('username', 'root');
define('database', 'wellspr_test');
define('password', '9ahil30jxm1');

try {
    //Attempt to create mysql connection to database
    $PDO = new PDO('mysql:host=localhost;dbname=wellspr_test', username, password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
    //Log errors into a file
}
?>