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
$group = $SM->songIdentity(Input::get('song_id'));
if ($group['count'] > 1){
    $alliance['count'] = $group['count'];
    for ($g = 0; $g < $group['count']; $g++){
        $alliance[$g] = $SM->viewGroup($group[$g]['group_id']);
    }
} else {
    $group = NULL;
}
?>
<h2 id="song_name"><?=$song['song_name']?></h2>
<?php
if ($accepted){
    echo "<a href=\"song/edit?song_id=". Input::get('song_id') ."\">Edit</a>";
}
?>
<article>
    <p id="lyrics"><?=$song['lyrics']?></p>
    <p id="song_desc"><?=$song['song_desc']?></p>
    <p id="tags"><?=$tags?></p>
    <p id="embeds"><?=$embeds?></p>
    <p id="group">This song is a part of:
    <?php
    if (isset($group)){
        $r = '';
        for ($g = 0; $g < $alliance['count']; $g++){
            $r .= "<a href=\"group/view?group_id=". $alliance[$g]['group_id'] ."\">". $alliance[$g]['group_name']. "</a>, and ";
        }
        echo substr($r, 0, -6);
    } else {
        echo "No groups!";
    }
    ?>.</p>
</article>
<?php
if ($media){
    ob_start();
    include('media_basic_represent');
    ob_flush();
}

?>
