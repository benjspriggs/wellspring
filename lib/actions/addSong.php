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
    if (Session::exists(Config::get('session/username'))){
        $user_id = $user->getUserID(Session::get(Config::get('session/username')));
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
    echo $SM->getErrors();
} else {
    echo "Validation failed for the following reasongs:<br>";
    $validate->errors();
}
//header('Location: home.php');

?>