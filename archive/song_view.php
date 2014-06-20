<?php
//This script views an individual song, as specified from what is recieved from a search bar, or clicking on 'edit'
//in the browse menu. This information is passed through GET.
//It drops all of the information into itself.

require('php/connect01.php');
$database = "wellspr_test";

$dbs = mysqli_select_db($dbc, $database);

if ($dbc == true){
    if ($dbc == true){
        $song_id = $_GET['song_id'];
        $song_info = mysqli_query($dbc, "SELECT song_id, song_name, song_desc, lyrics, postdate FROM songs_meta WHERE `song_id` = $song_id");
    } else {
        echo "There was an error selecting the database $database.<br>\n";
    }
} else {
    echo "There was an error connecting to the database.<br>\n";
}
mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php if (isset($result['song_name'])){echo $results['song_name'];}?></title>
        <meta charset="utf-8">
            
        <!--Style links-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    
    <body>
        <div class="page">
            <?php include_once('incl/header.html');?>
            <div id="content">
                <?php
                if ($song_info == true){
                    while ($results = mysqli_fetch_array($song_info, MYSQLI_ASSOC)){
                        echo "Song name: " . $results['song_name'];
                        echo "<br>Song description: ". $results['song_desc'] . "\n<br>Lyrics: " . $results['lyrics'];
                    }
                } else {
                    echo "There was no song found with the id $song_id. Sorry!";
                }
                ?>
            </div>
            <div id="sidebar">
                <?php include_once('incl/updates.php');?>
            </div>
            <div id="footer">
                <?php include_once('incl/footer.html');?>
            </div>
        </div>
    </body>
</html>