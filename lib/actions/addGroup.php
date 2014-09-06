<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);
$validate = new Validate($STH);

$name = Input::get('name');
$desc = Input::get('desc');
$song_id = Input::get('song_id');
$type = Input::get('type');
//echo "Name is: $name, Desc is $desc, and song_id is: ";
//var_dump($song_id);

$source = array('group_name' => $name, 'group_desc' => $desc, 'song_id' => $song_id);
$items = array('group_name' => array(
                    'required' => true,
                    'max' => 40),
                'group_desc' => array(
                    'required' => true,
                    'max' => 500),
                'song_id' => array(
                    'required' => true));
$validate->check($source, $items);
if ($validate->passed()){
    if ($user->isLoggedIn(Session::get('uid')) >= 2 && Session::exists('uid')){ //If the user is logged in, and they are the logged in user
        $user_id = Session::get('uid');
    } else {
        $user_id = 0;
    }
    $SM = new SongManager($STH, $user_id);
    $SM->newGroup($song_id, $type, $name, $desc);
    $SM->getErrors();
} else {
    echo "Validation failed for the following reasons:<br>";
    $validate->errors();
}
?>