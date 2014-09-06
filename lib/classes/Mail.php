<?php
class Mail {
    public static function verify($to, $token){
        $subject = 'Verify your e-mail with Wellspring';
        $message = "<html><h2>Welcome to Wellspring!</h2>
        <div>This is a custom-generated e-mail. You can verify your e-mail account by
        following this link:<br>
        <a href=\"wellspring.com/loading.php?action=verifyEmail&email=$to&token=$token\">Verify $to</a>
        </div><br><div>Thank you!</div></html>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From:". Config::get('mail/verify_from');
        mail($to, $subject, $message, $headers);
    }
    
    public static function notice($to, $type){
        $subject = 'Notice from Wellspring';
        switch ($type){
            case('deleteUser'):
                $message = "<html><h2>Your account has successfully been removed!</h2>
                <div>Thank you for helping, and we hope you have time doing whatever it is you want to do!
                </div><br><div>Thank you!</div></html>";    
                break;
            default:
                $message = "<html><div>". $type ."</div></html>";
                break;
        }
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From:". Config::get('mail/verify_from');
        mail($to, $subject, $message, $headers);
    }
}
?>