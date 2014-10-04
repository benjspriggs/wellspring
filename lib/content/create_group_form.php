<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$estimate = $STH->getEstimate('songs_meta', 'song_id');
$res = $SM->viewSongs(array('num_res' => $estimate, 'page' => 1));
$type = $STH->get('group_type', '*')->getResults();
?>
<div class="form-cont">
    <form id="grpform" enctype="multipart/form-data" action="loading" method="POST">
        <h3>Create a new Group</h3>
        <fieldset>
            <label for="name">Group Name:</label><input type="text" name="name" id="name" maxlength="40" placeholder="Group Name" required>
            <label for="desc">Group Description:</label><textarea name="desc" id="desc" maxlength="500" placeholder="Group Description" required></textarea>
            <label for="type">Group Type:</label><select name="type" id="type">
                <?php
                foreach ($type as $key => $info){
                    echo "<option value=\"". $info['type_id'] ."\" title=\"". $info['type_desc'] ."\">". $info['type_name'] ."</option>";
                }
                ?>
            </select>
        </fieldset>
        <fieldset>
            <h4>Add songs</h4>
            <?php
            echo "<ul id=\"flex-cont\">";
            foreach($res as $index => $song_info){
                echo "<li><input type=\"checkbox\" name=\"song_id[]\" value=\"". $song_info['song_id'] ."\"><p>". $song_info['song_name'] ."</p></li>\n";
                if (($index + 1) % 8 == 0 && $index != 0){
                    echo "</ul>\n<ul id=\"flex-cont\">";
                }
            }
            echo "</ul>";
            ?>
        </fieldset>
        
        <div id="submit">
            <input type="submit" name="submit" value="Create Group">
        </div>
        <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
        <input type="hidden" id="action" name="action" value="addGroup">
    </form>
</div>