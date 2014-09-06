<?php
//Validate the input
$STH = new StatementHandler($PDO);
$validate = new Validate($STH);
$source = array('username' => Input::get('username'), 'password' => Input::get('password'), 'password_again' => Input::get('password_again'), 'email' => Input::get('email'), 'email_again' => Input::get('email_again'));
        $items = array('username' => array(
                            'required' => true,
                            'min' => 2,
                            'max' => 20),
                        'password' => array(
                            'required' => true,
                            'min' => 6),
                        'password_again' => array(
                            'required' => true,
                            'min' => 6,
                            'matches' => 'password'),
                        'email' => array(
                            'required' => true,
                            'min' => 5),
                        'email_again' => array(
                            'required' => true,
                            'min' => 5,
                            'matches' => 'email'));
$validate->check($source, $items);
if ($validate->passed()){
    if (Input::exists('remember')){
        $remember = TRUE;
    } else {
        $remember = FALSE;
    }
    //The user has supplied legit data
    //Register them!
    $user = new User($STH);
    $username = escape(Input::get('username'));
    $password = escape(Input::get('password'));
    $email = escape(Input::get('email'));
    $user->registerUser($username, $password, $email, $remember);
    $user->getErrors();
} else {
    echo 'Validation failed for the following reasongs: <br>';
    $validate->errors();
}
?>