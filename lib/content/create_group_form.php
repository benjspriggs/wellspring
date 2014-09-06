<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$estimate = $STH->getEstimate('songs_meta', 'song_id');
$res = $SM->viewSongs(array('num_res' => $estimate, 'page' => 1));
$type = $STH->get('group_type', '*')->getResults();
?>
<div id="grpcont">
    <form id="grpform" enctype="multipart/form-data" action="loading.php" method="POST">
        <fieldset>
            <h3>Create a new Group</h3>
            <input type="text" name="name" maxlength="40" placeholder="Group Name" required>
            <textarea name="desc" maxlength="500" placeholder="Group Description" required></textarea>
            <select name="type">
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
            foreach($res as $index => $song_info){
                echo "<input type=\"checkbox\" name=\"song_id[]\" value=\"". $song_info['song_id'] ."\">". $song_info['song_name'] ."<br>";
            }
            ?>
        </fieldset>
        
        <div id="submit">
            <input type="submit" name="submit" value="Create Group">
        </div>
        <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
        <input type="hidden" id="action" name="action" value="addGroup">
    </form>
</div>