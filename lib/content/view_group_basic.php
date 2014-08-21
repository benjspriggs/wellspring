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
    ?>
</ul>