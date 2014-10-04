<?php
$name = $view['group_name'];
$desc = $view['group_desc'];
$members = $view['members'];
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
?>
<h2><?=$name?></h2>
<?php
if ($loggedin && $accepted){
    echo "<a href=\"group/edit?group_id=". $i ."\">Edit</a>";
}
?>
<p><?=$desc?></p>

<?php
if ($members){
    echo "<ul><legend><h4>Songs that are a part of this group:</h4></legend>";
    foreach ($members as $key => $song_id){
        $view = $SM->viewSong($song_id['song_id'], 'text');
        echo "<li><p><a href=\"song/view?song_id=". $view['song_id'] ."\">". $view['song_id']. "</a> - ";
        echo $view['song_name'] ."</p></li>";
    }
    echo "</ul>";
} else {
    $token = Token::csrf();
    echo "<form id=\"deleteform\" action=\"loading\" method=\"POST\">
        <div id=\"delete\">
            <input type=\"submit\" name=\"delete\" value=\"Delete Group\">
            <input type=\"hidden\" id=\"info\" name=\"info\" value=". htmlspecialchars(json_encode($view)). ">
            <input type=\"hidden\" id=\"action\" name=\"action\" value=\"deleteGroup\">
            <input type=\"hidden\" id=\"token\" name=\"token\" value=\"". $token ."\">
        </div>
    </form>";
}
?>
