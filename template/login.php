<?php
##Logs in users with good IDs and verified e-mails, registers new users
##This script requires: user tables

//Checks the session to see if the user has logged in recently
//Connect to database with user tables
require_once('php/connect01.php');
$database = "wellspr_test";
$dbs = mysqli_select_db($dbc, $database);

if ($dbc == true){
    if ($dbs == true){
        
    } else {
        echo "There was an error selecting the database $database.";
    }
} else {
    echo "There was an error connecting to the server.";
}
?>

<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Log in | Wellspring</title>
        <meta charset="utf-8">
            
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    
    <body>
        <div class="page">
            <?php include_once('incl/header.html');?>
            <div id="content">
                <?php
                ##If the user has not logged in, or their e-mail has not been verified (by checking the session), present them with a login form
                
                if (!isset($_SESSION['user_id'])) {
                    echo "<div class=\"login\">
                        <form enctype=\"multipart/form-data\" method=\"POST\" action=\"login.php\">
                            <h3>log in</h3>
                            <ul>
                                <li><input type=\"text\" name=\"username\" length=\"40\" placeholder=\"Username\" autofocus></li><br>
                                <li><input type=\"password\" name=\"password\" length=\"40\" placeholder=\"Password\"></li><br>
                                <li><input type=\"submit\" name=\"submit\" value=\"Register/ Log in\"></li><br>
                                <li><a href=\"#\" id=\"forgot\">Forgot your username?</a></li><br>
                                <li><a href=\"#\" id=\"forgot\">Forgot your password?</a></li>
                            <ul>";
                    echo "</form>";
                    echo "</div>";
                } else {
                    //If the user IS logged in, display the edit user page (just in case something or someone slips through)
                    include ('php/edituser.php');
                } //Close tag for the if loggedin
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
