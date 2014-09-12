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

if ($SM->hasMedia(Input::get('song_id'))){
    $m = $SM->viewSong(Input::get('song_id'), 'media');
} else {
    $m = NULL;
}
$r['media'] = $m;
$token = Token::csrf();
?>
<div id="editcont">
    <h3>Edit song <?=$name?></h3>
    <form id="editform" enctype="multipart/form-data" action="loading" method="POST">
        <fieldset>
            <label for="name">Song Name</label><input name="name" id="name" value="<?=$name?>" placeholder="Song name"></li>
            <label for="lyrics">Lyrics</label><textarea name="lyrics" id="lyrics" maxlength="200" placeholder="Lyrics"><?=$lyrics?></textarea>
            <label for="desc">Song Description</label><textarea name="desc" id="desc" placeholder="Song description"><?=$desc?></textarea>
            <label for="tags">Tags</label><input name="tags" id="tags" value="<?=$tags?>" placeholder="Tags">
            <label for="embeds">Links and embedded videos</label><input name="embeds" id="embeds" value="<?=$embeds?>" placeholder="Embeds and links">
        </fieldset><fieldset>
            <label for="sfile">File upload</label><input type="file" name="sfile[]" id="sfile[]" multiple>
        </fieldset>
        <?php
            if  ($r['media']){
                echo "<p id=\"media-table\">";
                echo "<table>";
                echo "<tr><td>Delete?</td><td>File name</td><td>File type</td></tr>";
                if (is_array($r['media'][0])){
                    //Multiple assets
                    foreach ($r['media'] as $index => $asset){
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\" name=\"delete[]\" value=\"". $asset['media_id'] ."\"></td>";
                        echo "<td>". $asset['media_name'] ."</td>";
                        echo "<td>". $asset['filetype'] ."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td><input type=\"checkbox\" name=\"delete[]\" value=\"". $r['media']['media_id'] ."\"></td>";
                    echo "<td>". $r['media']['media_name'] ."</td>";
                    echo "<td>". $r['media']['filetype'] ."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</p>";
                //echo "<input type=\"file\" name=\"sfile[]\" id=\"sfile\" multiple>";
            }
            ?>
        <div id="submit">
            <input type="submit" name="submit" value="Update">
        </div>
        <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
        <input type="hidden" id="token" name="token" value="<?=$token?>">
        <input type="hidden" id="action" name="action" value="updateSong">
    </form>
    <form id="deleteform" action="loading" method="POST">
        <div id="delete">
            <input type="submit" name="delte" value="Delete Song">
            <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
            <input type="hidden" id="action" name="action" value="deleteSong">
            <input type="hidden" id="token" name="token" value="<?=$token?>">
        </div>
    </form>
</div>