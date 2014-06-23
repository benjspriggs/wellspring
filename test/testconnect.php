<?php
require_once('classes/song.php');

$mysql = new mysqli('localhost', 'root', '9ahil30jxm1', 'wellspr_test');
//$res = $mysql->select('songs_meta');
$res = $mysql->query('SELECT * FROM songs_meta');
print_r($res);
if ($res != NULL){
    print_r($res->fetch_array());
    echo "df";
}

//var_dump($mysql->getResult());
//$res = $mysql->query('SELECT * FROM songs_meta');
//var_dump($res);
?>