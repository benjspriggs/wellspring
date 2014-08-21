<?php
$song_count = $STH->getEstimate('songs_meta', 'song_id');
$select_groups = ceil($song_count/ 10);
for ($i = 1; $i < $select_groups; $i++){
    //The songs are grouped in batches of 10
    $res = $SM->viewSongs(array('num_res' => 10, 'page' => $i));
    echo "<select>";
    foreach ($res as $index => $song_info){
        echo "<option value=\"". $song_info['song_id'] ."\">". $song_info['song_name'] ."</option>";
    }
    echo "</select>";
} 
?>