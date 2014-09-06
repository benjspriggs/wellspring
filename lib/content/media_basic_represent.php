<?php
echo "<div class=\"media\">";
if (is_array($media[0])){
    foreach ($media as $index => $asset){
        $path = "uploads/". $song['song_name'] ."/". $asset['media_name'] .".". $asset['filetype'];
        switch (findMediaType($asset['filetype'])){
            case ('img'):
                echo "<a href=\"". $path ."\">". $asset['media_name'] ."<br>\n";
                echo "<img src=\"". $path ."\">";
                echo "</a>";
                break;
            case ('aud'):
                echo "<audio controls>";
                echo "<source src=\"". $path ."\"><br>\n";
                echo "</audio>";
                break;
            case ('vid'):
                echo "<video width=\"320\" height=\"240\" controls>";
                echo "<source src=\"". $path ."\">";
                echo "</video>";
                break;
            default:
                break;
            
        }
    }
} else {
    $path = "uploads/". $song['song_name'] ."/". $media['media_name'] .".". $media['filetype'];
    switch (findMediaType($media['filetype'])){
        case ('img'):
            echo "<a href=\"". $path ."\">". $media['media_name'] ."<br>\n";
            echo "<img src=\"". $path ."\">";
            echo "</a>";
            break;
        case ('aud'):
            echo "<audio controls>";
            echo "<source src=\"". $path ."\" type=\"audio/". $media['filetype'] ."\"><br>\n";
            echo "</audio>";
            break;
        case ('vid'):
            echo "<video width=\"320\" height=\"240\" controls><source src=\"". $path ."\"></video>"; //Insert any uploaded videos, or embeds here (Make sure to account for browsers that can't serve up HTML5 video)
            break;
        default:
            break;
        
    }
}
echo "</div>";
?>