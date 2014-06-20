<?php

//This is the script used to populate the read html page with results from searches and by toplists

//Put login info and database info here

$username = '';
$password = '';
$db_name = '';
$hostname = '';

$connect_db = mysqli_connect($username, $password, $db_name, $hostname);
$select_db = mysqli_select_db($connect_db, $db_name);

//Connect to the server
//Ensure connection is secure and good

if ($connect_db == TRUE) {
    echo "Connection to the database was successful. <br>";
    if ($select_db == TRUE) {
        echo "Selection of the database was successful. <br>";
        
        //Checks that rows and data exists within a table
        
        //Uses user defined paramaters to select data within table
        
        //Populates html with data from table, with sorted or unsorted parameters respected
        
        
    } else {
        echo "There was an error selecting the database. <br>";
    } 
} else {
    echo "There was an error connecting to the database. <br>";
}
mysqli_close($dbc);
?> 