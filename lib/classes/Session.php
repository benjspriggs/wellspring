<?php
class Session {
    public static function exists($name){
        if (isset($_SESSION[$name])){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public static function put($name, $value){
        $_SESSION[$name] = $value;
    }
    
    public static function get($name){
        if (Session::exists($name)){
            return $_SESSION[$name];
        }
    }
    
    public static function create(){
        if (isset($_SESSION)){
            session_regenerate_id(true);
        } else {
            session_start();
        }        
    }
    
    public static function destroy($name){
        if (self::exists($name)){
            unset($_SESSION[$name]);
        }
    }
}
?>