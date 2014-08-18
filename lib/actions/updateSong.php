<?php
$info = json_decode(Input::get('info')); //Pre-existing song information

$song_name = escape(Input::get('name'));
$song_desc = escape(Input::get('desc'));
$lyrics = escape(Input::get('lyrics'));
$tags = escape(Input::get('tags'));
$embeds = escape(Input::get('embeds'));
$delete = Input::get('delete');
$id = htmlspecialchars_decode($info->song_id);

$STH = new StatementHandler($PDO);
$validate = new Validate($STH);
$source = array('song_name' => $song_name, 'song_desc' => $song_desc, 'lyrics' => $lyrics);
$items = array('song_name' => array(
                    'required' => true,
                    'min' => 1,
                    'max' => 100,
                    'exists' => 'songs_meta'),
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
    
    $exp_array = explode(', ', $tags);
    $exp_array = array_map('trim', $exp_array);
    $t_array = array_unique($exp_array);
    $tags = implode(', ', $t_array);
    
    $songObj = new Song($song_name, $song_desc, $lyrics, $tags, $embeds);
    $SM = new SongManager($STH, $user_id);
    
    if (!empty($delete)){
        $SM->removeFiles($delete);
    }
    $files = Input::get('sfile');
    if (!empty($files['name'])){
        $SM->addFiles($files, $songObj);
    }
    
    $SM->updateSong($songObj, $id, $user_id);
    echo $SM->getErrors();
} else {
    echo "Validation failed for the following reasongs:<br>";
    $validate->errors();
}
?>