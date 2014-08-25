<?php
$song_name = escape(Input::get('name'));
$song_desc = escape(Input::get('desc'));
$lyrics = escape(Input::get('lyrics'));
$tags = escape(Input::get('tags'));
$embeds = escape(Input::get('embeds'));

$STH = new StatementHandler($PDO);
$validate = new Validate($STH);
$source = array('song_name' => $song_name, 'song_desc' => $song_desc, 'lyrics' => $lyrics);
$items = array('song_name' => array(
                    'required' => true,
                    'min' => 1,
                    'max' => 100,
                    'unique' => 'songs_meta'),
                'song_desc' => array(
                    'required' => true),
                'lyrics' => array(
                    'required' => true));
$validate->check($source, $items);
if ($validate->passed()){
    $user = new User($STH);
    if ($user->isLoggedIn(Session::get('uid')) >= 2 && Session::exists('uid')){ //If the user is logged in, and they are the logged in user
        $user_id = Session::get('uid');
    } else {
        $user_id = 0;
    }
    $songObj = new Song($song_name, $song_desc, $lyrics, $tags, $embeds);
    $SM = new SongManager($STH, $user_id);
    $files = Input::get('sfile');
    if (!empty($files['name'])){
        $SM->addFiles($files, $songObj);
    }
    $SM->addSong($songObj);
    $SM->getErrors();
} else {
    echo "Validation failed for the following reasons:<br>";
    $validate->errors();
}
//header('Location: home.php');

?>