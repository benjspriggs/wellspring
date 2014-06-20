<?php
##This script contains functions that the generality of the website uses

##Sanitizes user data.
function escape($data){
    $data = mysql_real_escape_string($data);
    return $data;
}
##Finds the type of the media uploaded to the fileserver.
function findMediaType($str){
    $type_img = array("jpg", "bmp", "png");
    $type_vid = array("mov", "wmv", "avi", "mp4");
    $type_aud = array("mp3", "wav");
    
    if (in_array($str, $type_img)){
        return "img";
    } elseif (in_array($str, $type_vid)){
        return "vid";
    } elseif (in_array($str, $type_aud)){
        return "aud";
    } else {
        return NULL;
    }
}

function combineCommaString(array $string){
    return implode(', ', $string);
}
?>