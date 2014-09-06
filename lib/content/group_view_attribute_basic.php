<?php
##Echoes article and proper formatting for all songs listed in the Wellspring database with a certain user ID
##USER ID IS PROVIDED AS A VARIABLE ALREADY
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$results = $SM->viewGroups('all', TRUE, TRUE, TRUE, $user_id);

foreach ($results as $entry => $group){
    echo "<div class=\"flex-box\">";
    echo "<article class=\"group\">";
    echo "<h4><a href=\"group/view.php?group_id=". $group['group_id'] ."\">". $group['group_name'] ."</h4></a>";
    echo "<p>Description: ". $group['group_desc'] ."</p>";
    echo "<span>Type: ". $group['type_name'] ."</span>";
    echo "</article></div>\n";
}
?>