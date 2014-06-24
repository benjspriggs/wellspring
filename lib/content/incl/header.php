<?php
if (Session::exists(Config::get('session/session_name'))){
    $STH = new StatementHandler($PDO);
    $user = new User($STH);
    $id = $user->getUserID(Session::get('username'));
    $login = "Welcome, ";
    $login .= Session::get('username'). "!   ";
    //Echo a href that will log the user out
    $login .= "<a href=\"loading.php?user_id=";
    
    $token = Token::exittoken();
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
