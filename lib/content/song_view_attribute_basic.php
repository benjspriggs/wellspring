<?php
##Echoes out a formatted thingymabob of all the songs associated with a user
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$song_results = $SM->viewSongs('all', 'text', '', $user_id);

echo "<div class=\"flex-box\">";
foreach ($song_results as $index => $song){
    echo "<article class=\"song\">";
    echo "<h4 id=\"song_name\">". $song['song_name']. "</h4>";
    echo "<p id=\"lyrics\">". $song['lyrics']. "</p>";
    echo "<p id=\"song_desc\">". $song['song_desc']. "</p>";
    if (isset($song['tags'])){
        echo "<p id=\"tags\">". $song['tags'] ."</p>";
    }
    if (isset($song['embeds'])){
        echo "<p id=\"embeds\">". $song['embeds'] ."</p>";
    }
    echo "</article>";
    if ((($index % 4) == 0) && $index != 0){
        echo "</div><div class=\"flex-box\">";
    }
    echo "\n";
}
echo "</div>";
?>

