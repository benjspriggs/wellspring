<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$r = $SM->viewSong(Input::get('song_id'), "full");
$name = $r['song_name'];
$desc = $r['song_desc'];
$lyrics = $r['lyrics'];
$tags = $r['tags'];
$embeds = $r['embeds'];
?>
<div id="editcont">
    <form id="editform" enctype="multipart/form-data" action="loading.php" method="POST">
        <ul>
            <input name="song_name" id="song_name" value="<?=$name?>" placeholder="Song name"><br>
            <textarea name="lyrics" id="lyrics" maxlength="200" placeholder="Lyrics"><?=$lyrics?></textarea><br>
            <textarea name="song_desc" id="song_desc" placeholder="Song description"><?=$desc?></textarea><br>
            <input name="tags" id="tags" value="<?=$tags?>" placeholder="Tags"><br>
            <input name="embeds" id="embeds" value="<?=$embeds?>" placeholder="Embeds and links"><br>
        </ul>
        <div id="submit">
            <input type="submit" name="submit" value="Update">
        </div>
        <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
        <input id="action" name="action" value="editSong" type="hidden">
    </form>
</div>