<?php
$info = json_decode(Input::get('info'), TRUE); //Pre-existing song information

$new_group = array();
$new_group['name'] = escape(Input::get('name'));
$new_group['desc'] = escape(Input::get('desc'));
$new_group['type'] = escape(Input::get('type'));
$new_group['members'] = Input::get('song_id');
$old_group['name'] = $info['group_name'];
$old_group['desc'] = $info['group_desc'];
$old_group['type'] = $info['type'];
$old_group['members'] = $info['members'];
$group_id = $info['group_id'];

$STH = new StatementHandler($PDO);
$validate = new Validate($STH);
$source = array('group_name' => $new_group['name'], 'group_desc' => $new_group['desc'], 'members' => $new_group['members']);
$items = array('group_name' => array(
                    'required' => true,
                    'min' => 1,
                    'max' => 100,
                    'exists' => 'groups'),
                'group_desc' => array(
                    'required' => true),
                'members' => array(
                    'required' => true));
$validate->check($source, $items);
if ($validate->passed()){
    $user = new User($STH);
    if ($user->isLoggedIn(Session::get('uid')) >= 2 && Session::exists('uid')){ //If the user is logged in, and they are the logged in user
        $user_id = Session::get('uid');
    } else {
        $user_id = 0;
    }
    
    $SM = new SongManager($STH, $user_id);
    $SM->updateGroup($group_id, $old_group, $new_group);
    $SM->getErrors();
} else {
    echo "Validation failed for the following reasons:<br>";
    $validate->errors();
}
?>