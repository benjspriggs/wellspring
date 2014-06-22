<?php
##############################################USER ID###################################################
class SongManager {
    protected $STH; //Object link for the statement handler
    private $_prepare, //Hold prepared SQL statement
            $_errors = array(), //Error checking
            $_user_id,
            $_fields = array(),
            $_where = array(),
            $_orderby = array(),
            $_join = array();
            
    public function __construct(StatementHandler $STH, $user_id = 0){
        $this->STH = $STH;
        $this->_user_id = $user_id;
    }
    
    public function getHandler(){
        return $this->STH;
    }
    
    public function getErrors(){
        foreach($this->_errors as $key){
            echo "<br>". $key ."<br>";
        }
    }
    
    public function getUserID(){
        return $this->_user_id;
    }
    
    public function getFields(){
        return $this->_fields;
    }
    
    public function getWhere(){
        return $this->_where;
    }
    
    public function getOrderBy(){
        return $this->_orderby;
    }
    
    public function getJoin(){
        return $this->_join;
    }
    
    public function clearView(){
        $this->_fields = array();
        $this->_where = array();
        $this->_orderby = array();
        $this->_join = array();
    }
    
    public function clearFiles(){
        $this->uploaded = array();
        $this->path = array();
    }
    
    public function addFiles(array $files, Song $songObj){
        $this->_errors[] = array();
        $songObj->clearFileData();
        $song_name = $songObj->song_name;
        $uploaded = array();
        $path = array();
        $success_path = array();
        foreach ($files['name'] as $key => $name){
                if ($files['error'][$key] == 0){
                        $uploaded[] = $name;
                        $path[] = "/uploads/". $song_name ."/";
                        
                        foreach ($path as $key => $name){
                            $filepath = Config::get('app/root').$path[$key];
                            if(!is_dir($filepath)){
                                mkdir($filepath);
                            }
                            if (move_uploaded_file($files['tmp_name'][$key], $filepath.$uploaded[$key])){
                                    $success_path[] = $path[$key];
                            } else {
                                $this->_errors[] = "$name was not uploaded successfuly.";
                            }
                        }
                } else {
                    $this->_errors[] = "File $name was not stored properly.";
                    switch($files['error'][$key]){
                        case 1:
                            $this->_errors[] = "$name had a filesize greater than what was specified in the server configuration.";
                            break;
                        case 2:
                            $this->_errors[] = "$name had a filesize greater than what was specified in the HTML form.";
                            break;
                        case 3:
                            $this->_errors[] = "$name was only partially uploaded.";
                            break;
                        case 4:
                            $this->_errors[] = "No file was uploaded.";
                            break;
                        case 6:
                            $this->_errors[] = "$name had a missing temporary folder.";
                            break;
                        case 7:
                            $this->_errors[] = "We weren't able to write $name to disk.";
                            break;
                        case 8:
                            $this->_errors[] = "A PHP extension stopped $name from uploading.";
                            break;
                        default:
                            $this->_errors[] = "Unknown upload error.";
                            break;
                    }
                }
        }
        
        $songObj->assignFileData($uploaded, $success_path);
        return $songObj;
    }
    
