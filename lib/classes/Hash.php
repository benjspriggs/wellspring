<?php
class Hash {
    public static function encode($string, $salt = ''){
        return md5($string . $salt . Config::get('hash/pepper'));
    }
}

?>