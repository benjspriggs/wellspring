<?php
class Cookie {
    public static function create($name, $value){
        setcookie($name, $value, Config::get('remember/cookie_expiry'));
    }
    
    public static function exists($name){
        if (isset($_COOKIE[$name])){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public static function get($name){
        if (Cookie::exists($name)){
            return $_COOKIE[$name];
        }
    }
    public static function destroy($name){
        if (Cookie::exists($name)){
            setcookie($name, '', time()-3600);
        }
    }
}
?>