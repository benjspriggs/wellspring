<?php
$name = $view['group_name'];
$desc = $view['group_desc'];
$members = $view['members'];
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
?>
<h2><?=$name?></h2>
<p><?=$desc?></p>
<ul><legend><h4>Songs that are a part of this group:</h4></legend>
    <?php
    foreach ($members as $key => $song_id){
        $view = $SM->viewSong($song_id['song_id'], 'text');
        echo "<li><p><a href=\"song/view.php?song_id=". $view['song_id'] ."\">". $view['song_id']. "</a> - ";
        echo $view['song_name'] ."</p></li>";
    }
<<<<<<< HEAD
    echo "</ul>";
} else {
    $token = Token::csrf();
    echo "<form id=\"deleteform\" action=\"loading.php\" method=\"POST\">
        <div id=\"delete\">
<<<<<<< HEAD
            <input type=\"submit\" name=\"delete\" value=\"Delete Group\">
            <input type=\"hidden\" id=\"info\" name=\"info\" value=". htmlspecialchars(json_encode($view)). ">
            <input type=\"hidden\" id=\"action\" name=\"action\" value=\"deleteGroup\">
=======
<<<<<<< HEAD
            <input type=\"submit\" name=\"delete\" value=\"Delete Group\">
            <input type=\"hidden\" id=\"info\" name=\"info\" value=". htmlspecialchars(json_encode($view)). ">
            <input type=\"hidden\" id=\"action\" name=\"action\" value=\"deleteGroup\">
=======
            <input type=\"submit\" name=\"delete\" value=\"Delete Song\">
            <input type=\"hidden\" id=\"info\" name=\"info\" value=". htmlspecialchars(json_encode($r)). ">
            <input type=\"hidden\" id=\"action\" name=\"action\" value=\"deleteSong\">
>>>>>>> origin/business-branch
>>>>>>> origin/business-branch
            <input type=\"hidden\" id=\"token\" name=\"token\" value=\"". $token ."\">
        </div>
    </form>";
}
?>
=======
    ?>
</ul>
>>>>>>> parent of 2fea6c0... Alpha .1
