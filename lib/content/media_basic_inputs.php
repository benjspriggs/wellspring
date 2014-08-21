<?php
echo "<div class=\"media\">";
echo "<p class=\"media-link\">";
if (is_array($media[0])){
    foreach ($media as $index => $asset){
        switch (findMediaType($asset['filetype'])){
            case ('img'):
            case ('aud'):
            case ('vid'):
                echo "<input type=\"checkbox\" name=\"media_id[]\" value=\"". $asset['media_id'] ."\">";
                echo "<a href=\"uploads/". $song['song_name'] ."/". $asset['media_name'] .".". $asset['filetype'] ."\">". $asset['media_name'] .".". $asset['filetype'] ."</a><br>\n";
                break;
            default:
                break;
            
        }
    }
} else {
    switch (findMediaType($media['filetype'])){
        case ('img'):
        case ('aud'):
        case ('vid'):
            echo "<input type=\"checkbox\" name=\"media_id[]\" value=\"". $media['media_id'] ."\">";
            echo "<a href=\"uploads/". $song['song_name'] ."/". $media['media_name'] .".". $media['filetype'] ."\">". $media['media_name'] .".". $media['filetype'] ."</a><br>\n";
            break;
        default:
            break;
        
    }
}
echo "</p>";
echo "</div>";
?>