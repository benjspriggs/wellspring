<?php
require_once('pagination_nav.html');
if (Input::get('page') != NULL){
    $page = htmlspecialchars(Input::get('page'));
} else {
    //Page is unset, first time visiting
    $page = 1;
}
if (Input::get('num_res') != NULL){
    $num_res = htmlspecialchars(Input::get('num_res'));
} else {
    //Num is unset
    $num_res = 20;
}

$STH = new StatementHandler($PDO);
$SM = new SongManager($STH);
$count = $STH->getEstimate('groups', 'group_id');
if ($count < $num_res){
    $num_res = $count;
}
if ($count < ($page * $num_res)){
    //The request is invalid
    echo "<p id=\"error\">Sorry, but that page doesn't exist in the database of groups.</p><br>";
} else {
    $results = $SM->viewGroups(array('num_res' => $num_res, 'page' => $page), TRUE, TRUE, TRUE);
    $total = ceil(($count/$num_res));
    
    echo "Showing page $page of $total. <br>";
    for($a = 1; $a <= $total; $a++){
        if ($a == $page){
            echo "$a  ";
        } else {
            echo "<a href=\"group/view?page=$a&num_res=$num_res\">$a</a>  ";
        }
    }
    
    foreach ($results as $entry => $group){
        echo "<article class=\"group\">";
        echo "<h4><a href=\"group/view?group_id=". $group['group_id'] ."\">". $group['group_name'] ."</h4></a>";
        echo "<p>Description: ". $group['group_desc'] ."</p>";
        echo "<span>Type: ". $group['type_name'] ."</span>";
        echo "</article>";
    }
}
?>