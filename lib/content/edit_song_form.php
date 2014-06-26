<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$r = $SM->viewSong(Input::get('song_id'), "full");
$r['song_id'] = Input::get('song_id');
$name = $r['song_name'];
$desc = $r['song_desc'];
$lyrics = $r['lyrics'];
$tags = $r['tags'];
$embeds = $r['embeds'];
?>
<div id="editcont">
    <h3>Edit song <?=$name?></h3>
    <form id="editform" enctype="multipart/form-data" action="loading.php" method="POST">
        <ul>
            <input name="name" id="name" value="<?=$name?>" placeholder="Song name"><br>
            <textarea name="lyrics" id="lyrics" maxlength="200" placeholder="Lyrics"><?=$lyrics?></textarea><br>
            <textarea name="desc" id="desc" placeholder="Song description"><?=$desc?></textarea><br>
            <input name="tags" id="tags" value="<?=$tags?>" placeholder="Tags"><br>
            <input name="embeds" id="embeds" value="<?=$embeds?>" placeholder="Embeds and links"><br>
            <input name="sfile[]" id="sfile[]" multiple>
        </ul>
        <div id="submit">
            <input type="submit" name="submit" value="Update">
        </div>
        <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
        <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
        <input id="action" name="action" value="updateSong" type="hidden">
    </form>
</div>