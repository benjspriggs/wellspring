<?php
class Mail {
    public static function verify($to, $token){
        $subject = 'Verify your e-mail with Sprico';
        $message = "<html><h2>Welcome to the Sprico Digitization project!</h2>
        <div>This is a custom-generated e-mail. You can verify your e-mail account by
        following this link:<br>
        <a href=\"digitize.sprico.com/loading.php?action=verifyEmail&email=$to&token=$token\">Verify $to</a>
        </div><br><div>Thank you!</div></html>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From:". Config::get('mail/verify_from');
        mail($to, $subject, $message, $headers);
    }
}
?>