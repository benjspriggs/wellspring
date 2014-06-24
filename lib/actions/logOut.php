<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);
$id = Input::get('user_id');
$user->logOut($id);
$errors = $user->getErrors();
if (!empty($errors)){
    echo "Errors: <br>";
    $user->getErrors();
}
echo "Logged out successfully.<br>";
?>