<?php
//$name - User's name
//Joindate
$user_id = Input::get('user_id');
$name = $u->getUsername($user_id);
$count = 0;
foreach (Config::get('tables/content') as $index => $tableName){
    $attr[$tableName] = $u->attribute($user_id, $tableName);
    $attr[$tableName]['count'] = $STH->lastCount();
    $count = $count + $STH->lastCount();
}
?>
<h2><?php echo $name;?></h2>
<p>The number of things <?=$name?> is associated with is: <?=$count?></p>
<h3>Groups</h3>
<?php
include(Config::get('root/content').'group_view_attribute_basic.php');
?>
<h3>Songs</h3>
<?php
include(Config::get('root/content').'song_view_attribute_basic.php');
?>