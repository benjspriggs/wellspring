<?php
class Config {
    public static function get($path = NULL){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            
            foreach($path as $bit){
                if(isset($config[$bit])){
                    $config = $config[$bit];//Set config to be the last bit we want
                }
            }
            
            return $config;
        }
        return FALSE;
    }
}
?>