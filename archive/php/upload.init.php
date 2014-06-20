<?php

//This script uploads files submitted by users to the MySQL database;
//immediately goes to edit.html to add or edit details

require_once('connect01.php');
require('functions.php');
$live = 0; //Live variable, disables all of the debug message (0 means NOT LIVE)

$database = "wellspr_test";
$dbs = mysqli_select_db($dbc, $database);

//Connect to the server
//Ensure connection is secure and good
if ($dbc == true){
    //echo "Connection successful.<br>";
    if ($dbs == true){
        //echo "Selection successful.<br>";
        //All of the code goes here; assumes the connection to the database has been succesful, as well as the selection of the database
        
        //Selects data uploaded and provided by user
        //Checks filenames to make sure they are safe
        $sname = sanitize($_POST['sname']);
        $lyrics = sanitize($_POST['lyrics']);
        $sdesc = sanitize($_POST['sdesc']);
        $stags = tagify(sanitize($_POST['stags']));
        $squery = mysqli_query($dbc, "INSERT INTO `songs_meta` (`song_name`, `lyrics`, `song_desc`, `postdate`) VALUES ('$sname', '$lyrics', '$sdesc', now())");
        
        //Multiple file upload
        if (!empty($_FILES['sfile'])){
            foreach (($_FILES['sfile']['name']) as $key => $name){
                if ($_FILES['sfile']['error'][$key] == 0 && move_uploaded_file(($_FILES['sfile']['tmp_name'][$key]), "../uploads/{$name}")){
                    $uploaded[] = $name;
                }
            }
            //echo "File movement success!<br>";
            
            if ($squery == true){
                //echo "Metadata inserted successfully.<br>";
                //Foreach loop that puts each of the named files in the $uploaded array into the media table, and gives filetype
                //It can be assumed that calling the song_id for the song that's being uploaded is legal
                $sidq = mysqli_query($dbc, "SELECT `song_id` AS 'sid' FROM `songs_meta` WHERE song_name = '$sname'");
                $sid = mysqli_fetch_object($sidq);
                foreach ($uploaded as $key => $name){
                    $filenames[] = explode(".", $uploaded[$key], 2); //Makes an array that holds the filename in the [0] place and the file type as declared by the browser in the [1] place
                    $filetype = end($filenames[$key]);
                    $filename = urldecode($filenames[$key][0]);
                    $mquery = mysqli_query($dbc, "INSERT INTO `media` (`song_id`,`media_name`,`filetype`) VALUES ('". $sid->sid ."', '$filename', '$filetype')");
                    if ($mquery == true){
                        //echo "File $name inserted successfully.";
                        echo $sid->sid . " ". $filename . " " . $filetype .".";
                    } else {
                        echo "There was an error inserting the file.";
                    }
                }
                
                //Tags and stuff
                
                $tags_sname = tagify($sname);
                $tags_sdesc = tagify($sdesc);
                $tags_sql = "INSERT INTO `tags` VALUES (`". $sid->sid ."`, 0, `" . $tags_sname .", ". $tags_sdesc .", ". $stags . "`);"; //song_id, user_id, tags and postdate (automatic) MAKE SURE TO CHANGE THE USER ID WHEN YOU MAKE THE USER SYSTEMS
                $tquery = mysqli_query($dbc, $tags_sql);
                if ($tquery == true){
                    echo "Tags inserted successfuly!";
                } else {
                    echo "There was an error inserting the tags.";
                }
                echo "<a href=\"../home.php\">Go back home</a>";
            } else {
                echo "Metadata insertion failure.<br>";
                echo mysqli_error($dbc);
            }
        }
        
        
        } else {
        //If selection of the database goes awry
        echo "There was an error selecting the database. <br>";
    } 
    } else {
    //If the connection to the database goes awry
    echo "There was an error connecting to the database. <br>";
}

?>