    private function generateView($view = 'text', $sortby = '', $exclusive = FALSE){
        $this->clearView();
        if($exclusive){
            $exclusive = '';
        } else {
            $exclusive = 'LEFT';
        }
        switch ($view){
            case ('text'):
                $this->_fields = array('song_name', 'song_desc', 'lyrics', 'song_id');
                $this->_where = array('song_id', '=', ':song_id');
                $this->_join = array();
                break;
            case ('text_extended'):
                $this->_fields = array('song_name', 'song_desc', 'lyrics', 'postdate', 'timestamp', 'song_id');
                $this->_where = array('songs_meta.song_id', '=', ':song_id');
                $this->_join = array(array('join_table' => 'tags',
                                            'primary_key' => 'songs_meta.song_id',
                                            'join_key' => 'tags.song_id',
                                            'fields' => array('tags')),
                                     array('join_table' => 'embeds',
                                            'primary_key' => 'songs_meta.song_id',
                                            'join_key' => 'embeds.song_id',
                                            'fields' => array('embeds')), 'type' => $exclusive);
                break;
            case ('full'):
                $this->_fields = array('song_name', 'song_desc', 'lyrics', 'postdate', 'timestamp', 'song_id');
                $this->_where = array('songs_meta.song_id', '=', ':song_id');
                $this->_join = array(array('join_table' => 'tags',
                                           'primary_key' => 'songs_meta.song_id',
                                           'join_key' => 'tags.song_id',
                                           'fields' => array('tags')),
                                     array('join_table' => 'embeds',
                                           'primary_key' => 'songs_meta.song_id',
                                           'join_key' => 'embeds.song_id',
                                           'fields' => array('embeds')),
                                     array('join_table' => 'media',
                                           'primary_key' => 'songs_meta.song_id',
                                           'join_key' => 'media.song_id',
                                           'fields' => array('media_name', 'filetype')), 'type' => $exclusive);
                break;
            case ('media'):
                $this->_fields = array('song_name', 'song_desc', 'lyrics', 'song_id', 'songs_meta.song_id');
                $this->_where = array('songs.meta.song_id', '=', ':song_id');
                $this->_join = array(array('join_table' => 'media', 'primary_key' => 'songs_meta.song_id', 'join_key' => 'media.song_id', 'fields' => array('media_name', 'filetype')), 'type' => $exclusive);
                break;
            default:
                return $this;
                break;
        }
        switch ($sortby){
            case(''):
                $this->_orderby = array();
                break;
            case('recent'):
                $this->_orderby = array('`songs_meta`.`song_id`', 'ASC');
                break;
            case('oldest'):
                $this->_orderby = array('`songs_meta`.`song_id`', 'DESC');
                break;
            default:
                $this->_orderby = array();
                break;
        }
    }
    
