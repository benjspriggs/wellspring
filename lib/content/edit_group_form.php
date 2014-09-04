<?php
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$r = $SM->viewGroup($i, TRUE, TRUE);
$name = $r['group_name'];
$desc = $r['group_desc'];
$type = $r['type'];
foreach ($r['members'] as $index => $song_index_id){
    $members[] = $r['members'][$index][0];
}
$r['members'] = $members;
?>

<div id="editcont">
    <h3>Edit song <?=$name?></h3>
    <form id="editform" enctype="multipart/form-data" action="loading.php" method="POST">
        <ul>
            <input name="name" id="name" value="<?=$name?>" placeholder="Group name"><br>
            <textarea name="desc" id="desc" placeholder="Group description"><?=$desc?></textarea><br>
            <select name="type">
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
        </ul>
        <?php
            //Song checkboxes
            $estimate = $STH->getEstimate('songs_meta', 'song_id');
            $res = $SM->viewSongs(array('num_res' => $estimate, 'page' => 1));
            
            foreach($res as $index => $song_info){
                echo "<input type=\"checkbox\" name=\"song_id[]\" value=\"". $song_info['song_id'] ."\"";
                if (in_array($song_info['song_id'], $members)){
                    echo " checked ";
                }
                echo ">". $song_info['song_name'] ."<br>\n";
            }
        ?>
        <div id="submit">
            <input type="submit" name="submit" value="Update">
        </div>
        <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
        <input type="hidden" id="token" name="token" value="<?=$token?>">
        <input type="hidden" id="action" name="action" value="updateGroup">
    </form>
    <form id="deleteform" action="loading.php" method="POST">
        <div id="delete">
            <input type="submit" name="delte" value="Delete Group">
            <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
            <input type="hidden" id="info_members" name="info_members" value="<?=htmlspecialchars(json_encode($members))?>">
            <input type="hidden" id="action" name="action" value="deleteGroup">
            <input type="hidden" id="token" name="token" value="<?=$token?>">
        </div>
    </form>
</div>