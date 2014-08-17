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
                        $path[] = $song_name ."/";
                        
                        foreach ($path as $key => $filename){
                            $filepath = Config::get('root/uploads') . $filename;
                            if (!is_dir($filepath)){
                                mkdir($filepath);
                            }
                            if (move_uploaded_file($files['tmp_name'][$key], $filepath . $uploaded[$key])){
                                    $success_path[] = $filename;
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
    
    ##Removes media (singular and plural) from the database
    public function removeFiles($media_id){
        $this->_errors[] = array();
        $STH = $this->getHandler();
        $table = 'media';
        $where = array('media_id', '=', ':media_id');
        if (is_array($media_id)){
            foreach($media_ids as $index => $id){
                $values = array('media_id' => $id);
                $STH->delete($table, $values, $where);
            }
        } else {
            $values = array('media_id' => $media_id);
            $STH->delete($table, $values, $where);
        }
        
        return $this;
    }
    
    private function generateView($view = 'text', $sortby = '', $exclusive = FALSE){
        $this->clearView();
        if ($exclusive){
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
                                     'type' => $exclusive);
                break;
            case ('media'):
                $this->_fields = array('media_name', 'filetype', 'media_id');
                $this->_where = array('media.song_id', '=', ':song_id');
                $this->_join = array();
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
    
    public function exists($id, $type = 'song'){
        $this->_errors = array();
        $STH = $this->getHandler();
        switch ($type){
            case('song'):
                $STH->get('songs_meta', '*', array('song_id' => $id), array('song_id', '=', ':song_id'));
                break;
            case('group'):
                $STH->get('groups', '*', array('group_id' => $id), array('group_id', '=', ':group_id'));
                break;
        }
        $results = $STH->getResults();
        if (empty($results)){
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function hasMedia($song_id){
        $this->_errors = array();
        $STH = $this->STH;
        $STH->get('media', 'media_id', array('song_id' => $song_id), array('song_id', '=', ':song_id'));
        $results = $STH->getResults();
        if (empty($results)){
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function addSong(Song $songObj){
        $this->_errors = array();
        $STH = $this->getHandler();
        $user_id = $this->getUserID();
        $date = date("Y-m-d H:i:s");
        $songData = array(":user_id" => $user_id,
                          ":song_name" => $songObj->song_name,
                          ":song_desc" => $songObj->song_desc,
                          ":lyrics" => $songObj->lyrics,
                          ":postdate" => $date);
        $tables = array('songs_meta' => array('user_id', 'song_name', 'song_desc', 'lyrics', 'postdate'));
        $data['songs_meta'] = $songData;
        
        if (!empty($songObj->tags)){
            $tables['tags'] = array('song_id', 'user_id', 'tags', 'postdate');
            $tagData = array(":tags" => $songObj->tags,
                             ":song_id" => 'LAST_INSERT_ID()',
                             ":user_id" => $user_id,
                             ":postdate" => $date);
            $data['tags'] = $tagData;
        }
        
        if (!empty($songObj->embeds)){
            $tables['embeds']= array('song_id', 'user_id', 'embeds', 'postdate');
            $embedData = array(':song_id' => 'LAST_INSERT_ID()',
                               ':user_id' => $user_id,
                               ':embeds' => $songObj->embeds,
                               ":postdate" => $date);
            $data['embeds'] = $embedData;
        }
        
        if (!empty($songObj->files)){
            $tables['media']= array('song_id', 'user_id', 'media_name', 'filetype');
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

    public function deleteSong($song_id, $user_id){
        $this->_errors = array();
        if ($user_id > 0){
            $STH = $this->getHandler();
            $STH->delete('songs_meta', array(':song_id' => $song_id), array('song_id', '=', ':song_id'));
            $STH->getErrors();
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
        if ($view == 'media'){
            $table = 'media';
        } else {
            $table = 'songs_meta';
        }
        $fields = $this->getFields();
        $where = $this->getWhere();
        $orderby = $this->getOrderBy();
        $join = $this->getJoin();
        $values = array(':song_id' => $song_id);
        $STH->get($table, $fields, $values, $where, $orderby, $join);
        $results = $STH->getResults();
        if (count($results) == 1){
            return $results[0];
        } else {
            return $results;
        }
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
        if (array_key_exists('num_res', $limits)){
            if (array_key_exists('page', $limits)){
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
    
    //Files has structure of: files=>array( name=>array([0] first name, [1] second name), filetype=>array([0 first filetype, [1] second filetype))
    //tl;dr the same strucure as a $_FILES array
    public function updateSong(Song $songObj, $song_id, $user_id){
        $this->_errors = array();
        if ($user_id != 0){
            $STH = $this->getHandler();
            $date = date("Y-m-d H:i:s");
            
            $songData = array(":song_id" => $song_id,
                              ":user_id" => $user_id,
                              ":song_name" => $songObj->song_name,
                              ":song_desc" => $songObj->song_desc,
                              ":lyrics" => $songObj->lyrics);
            $tables = array('songs_meta' => array('song_id', 'user_id', 'song_name', 'song_desc', 'lyrics'));
            $data['songs_meta'] = $songData;
            
            if (!empty($songObj->tags)){
                $tables['tags'] = array('song_id', 'user_id', 'tags', 'postdate');
                $tagData = array(":tags" => $songObj->tags,
                                 ":song_id" => $song_id,
                                 ":user_id" => $user_id,
                                 ":postdate" => $date);
                $data['tags'] = $tagData;
            }
            
            if (!empty($songObj->embeds)){
                $tables['embeds']= array('song_id', 'user_id', 'embeds', 'postdate');
                $embedData = array(':song_id' => $song_id,
                                   ':user_id' => $user_id,
                                   ':embeds' => $songObj->embeds,
                                   ":postdate" => $date);
                $data['embeds'] = $embedData;
            }
            
            if (!empty($songObj->files)){
                $tables['media']= array('song_id', 'user_id', 'media_name', 'filetype');
                foreach($songObj->files['name'] as $index => $name){
                    $fileData = explode(".", $name);
                    $filetype = end($fileData);
                    $filename = $fileData[0];
                    $mediaData = array(':song_id' => $song_id,
                                       ':user_id' => $user_id,
                                       ':media_name' => $filename,
                                       ':filetype' => $filetype);
                    $data['media'][] = $mediaData;
                }
            }
            $q = $STH->insert($tables, $data, NULL, NULL, TRUE);
            return $this;
        } else {
            $this->_errors[] = 'Cannot update song from anonymous account.';
            return $this;
        }
    }
    
    ##Creates a new grouping of Songs
    ##1 - Album, 2 - compilation
    public function newGroup(array $song_id, $type, $name, $desc, $pTable = 'groups', $pKey = 'group_id'){
        $this->_errors = array();
        $STH = $this->getHandler();
        $user_id = $this->getUserID();
        $tables = array('groups' => array('group_name', 'group_desc', 'type', 'user_id'),
                        'groups_lookup' => array('group_id', 'song_id', 'user_id')); //List of tables to insert (make sure lookup table is first)
        $groupData = array(':group_name' => $name, ':group_desc' => $desc, ':type' => $type, ':user_id' => $user_id); //IDs and group ids and stuff
        $data['groups'] = $groupData;
        
        foreach ($song_id as $index => $id){
            $data['groups_lookup'][] = array(':group_id' => 'LAST_INSERT_ID()', ':song_id' => $id, ':user_id' => $user_id);
        }
        
        $STH->insert($tables, $data, $pTable, $pKey);
        return $this;
    }
    public function destroyGroup($group_id, $table = 'groups'){
        $this->_errors = array();
        $STH = $this->getHandler();
        $where = array('group_id', '=', $group_id);
        $STH->delete($table, NULL, $where);
        return $this;
    }
    
    ##Returns name, description, and list of song IDs that are in the specified song
    public function viewGroup($group_id, $members = FALSE, $songIdOnly = TRUE){
        $this->_errors = array();
        $STH = $this->getHandler();
        //Get info from groups
        $table = 'groups';
        $fields = '*';
        $values = array(':group_id' => $group_id);
        $where = array('group_id', '=', ':group_id');
        $res = $STH->get($table, $fields, $values, $where)->getResults();
        //Get info from groups_lookup
        if (count($res) == 1){
            $res = $res[0];
        }
        
        if ($members){
            $table = 'groups_lookup';
            if ($songIdOnly = TRUE){
                $fields = array('song_id');
            }
            $res['members'] = $STH->get($table, $fields, $values, $where)->getResults();
        }
        return $res;
    }
    
    public function updateGroup(array $old_group, array $new_group){
        $this->_errors = array();
    }
    
    public function songIdentity($song_id){
        $this->_errors = array();
        $STH = $this->getHandler();
        $table = 'groups_lookup';
        $fields = '*';
        $values = array(':song_id' => $song_id);
        $where = array('song_id', '=', ':song_id');
        $res = $STH->get($table, $fields, $values, $where)->getResults();
        $res['count'] = $STH->lastCount();
        return $res;
    }
}
?>