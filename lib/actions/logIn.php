<?php
//The form has been submitted properly
//Validate the input
$STH = new StatementHandler($PDO);
$validate = new Validate($STH);
$username = Input::get('username');
$password = Input::get('password');
$source = array('username' => $username, 'password' => $password);
        $items = array('username' => array(
                            'required' => true,
                            'min' => 2,
                            'max' => 20,
                            'exists' => 'users'),
                        'password' => array(
                            'required' => true,
                            'min' => 6));
$validate->check($source, $items);
if ($validate->passed()){
    //The user has supplied data that is bounded, and matches
    //Log them in!
    if (Input::get('remember')){
        $remember = TRUE;
    } else {
        $remember = FALSE;
    }
    $user = new User($STH);
    $result = $STH->get('users', array('salt'), array('username' => $username),array('username', '=', ':username'))->getResults();
    $salt = $result[0]['salt'];
    $user->logIn($username, Hash::encode($password, $salt), $remember);
    if ($user->hasErrors()){
        echo "There was an error logging you in:<br>";
        $user->getErrors();
    } else {
        echo "Logged in successfully!<br>";
    }
} else {
    echo 'Validation failed for the following reasons: <br>';
    $validate->errors();
}
?>