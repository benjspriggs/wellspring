<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$estimate = $STH->getEstimate('songs_meta', 'song_id');
$res = $SM->viewSongs(array('num_res' => $estimate, 'page' => 1));
?>
<div id="grpcont">
    <form id="grpform" enctype="multipart/form-data" action="loading.php" method="POST">
        <fieldset>
            <h3>Create a new Group</h3>
            <input type="text" name="name" maxlength="40" placeholder="Group Name" required>
            <textarea name="desc" maxlength="500" placeholder="Group Description" required></textarea>
            <select name="type">
                <option value="1" title="Recorded as a set, or relased as a set to the public - usually by one artist">Album</option>
                <option value="2" title="Assorted songs that fit a mood or are complimentary">Compilation</option>
            </select>
        </fieldset>
        <fieldset>
            <h4>Add songs</h4>
            <?php
            foreach($res as $index => $song_info){
                echo "<input type=\"checkbox\" name=\"song_id[]\" value=\"". $song_info['song_id'] ."\">". $song_info['song_name'] ."<br>";
            }
            ?>
        </fieldset>
        
        <div id="submit">
            <input type="submit" name="submit" value="Create Group">
        </div>
        <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
        <input id="action" name="action" value="addGroup" type="hidden">
    </form>
</div>