<?php
##This script adds the divs and things for read so that it's not so lonely.
##This script requires use of the: songs database, the metadata database

require_once('connect01.php');
require('functions.php');
$dbs = mysqli_select_db($dbc, "wellspr_test");

if ($dbc == true){
    //echo "Database connected.<br>";
    if ($dbs == true){
        //echo "Database selected.<br>";
        $i = 1; //Initialize the counter for the article naming convention
        $m = 16 ; //Set the maximum number of displayed posts
        
        //Select the first $m number of songs from the database
        $query = mysqli_query($dbc, "SELECT `song_name`, `song_id`, `song_desc`, `lyrics`, `postdate` FROM songs_meta LIMIT $m");
        $mquery = mysqli_query($dbc, "SELECT `media`.`song_id`, `media`.`media_name`, `media`.`filetype`  FROM `media`,`songs_meta` WHERE (`media`.`song_id` = `songs_meta`.`song_id`) LIMIT $m");
        $finfo = mysqli_fetch_array($mquery, MYSQLI_ASSOC);
        
        if ($m > mysqli_num_rows($query)){ //We can't have the script putting out more song entries than there are songs in the database, now can we?
            $m = mysqli_num_rows($query) + 1;
        }
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            //Start a while loop for the generation of things
                    //Echo all of the html
                    echo "<article id=\"$i\" class=\"hide\">\n";
                    echo "<div class=\"clicky\" id=\"clicky$i\"></div>\n";
                    
                    echo "<h4 id=\"title\">";
                        if ($row['song_name']){
                            echo '<a href="song_view.php?song_id='. $row['song_id'] . '">';
                            echo $row['song_name'] . '</a>';
                        } else {
                            echo "No song title!";
                        }
                    echo "</h4>\n";
                    echo "<img src=\"";
                    if (find_media_type($finfo['filetype']) == "img" && $finfo['song_id'] == $row['song_id']){
                        echo "uploads/" . $finfo['media_name'] . "." . $finfo['filetype'] . "\"";
                        echo ">\n";
                    } else {
                        echo "img/noimg.jpg\" />\n";
                    }
                    
                    echo "<div id=\"hideme\" class=\"hidden\">\n
                                    <span>Postdate ";
                                    if ($row['postdate']){
                                        echo "{$row['postdate']}";
                                    } else {
                                        echo "No postdate found!";
                                    }
                                    echo "</span>\n
                                    <p id=\"desc\">";
                                    echo "<p>Song description:</p>\n";
                                    if ($row['song_desc']){
                                        echo "{$row['song_desc']}";
                                    } else {
                                        echo "No description found!";
                                    }
                                    echo "</p>\n
                                    <p id=\"lyrics\">";
                                    echo "Lyrics:<br>\n";
                                    if ($row['lyrics']){
                                        echo "{$row['lyrics']}";
                                    } else {
                                        echo "No lyrics found! What a woeful day!";
                                    }
                                    echo "</p>\n";
                                    if (find_media_type($finfo['filetype']) == "vid"){
                                    echo "<video><source src=\"";
                                    //Insert any uploaded videos, or embeds here (Make sure to account for browsers that can't serve up HTML5 video)
                                    echo "\"></video>";
                                    }
                                    echo "<div id=\"stags\"><p>";
                                    //Tags go here (Separate them and replace commas with hashtags!)
                                    echo "No tags found! This song has been lost in the wide, wide web!";
                                    echo "</p></div> 
                                </article>";
                
        }
        
        
        
    } else {
        echo "Database selection failure.<br>";
    }
} else {
    echo "Database connection failure.<br>";
}
mysqli_free_result($query);
mysqli_free_result($mquery);
mysqli_close($dbc);
?>