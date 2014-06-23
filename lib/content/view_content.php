<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$result = $SM->viewSong(Input::get('song_id'), 'text_extended');
$song = $result;
echo "<h2 id=\"song_name\">". $song['song_name'] ."</h2><br>";
echo "Lyrics: <p id=\"lyrics\">". $song['lyrics'] ."</p><br>";
echo "Description: <p id=\"song_desc\">". $song['song_desc'] ."</p><br>";
if (isset($song['tags'])){
    echo "Tags: <p id=\"tags\">". $song['tags'] ."</p><br>";
}
if (isset($song['embeds'])){
    echo "Embeds: <p id=\"embeds\">". $song['embeds'] ."</p><br>";
}

?>