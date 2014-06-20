<?php
##This script contains functions that the generality of the website uses
##Sanitizes user data.
function sanitize($data){
    $data = mysql_real_escape_string($data);
    return $data;
}
##Finds the type of the media uploaded to the fileserver.
function find_media_type($str){
    $type_img = array("jpg", "bmp", "png"); //Image files
    $type_vid = array("mov", "wmv", "avi", "mp4"); //Video files
    $type_aud = array("mp3", "wav");
    
    if (in_array($str, $type_img)){
        return "img";
    } elseif (in_array($str, $type_vid)){
        return "vid";
    } elseif (in_array($str, $type_aud)){
        return "aud";
    } else {
        return FALSE;
    }
}
##Uses preg_split to break text by special limiting characters (i.e. , or . or -)
function tagify ($str){
    $str = preg_split("/[\s,-]+/", $str);
    $str = implode(", ", $str);
    return $str;
}
?>