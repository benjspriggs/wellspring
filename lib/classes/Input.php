<?php
class Input {
    public static function exists($type = 'post'){
        switch($type){
            case 'post':
                return (!empty($_POST)) ? TRUE : FALSE;
            break;
            case 'get';
                return (!empty($_GET)) ? TRUE : FALSE;
            break;
            default:
                return FALSE;
            break;
        }
    }
    
    public static function get($item){
        if (isset($_POST[$item])){
            return $_POST[$item];
        } elseif (isset($_GET[$item])){
            return $_GET[$item];
        } elseif (isset($_FILES[$item])){
            return $_FILES[$item];
        }
        return NULL;
    }
    
    public static function put($item, $value, $type = 'post'){
        if ($type = 'post'){
            $_POST[$item] = $value;
        } elseif ($type = 'get'){
            $_GET[$item] = $value;
        }
    }
}
?>