<?php
if ($loggedin || $login_remember){
    $token = Token::exittoken();
    $login = "Welcome, ";
    $login .= "<a href=\"user/view.php?user_id=". Session::get('uid') ."\">". Session::get('username') ."</a>!   ";
    $id = Session::get('uid');
    //Echo a href that will log the user out
    $login .= "<a href=\"loading.php?user_id=";
    $login .= $id ."&action=logOut&exittoken=$token\">Log out</a>";
} else {
    $login = "<a href=\"login.php\">Login/ Register</a>";
}
?>
<div id="header">
    <h2><a href="home.php">Wellspring</a></h2>
    
    <ul id="nav"> <!-- Navigational bar -->
        <a href="home.php"><li>home</li></a>
        <a href="write.php"><li>write</li></a>
        <a href="listen.php"><li>listen</li></a>
    </ul>
    
    <div id="login">
        <?=$login?>
    </div>
    
    <div id="searchbar"> <!-- Search bar -->
        <form enctype="multipart/form-data" method="get" action="search.php">
            <input type="text" name="query" length="25" placeholder="Find a song">
            <input type="submit" name="submit" value="Search">
        </form>
    </div>
</div>
