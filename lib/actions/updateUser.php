<?php
$STH = new StatementHandler($PDO);
$validate = new Validate($STH);

$info = json_decode(Input::get('info')); //Pre-existing song information
$newInfo = array();

$username = trim(escape(Input::get('username')));
$password = trim(escape(Input::get('password')));
$npassword = trim(escape(Input::get('npassword')));
$npassword_again = trim(escape(Input::get('npassword_again')));
$email = trim(escape(Input::get('email')));
$email_again = trim(escape(Input::get('email_again')));

$source = array('username' => $username, 'password' => $password);
$items = array('username' => array(
                        'required' => true,
                        'min' => 1,
                        'max' => 100),
               'password' => array(
                        'required' => true,
                        'min' => 6));
if (!empty($email)){
    
    $source['email'] = $email;
    $source['email_again'] = $email_again;
    $items['email'] = array(
                        'required' => true,
                        'min' => 5);
    $items['email_again'] = array('matches' => 'email');
    $newInfo['email'] = $email;
}
if (!empty($npassword)){
    $source['npassword'] = $npassword;
    $source['npassword_again'] = $npassword_again;
    $items['npassword'] = array(
                        'required' => true,
                        'min' => 6);
    $items['npassword_again'] = array(
                        'required' => true,
                        'min' => 6,
                        'matches' => 'npassword');
    $newInfo['npassword'] = $npassword;
}
if ($info->username != $username){
    $source['username'] = $username;
    $items['username'] = array('required' => true,
                               'min' => 2,
                               'max' => 20,
                               'unique' => 'users');
    $newInfo['username'] = $username;
}

$validate->check($source, $items);

if ($validate->passed() && !empty($newInfo)){
    $user = new User($STH);
    if ($user->isLoggedIn(Session::get('uid')) >= 2 && Session::exists('uid')){ //If the user is logged in, and they are the logged in user
        $user_id = Session::get('uid');
        $user->updateUser($user_id, $newInfo);
        if ($info->username != $username){
            Session::put('username', $username);
        }
    } else {
        //Noperdoodle
    }
} elseif (empty($newInfo)){
    //Quack
} else {
    echo "Validation failed for the following reasons:<br>";
    $validate->errors();
}
?>