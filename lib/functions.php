<?php
##This script contains functions that the generality of the website uses

##Finds the type of the media uploaded to the fileserver.
##Matches strings of known file extentions with general media types.
function findMediaType ($str){
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

function combineCommaString (array $string){
    return implode(', ', $string);
}

##Escapes data. Use array_walk_recursive to cleanse arrays
function escape ($data){
    return mysql_real_escape_string($data);
}
?>