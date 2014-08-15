<?php
//$name - User's name
//Joindate
$uid = Input::get('user_id');
$name = $u->getUsername($uid);
$count = 0;
foreach (Config::get('tables/content') as $index => $tableName){
    $attr[$tableName] = $u->attribute($uid, $tableName);
    $attr[$tableName]['count'] = $STH->lastCount();
    $count = $count + $STH->lastCount();
}
?>
<h2><?php echo $name;?></h2>
<p>The number of things <?=$name?> is associated with is: <?=$count?></p>