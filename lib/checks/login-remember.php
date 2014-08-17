<?php
if (Session::exists(Config::get('session/session_name')) && Cookie::exists(Config::get('remember/cookie_name'))){
    $user_id = Session::get('uid');
    $u = new User($STH);
    $username = $u->getUsername($user_id);
    $token = Session::get(Config::get('session/session_name'));
    $key = Hash::encode($username, $token);
    if ($key == Cookie::get('remember/cookie_name')){
        $login_remember = TRUE;
    } else {
        $login_remember = FALSE;
    }
} else {
    $login_remember = FALSE;
}
return $login_remember;
?>