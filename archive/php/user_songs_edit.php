<?php
//This populates template.php or something with all of the songs a user has made, submitted, or edited. OR something.

require('php/connect01.php');
$database = "wellspr_test";
$dbs = mysqli_select_db($dbc, $database);

if ($dbc == true){
    if ($dbs == true){
        $song_meta_query = mysqli_query($dbc, "SELECT (`user_id`.`songs_meta`,
                                                     `song_name`.`songs_meta`,
                                                     `song_desc`.`songs_meta`,
                                                     `lyrics`.`songs_meta`,
                                                     `user_id`.`users`)
                                                FROM
                                                     `songs_meta`,`users`
                                                WHERE `user_id`.`songs_meta` = `user_id`.`users`");
        $results = mysqli_fetch_assoc($song_meta_query);
    } else {
        echo "There was an error selecting the database $database.<br>\n";
    }
} else {
    echo "There was an error connecting to $database.<br>\n";
}

mysqli_close($dbc);
?>