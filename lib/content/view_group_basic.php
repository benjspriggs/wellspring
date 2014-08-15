<?php
$name = $view['group_name'];
$desc = $view['group_desc'];
$members = $view['members'];
?>
<h2><?=$name?></h2>
<p><?=$desc?></p>
<ul><legend>Songs that are a part of this group:</legend>
    <?php
    foreach ($members as $key => $song_id){
        echo "<a href=\"song/view.php?song_id=". $song_id['song_id'] ."\"><li>". $song_id['song_id']. "</li></a>";
    }
    ?>
</ul>