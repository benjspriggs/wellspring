<?php
require_once('pagination_nav.html');
if (Input::get('page') != NULL){
    $page = htmlspecialchars(Input::get('page'));
} else {
    //Page is unset, first time visiting
    $page = 1;
}
if (Input::get('num_res') != NULL){
    $num_res = htmlspecialchars(Input::get('num_res'));
} else {
    //Num is unset
    $num_res = 20;
}

$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$results = $SM->viewSongs(array('num_res' => $num_res, 'page' => $page), 'full', 'recent');
$count = $STH->getEstimate('songs_meta', 'song_id');
$total = ceil(($count/$num_res) + .5);
echo "Showing page $page of $total. <br>";
for($a = 1; $a <= $total; $a++){
    if ($a == $page){
        echo "$a  ";
    } else {
        echo "<a href=\"listen.php?page=$a&num_res=$num_res\">$a</a>  ";
    }
}

echo "<div id='insert'>";
foreach($results as $entry => $song){
    $i = $entry + 1;
    //echo "Songname: ". $song->songname ."<br>\n";
    //echo "Song description: ". $song->songdesc ."<br>\n";
    //echo "Lyrics: ". $song->lyrics ."<br><br>\n\n";
    echo "<article id=\"$i\" class=\"hide\">";
        echo "<div class=\"clicky\" id=\"clicky$i\"></div>";
        
        echo "<h4 id=\"title\">";
            echo "<a href=\"song/view.php?song_id=". $song['song_id'] ."\">". $song['song_name']. "</a>";
        echo "</h4>\n";
        echo "<img src=\"";
        if ($SM->hasMedia(intval($song['song_id']))){
            $media = $SM->viewSong($song['song_id'], 'media');
            if (is_array($media[0])){
                $piece = $media[0];
                echo "uploads/". $song['song_name'] ."/". $piece['media_name'] .".". $piece['filetype'] . "\"";
                echo ">\n";
            } else {
                echo "uploads/". $song['song_name'] ."/". $media['media_name'] .".". $media['filetype'] . "\"";
                echo ">\n";
            }
            
        } else {
            //Song['media_name'] was empty
            echo "img/noimg.jpg\" />\n";
        }
        
        echo "<div id=\"hideme\" class=\"hidden\">\n
            <span>Postdate ";
            if (isset($song['postdate'])){
                echo $song['postdate'];
            } else {
                echo "No postdate found!";
            }
            echo "</span>\n
            <p id=\"desc\">";
            echo "<p>Song description:</p>\n";
                echo $song['song_desc'];
            echo "</p>\n
            <p id=\"lyrics\">";
            echo "Lyrics:<br>\n";
                echo $song['lyrics'];
            echo "</p>\n<br>";
            //if (find_media_type($finfo['filetype']) == "vid"){
            //echo "<video><source src=\"";
            ////Insert any uploaded videos, or embeds here (Make sure to account for browsers that can't serve up HTML5 video)
            //echo "\"></video>";
            //}
            echo "<div id=\"stags\"><p>";
            //Tags go here (Separate them and replace commas with hashtags!)
            if (isset($song['tags'])){
                echo $song['tags'];
            } else {
                echo "No tags found! This song has been lost in the wide, wide web!";
            }
            echo "</p></div> 
                    </article>\n\n";
    
}
echo "</div>";
?>