<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$r = $SM->viewSong(Input::get('song_id'), "full")->getResults();
$name = $r['song_name'];
$desc = $r['song_desc'];
$lyrics = $r['lyrics'];
$tags = $r['tags'];
$embeds = $r['embeds'];
?>
<div id="editcont">
    <ul>
        <li><h2 id="song_name"><?=$name?></h2></li>
        <li><p id="lyrics"><?=$lyrics?></p></li>
        <li><p id="song_desc"><?=$desc?></p></li>
        <li><p id="tags"><?=$tags?></p></li>
        <li><p id="embeds"><?=$embeds?></p></li>
    </ul>
    <form id="editform" enctype="multipart/form-data" action="loading.php" onsubmit="copyData()" method="POST">
    <div id="submit">
        <input type="submit" name="submit" value="Upload">
    </div>
    <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
    <input id="action" name="action" value="editSong" type="hidden">
    </form>
</div>