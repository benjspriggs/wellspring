<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$r = $SM->viewGroup($i, TRUE, TRUE);
$name = $r['group_name'];
$desc = $r['group_desc'];
$type = $r['type'];
if (!empty($r['members'])){
    foreach ($r['members'] as $index => $song_index_id){
        $members[] = $r['members'][$index][0];
    }
    $r['members'] = $members;
} else {
    //Prep all of the songs
    $estimate = $STH->getEstimate('songs_meta', 'song_id');
    $res = $SM->viewSongs(array('num_res' => $estimate, 'page' => 1));
}


?>

<div id="editcont">
    <h3>Edit group <?=$name?></h3>
    <form id="editform" enctype="multipart/form-data" action="loading" method="POST">
        <fieldset>
            <label for="name">Group Name:</label><input name="name" id="name" value="<?=$name?>" placeholder="Group name"><br>
            <label for="desc">Group Description:</label><textarea name="desc" id="desc" placeholder="Group description"><?=$desc?></textarea><br>
            <label for="type">Group Type:</label><select name="type" id="type">
                <?php
                $type = $STH->get('group_type', '*')->getResults();
                foreach ($type as $key => $info){
                    echo "<option value=\"". $info['type_id'] ."\" title=\"". $info['type_desc'] ."\"";
                    if ($type == $info['type_id']){
                        echo " selected ";
                    }
                    echo ">". $info['type_name'] ."</option>\n";
                }
                ?>
            </select>
        </fieldset>
        <fieldset>
        <?php
        if (!empty($members)){
            //Song checkboxes
            $estimate = $STH->getEstimate('songs_meta', 'song_id');
            $res = $SM->viewSongs(array('num_res' => $estimate, 'page' => 1));
            
            echo "<ul id=\"flex-cont\">";
            foreach($res as $index => $song_info){
                echo "<li><input type=\"checkbox\" name=\"song_id[]\" value=\"". $song_info['song_id'] ."\"";
                if (in_array($song_info['song_id'], $members)){
                    echo " checked ";
                }
                echo "><p>". $song_info['song_name'] ."</p></li>\n";
            }
            echo "</ul>";
        } else {
            echo "<ul id=\"flex-cont\">";
            foreach($res as $index => $song_info){
                echo "<li><input type=\"checkbox\" name=\"song_id[]\" value=\"". $song_info['song_id'] ."\"><p>". $song_info['song_name'] ."</p></li>\n";
                if (($index + 1) % 8 == 0 && $index != 0){
                    echo "</ul>\n<ul id=\"flex-cont\">";
                }
            }
            echo "</ul>";
        }
        ?>
        </fieldset>
        <div name="submit" id="submit">
            <input type="submit" name="submit" value="Update">
        </div>
        <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
        <input type="hidden" id="token" name="token" value="<?=$token?>">
        <input type="hidden" id="action" name="action" value="updateGroup">
    </form>
    <form id="deleteform" action="loading" method="POST">
        <div id="delete">
            <input type="submit" name="delte" value="Delete Group">
            <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
            <input type="hidden" id="info_members" name="info_members" value="<?=htmlspecialchars(json_encode($members))?>">
            <input type="hidden" id="action" name="action" value="deleteGroup">
            <input type="hidden" id="token" name="token" value="<?=$token?>">
        </div>
    </form>
</div>