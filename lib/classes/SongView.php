<?php
##Check yoself befo' you wreck yoself. Do you really need a class to do this?
##Hint: No. SongManager.
class SongView extends Song{
        public $songid;
        public function __construct(PDO $PDO, $song_id){
                $song_id = array("songid" => intval($this->songid));
                $sth = $PDO->prepare("SELECT `song_name` AS `songname`, `song_desc` AS `songdesc`, `lyrics`, `songs_meta`.`song_id` AS `songid`
                                     FROM `songs_meta`
                                     WHERE `songs_meta`.`song_id` = :songid;");
                $sth->execute($song_id); //Select song data where song_id matches
                $results = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Song", array('songname', 'songdesc', 'lyrics'));
                return $results; //Return Song object with properties described in database
        }
}
?>