<?php
//Hash the username, user salt, and global pepper together
$STH = new StatementHandler($PDO);
$email_v = Input::get('email');
$q = $STH->get('users', array('salt', 'email'), array('email' => $email_v), array('email', '=', ':email'))->getResults();
if(isset($q[0]['email'])){
    $email = $q[0]['email'];
    $usersalt = $q[0]['salt'];
    $mastertoken = Hash::encode($email, $usersalt);
    $checktoken = Hash::encode($email_v, $usersalt);
    //Does it match?
    if($mastertoken === $checktoken){
        //If so, verify user (change the verified 1/0 value, redirect)
        $STH->update('users', array('is_verified'), array('is_verified' => 1), array('email', '=', "'test@gmail.com'"));
        if($STH->lastCount() > 0){
            echo "Thank you, $email has been verified!<br>";
        } else {
            echo "There was an error updating the database with your information.";
        }
    } else {
        //Else, spit out error message
        echo "We couldn't verify $email_v, it didn't match our records.<br>";
    }
} else {
    echo 'Snap. That e-mail does not exist in our records.<br>'
}

?>