<?php
class Mail {
    public static function verify($to, $token){
        $subject = 'Verify your e-mail with Wellspring';
        $message = "Welcome to Wellspring!/r/nThis is a custom-generated e-mail. You can verify your e-mail account by
        following this link: <a href=\"wellspring.com/loading.php&action=verifyEmail&email=$to&token=$token\">wellspring.com/loading.php&action=verifyEmail&email=$to&token=$token</a>/r/n
        Thank you!";
        $from = "From:". Config::get('mail/verify_from');
        mail($to, $subject, $message, $from);
    }
}
?>