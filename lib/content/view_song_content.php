<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$song = $SM->viewSong(Input::get('song_id'), 'full');

if ($SM->hasMedia(Input::get('song_id'))){
    $media = $SM->viewSong(Input::get('song_id'), 'media');
} else {
    $media = NULL;
}

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
<?php
if ($a){
    echo "<a href=\"song/edit.php?song_id=". Input::get('song_id') ."\">Edit</a>";
}
?>
<article>
    <p id="lyrics"><?=$song['lyrics']?></p>
    <p id="song_desc"><?=$song['song_desc']?></p>
    <p id="tags"><?=$tags?></p>
    <p id="embeds"><?=$embeds?></p> 
</article>
<?php
if ($media){
    if (is_array($media[0])){
        foreach ($media as $key => $piece){
            $type = findMediaType($piece['filetype']);
            switch($type){
                case('img'):
                    echo "<img src=\"uploads/". $song['song_name'] ."/". $piece['media_name'] .".". $piece['filetype'] . "\">";
                    break;
                case('vid'):
                    break;
                case('aud'):
                    break;
                default:
                    break;
            }
        }
    } else {
        $type = findMediaType($media['filetype']);
        switch($type){
            case('img'):
                echo "<img src=\"uploads/". $song['song_name'] ."/". $media['media_name'] .".". $media['filetype'] . "\">";
                break;
            case('vid'):
                break;
            case('aud'):
                break;
            default:
                break;
        }
    }
}

?>
