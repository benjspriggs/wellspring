<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$song = $SM->viewSong(Input::get('song_id'), 'full');
$media = $SM->viewSong(Input::get('song_id'), 'media');
var_dump($media);
echo "<h2 id=\"song_name\">". $song['song_name'] ."</h2><br>";
echo "Lyrics: <p id=\"lyrics\"><pre>". $song['lyrics'] ."</pre></p><br>";
echo "Description: <p id=\"song_desc\">". $song['song_desc'] ."</p><br>";
if (isset($song['tags'])){
    echo "Tags: <p id=\"tags\">". $song['tags'] ."</p><br>";
}
if (isset($song['embeds'])){
    echo "Embeds: <p id=\"embeds\">". $song['embeds'] ."</p><br>";
}

?>