<?php

define('hostname', 'spricoco.ipowermysql.com');
define('username', 'dmanager');
define('database', 'digitize');
define('password', 'benja+cole');

try {
    //Attempt to create mysql connection to database
    $PDO = new PDO('mysql:host='.hostname.';dbname='.database , username, password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
    //Log errors into a file
}
?>