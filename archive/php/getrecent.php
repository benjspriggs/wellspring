<?php

//This is the php file to retrieve recent shortposts from the main body of posts made by users and admins

require("php/connect01.php");

//Connect to the server
$dbsuccess = false;
$dbconnected = mysql_connect('$hostname','$username','$pass');

if ($dbconnected) {
    $dbselect = mysql_select_db ($db($database),"$dbconnected");
        if ($dbselect) {
            echo "Connection successful!"
            $dbsuccess = true;
        }
        else {
            echo "There was an error selecting the database."
        }
    else {
        echo "There was an error connecting to the database."
    }
}


//Ensure connection is secure and good
if ($dbsuccess) {
    
//Grabs the top.. 10, 25, 50 etc. most recent additions to the table (reverse sort)

//Populate to HTML

}//Close braket for the if $dbsuccess is true
mysqli_close($dbc);
?>