<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$song = $SM->viewSong(Input::get('song_id'), 'full');
var_dump($song);
if (isset($song['tags'])){
    $tags = $song['tags'];
} else {
    $tags = NULL;
}
if (isset($song['embeds'])){
    $embeds = $song['embeds'];
} else {
    $embeds = NULL;
}

?>
<h2 id="song_name"><?=$song['song_name']?></h2>
<a href="song/edit.php?song_id=<?=Input::get('song_id')?>">Edit</a>
<article>
    <p id="lyrics"><?=$song['lyrics']?></p>
    <p id="song_desc"><?=$song['song_desc']?></p>
    <p id="tags"><?=$tags?></p>
    <p id="embeds"><?=$embeds?></p> 
</article>
