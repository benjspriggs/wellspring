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
    <a href="home.php"><h2>Wellspring</h2></a>
    
    <ul id="nav"> <!-- Navigational bar -->
        <li><a href="home.php" title="Go back to the homepage to view annoucements and other recent happenings in Wellspring!">home</a></li>
            
        <li><a href="write.php" title="Submit a new song to the Wellspring database, recorded by yourself, or someone else - with appropriate permissions, of course!">write</a></li>
        <li><a href="listen.php" title="Browse through all of the songs in the Wellspring database!">listen</a></li>
        <li>
            <a href="javascript:;">groups</a>
            <ul class="child-header">
                <a href="group/view.php" title="See all of the albums, compilations, and many other groupings of songs that have been submitted to Wellspring!"><li>view</li></a>
                <a href="group/create.php" title="Submit a new grouping of songs - album, compilation, songs by a certain artist or recording group, songs from a certain region, whatever!"><li>create</li></a>
            </ul>
        </li>
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
