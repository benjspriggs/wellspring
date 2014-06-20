<?php
//This script pulls and reads results from queries to the MySQL database so that
//the user can edit them in the browser

require ('php/connect01.php');

$database = "users";
$dbs = mysqli_select_db($dbc, $database);

//Ensure connection is secure and good
if ($dbc == true) {
    if ($dbs == true) {    
        //Populate html with all of the associated user-created/ edited entries
        
        //Select file or entry to edit
        
        //Populate data from table into HTML, so that user can see and edit the form that contains all of the information
        
        //Verify all information is legal and secure (no scripts or php files etc)
        
        //Update information to table
    } else {
        echo "There was an error selecting the database $database.";
    }
} else {
    echo "There was an error connecting to the database.";
}//Close braket from the if $dbsuccess var is true, doesn't run script if the connection is failed
mysqli_close($dbc);
?>