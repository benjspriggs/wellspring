<?php
class Token {
    public static function generate(){
        return md5(uniqid());
    }
    
    public static function csrf(){
        $token = Token::generate();
        Session::put(Config::get('session/token_name'), $token);
        return $token;
    }
    
    public static function check($token){
        $tokenName = Config::get('session/token_name');
        
        if(Session::exists($tokenName) && $token === Session::get($tokenName)){
            Session::destroy($tokenName);
            return TRUE;
        }
        
        return FALSE;
    }
}
?>