    public function exists($song_id){
        $this->_errors = array();
        $STH = $this->STH;
        $STH->get('songs_meta', '*', array('song_id' => $song_id), array('song_id', '=', ':song_id'));
        $results = $STH->getResults();
        if(empty($results)){
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function addSong(Song $songObj){
        $this->_errors = array();
        $STH = $this->getHandler();
        $PDO = $STH->getConnection();
        $user_id = $this->getUserID();
        $songData = array(":user_id" => $user_id,
                          ":song_name" => $songObj->song_name,
                          ":song_desc" => $songObj->song_desc,
                          ":lyrics" => $songObj->lyrics);
        $tables = array('songs_meta' => array('user_id', 'song_name', 'song_desc', 'lyrics'));
        $data['songs_meta'] = $songData;
        
        if(!empty($songObj->tags)){
            $tagData = array(":tags" => $songObj->tags,
                             ":song_id" => 'LAST_INSERT_ID()',
                             ":user_id" => $user_id);
            $tables['tags'] = array('song_id', 'user_id', 'tags');
            $data['tags'] = $tagData;
        }
        
        if(!empty($songObj->embeds)){
            $tables ['embeds']= array('song_id', 'user_id', 'embeds');
            $embedData = array(':song_id' => 'LAST_INSERT_ID()',
                               ':user_id' => $user_id,
                               ':embeds' => $songObj->embeds);
            $data['embeds'] = $embedData;
        }
        
        if(!empty($songObj->files)){
            $tables ['media']= array('song_id', 'user_id', 'media_name', 'filetype');
            foreach($songObj->files['name'] as $index => $name){
                $fileData = explode(".", $name);
                $filetype = end($fileData);
                $filename = $fileData[0];
                $mediaData = array(':song_id' => 'LAST_INSERT_ID()',
                                   ':user_id' => $user_id,
                                   ':media_name' => $filename,
                                   ':filetype' => $filetype);
                $data['media'][] = $mediaData;
            }
        }
        $STH->insert($tables, $data, 'songs_meta', 'song_id');
        return $this;
    }

    public function deleteSong(Song $songObj){
        $this->_errors = array();
        $user_id = $this->getUserID();
        if($user_id != 0){
            $PDO = $this->getConnection();
            $PDO->beginTransaction();
            $song_id = $songObj->songid;
            $sql .= "DELETE FROM songs_meta WHERE (song_id = $song_id);";
            $sql .= "DELETE FROM tags WHERE (song_id = $song_id);";
            $sql .= "DELETE FROM media WHERE (song_id = $song_id);";
            $sql .= "DELETE FROM embeds WHERE (song_id = $song_id);";
            $STH = $PDO->prepare($sql);
            $STH->execute();
            $PDO->commit();
            return $this;
        } else {
            $this->_errors[] = 'Cannot delete song from anonymous account.';
            return $this;
        }
    }
    
    public function viewSong($song_id, $view = "text", $sortby = ''){
        $this->_errors = array();
        $STH = $this->getHandler();
        $this->generateView($view, $sortby, FALSE);
        $fields = $this->getFields();
        $where = $this->getWhere();
        $orderby = $this->getOrderBy();
        $join = $this->getJoin();
        $values = array(':song_id' => $song_id);
        $STH->get('songs_meta', $fields, $values, $where, $orderby, $join);
        $results = $STH->getResults();
        return $results[0];
    }
    
    ##Limits array: Start (min), Num_res (max), Page (default 1)
    public function viewSongs(array $limits, $view = 'text', $sortby = '', $userid = ''){
        //Get all of the data from the DB
        $this->_errors = array();
        $STH = $this->getHandler();
        $this->generateView($view, $sortby);
        $table = 'songs_meta';
        $fields = $this->getFields();
        $where = array();
        $orderby = $this->getOrderby();
        $join = $this->getJoin();
        //Ask DB for all row that are between the start, num rows, and begin after the page limit
        if(array_key_exists('num_res', $limits)){
            if(array_key_exists('page', $limits)){
                $pair = array('start' => ($limits['num_res'] * ($limits['page'] -1)), 'end' => ($limits['num_res'] * $limits['page']));
                $extra = " LIMIT ". $pair['start']. ", ". $limits['num_res'];
                $resArray = $STH->get($table, $fields, array(), $where, $orderby, $join, $extra)->getResults();
                return $resArray; // Array filled with objects hydrated with the properties that match the query
            } else {
                $this->_errors[] = 'There was no page specified in viewSongs call, fatal';
                return $this;
            }
        } else {
            $this->_errors[] = 'There was no num_res specified in viewSongs call, fatal';
            return $this;
        }
        
        //Sort the results (by recent, oldest, user etc)
        
        //Return the array of song objects that match the provided limits
    }
    
    public function updateSong(Song $songObj){
        $this->_errors = array();
        if($user_id != 0){
            $PDO = $this->getConnection();
            $PDO->beginTransaction();
            $sth = $PDO->prepare("UPDATE `songs_meta` SET `song_name` = :songname, `song_desc` = :songdesc, `user_id` = :userid, `lyrics` = :lyrics
                                 WHERE `song_id` = :songid;
                                 INSERT INTO `tags` (`song_id`, `tags`) VALUES (`:songid`, `:tags`)
                                    ON DUPLICATE UPDATE `song_id` = VALUES(`song_id`), `tags` = VALUES(`tags`);
                                 INSERT INTO `embeds` (`song_id`, `embeds`) VALUES (`:songid`, `:embeds`)
                                    ON DUPLICATE UPDATE `song_id` = VALUES(`song_id`), `embeds` = VALUES(`embeds`);
                                 INSERT INTO `media` (`song_id`, `media_name`, `filetype`) VALUES (`:songid`, `:medianame`, `:filetype`)
                                    ON DUPLICATE UPDATE `song_id` = VALUES(`song_id`), `media_name` = VALUES(`media_name`), `filetype` = VALUES(`filetype`);");
            $sth->execute((array)$songObj);
            $PDO->commit();
            return $this;
        } else {
            $this->_errors[] = 'Cannot update song from anonymous account.';
            return $this;
        }
    }
    
    ##Creates a new grouping of Songs
    ##1 - Album, 2 - compilation
    public function newGroup($song_id, $type, $name){
        $this->_errors = array();
        $PDO = $this->getConnection();
        $PDO->beginTransaction();
        $sth = $PDO->prepare('INSERT INTO groups_lookup (\'group_name\', \':type\') VALUES (\':group_name\', \':type\');');
        $dsth = $PDO->prepare('INSERT INTO groups (\'group_id\', \'song_id\') VALUES (LAST_INSERT_ID(), \':song_id\');');//group_id is autoincrement
        
        $data = array(
            'song_id' => $song_id,
            'type' => $type,
            'group_name' => $name
        );
        foreach ($data['song_id'] as $key => $song_id){
            $dsth->execute($data['song_id'][$song_id]);
            $sth->execute();
        }
        $PDO->commit();
        return $this;
    }
    public function destroyGroup(){
        $this->_errors = array();
    }
    public function viewGroup(){
        $this->_errors = array();
    }
    public function updateGroup(){
        $this->_errors = array();
    }
}
?>