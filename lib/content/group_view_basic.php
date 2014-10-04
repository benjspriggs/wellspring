<?php
##Echoes article and proper formatting for all songs listed in the Wellspring database
$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);

$results = $SM->viewGroups(array('num_res' => $num_res, 'page' => $page), TRUE, TRUE, TRUE);

foreach ($results as $entry => $group){
    echo "<article class=\"group\">";
    echo "<h4><a href=\"group/view?group_id=". $group['group_id'] ."\">". $group['group_name'] ."</h4></a>";
    echo "<p>Description: ". $group['group_desc'] ."</p>";
    echo "<span>Type: ". $group['type_name'] ."</span>";
    echo "</article>";
}
?>