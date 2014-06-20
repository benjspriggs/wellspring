<?php
    funtion escape_data($data){
        global $dbc;
        if (ini_get('magic_quotes_gpc')){
            $data = stripslashes($data);
        }
    }
    return mysql_real_escape_string(trim($data)), $dbc);
?>