<?php
class StatementHandler {
    protected $PDO;
    private $_errors = array(),
            $_results,
            $_bindparam = array(),
            $_count;
    
    public function __construct(PDO $PDO){
        $this->PDO = $PDO;
    }
    
    private function clearErrors(){
        $this->_errors = array();
    }
    
    private function clearResults(){
        $this->_results = array();
    }
    
    private function addError($error){
        $this->_errors[] = $error;
        return $this;
    }
    
    public function lastCount(){
        return $this->_count;
    }
    
    public function getConnection(){
        return $this->PDO;
    }
    
    public function getErrors(){
        return $this->_errors;
    }
    
    public function getResults(){
        return $this->_results;
    }
    
    public function getEstimate($table, $row){
        $count = $this->PDO->prepare("SELECT COUNT($row) FROM $table");
        $count->execute();
        $count_row= $count->fetch();
        return intval($count_row[0]);
    }
    
    public function begin(){
        $this->PDO->beginTransaction();
        return $this;
    }
    
    public function commit(){
        $this->PDO->commit();
        return $this;
    }
    
    //join => array([join_table]=> name, [join_key]=> key, [primary_key]=> key), array(...) etc
    private function join(array $join, $where = array()){
        $sql = " ";
        foreach($join as $index => $info){
            if(is_array($info)){
                $sql .= $join['type']." JOIN (`";
                $tbl = "";
                $fields = "";
                $conds = "";
                $tbl .= $info['join_table'] ."`)";
                $sql .= $tbl ." ON (";
                    if(array_key_exists('join_table', $info) && array_key_exists('join_key', $info) && array_key_exists('primary_key', $info)){
                    $conds .= $info['primary_key'] ." = ". $info['join_key'];
                    
                    if(!empty($where)){
                        $conds .= " AND ". implode(" ", $where) ." ";
                    }
                    if(array_key_exists('fields', $info)){
                        foreach($info['fields'] as $key => $field){
                            $fieldsr[] = "`". $info['join_table'] ."`.`". $field ."`";//Tags.song_id, tags.thing
                        }
                        $fields = implode(", ", $fieldsr) ." ";
                        //echo "<br>Fields is now $fields";
                        
                    }
                    
                    $sql .= $conds .") ";
                    } else {
                        $this->addError("The array was improperly formatted - use 'join_table', 'primary_key', and 'join_key'.");
                    }
                }
            
        }
        $return[] = $sql;
        $return[] = $fields;
        return $return;
    }
    
    //Executes a/many prepared query/ies on the database in autocommit mode, handles errors and results
    //Assumes that each field in the SQL string is a named parameter (ex. :songname)
    //Values is an multiarray, with an associative array for each set of data it wants to push to the database
    //ex. [0]->[songname => quack, thing => boo], [1]->[songname => tuvatuala, thing=> boo]
    public function query($sql, $values = array(), $fetch = FALSE, $table = ''){
        $this->clearErrors();
        $this->clearResults();
        if($sth = $this->PDO->prepare($sql)){
            //echo $sql."<br>";
            if(!empty($values)){
                //print_r($values);
                $sth->execute($values);
                $this->_count = $sth->rowCount();
                if($fetch){
                    $this->_results = $sth->fetchAll();
                }
            } else {
                $q = $this->PDO->query($sql);
                $result = $q->fetchAll(PDO::FETCH_ASSOC);
                $row = $q->fetchAll(PDO::FETCH_NUM);
                $this->_count = $q->rowCount();
                
                if($fetch){
                    $this->_results = $result;
                }
            }
            
        } else {
            $this->addError('There was an error preparing the database statment.');
        }
    }
    
    //Gets information from the database. First key in $join_keys is the primary key
    //Join is multidimensional array ([0] -> [primary_key =>, join_table=>, join_key=>])
    public function get($table, $fields = array(), $values = array(), $where = array(), $orderby = array(), $join = array(), $extra = ''){
        $this->clearErrors();
        $this->begin();
        $operators = array("=", "<", ">", "<=", ">=");
        $sql = "";
        
        $sql = "SELECT ";
        
        if($fields === '*'){
            $sql .= $fields;
        } else {
            foreach($fields as $field){
                $sql .= "`$table`.`$field`, ";
            }
            $sql = substr($sql, 0, -2). " "; //Trim space and comma
            if(!empty($join)){
                $ret_sql = $this->join($join, $where); //Join call
                $sql .= ", ". $ret_sql[1];
            }
        }
        
        $sql .= "FROM `$table`";
        
        if(!empty($join)){
            $sql .= $ret_sql[0];
        }
        
        if(!empty($where) && count(array_intersect($operators, $where)) > 0){
            $sql .= " WHERE ";
            $wheres = implode(" ", $where);
            $sql .= $wheres;
        }
        
        if(!empty($orderby) && in_array($fields, $orderby)){
            $sql .= " ORDER BY ";
            $orderby = "`$table`.`". implode("` ", $orderby);
        }
        
        
        //Figure out field stuff here
        $sql .= " ". $extra;
        $sql .= ";";
        $this->query($sql, $values, TRUE);
        $this->commit();
        return $this;
    }
    
    
    
    public function delete($table, $values = array(), $where = array(), $fields = array(), $join = array(), $extra = ''){
        $this->clearErrors();
        $this->begin();
        $sql = "DELETE ";
        if(!empty($fields)){
            $sql .= implode(", ", $fields);
        }
        $sql .= "FROM `$table` WHERE ". implode(" ", $where);
        if(!empty($join)){
            $sql .= $this->join($join, $fields);
        }
        $sql .= " ". $extra;
        $sql .= ";";
        $this->query($sql, $values);
        $this->commit();
        return $this;
    }
    
    //Tables array holds fields- [0]->[table => songs_meta, data=>array(field=> value, field=> value, value...)] etc
    //It is assumed that the autoincrementing row will not be mentioned in its respective field array
    public function insert($tables = array(), $data = array(), $primarytable = '', $keyname = ''){
        $this->clearErrors();
        $this->begin();
        //Used a foreach loop in order to keep the LAST_INSERT_ID() functionality of PDO
        if(is_array($tables)){
            foreach($data as $tablename => $dataset){
                $field = $tables[$tablename];
                $sql = "INSERT INTO `$tablename` ";
                $fieldsStr = "(". implode(", ", $field) .")";
                $valuesStr = "(:". implode(", :", $field) .")";
                $sql .= "$fieldsStr VALUES $valuesStr";
                
                if(!isset($dataset[0])){
                    $this->query($sql, $dataset);
                    if($tablename == $primarytable){
                        $masterKey = $this->getConnection()->lastInsertId($primarytable .".". $keyname);
                    }
                } else {
                    foreach($dataset as $pairs){
                        $toReplaceArray = array_keys($pairs, 'LAST_INSERT_ID()');
                        
                        if(!empty($toReplaceArray)){
                            $toReplace = $toReplaceArray[0];
                            $pairs[$toReplace] = $masterKey;
                        }
                        $this->query($sql, $pairs);
                    }
                }
            
            }
        } else {
            $sql = "INSERT INTO `$tables` ";
            $fieldsStr = '';
            $valuesStr = '';
            foreach($data as $field => $value){
                $fieldsStr .= $field .", ";
                $valuesStr .= ":". $field .", ";
            }
            $fieldsStr = substr($fieldsStr, 0, -2);
            $valuesStr = substr($valuesStr, 0, -2);
            $sql .= "($fieldsStr) VALUES ($valuesStr)";
            $this->query($sql, $data);
        }
        
        $this->commit();
        return $this;
    }
    
    //Values is multidimensional associative array ([0]->[array(...)], [1]->[array(...) etc)
    public function update($table, $fields = array(), $values = array(), $where = array(), $extra = ''){
        $this->clearErrors();
        $this->begin();
        if(is_array($table)){
            foreach($table as $key => $t){
                $sql = "UPDATE `$t` SET ";
                foreach($fields as $table => $field){
                    $fieldsStr = "`$table`.`". $field ."` = :". $field .", "; //`songs_meta`.`song_name` = :songname etc
                }
                $fieldsStr = substr($fieldsStr, 0, -2). " "; //Trim last comma
                $sql .= $fieldsStr;
                if(!empty($where) && isset($where[$t])){
                    $sql .= " WHERE ";
                    $sql .= implode(" ", $where);
                }
                $sql .= " ". $extra;
                //Begin data handling, looping through each value that needs to be updated
                $this->query($sql, $values[$t]);
            }
            $this->commit();
            return $this;
        } else {
            $sql = "UPDATE `$table` SET ";
            foreach($fields as $key => $field){
                $fieldsStr = "`$table`.`". $field ."` = :". $field .", "; //`songs_meta`.`song_name` = :songname etc
            }
            $fieldsStr = substr($fieldsStr, 0, -2). " "; //Trim last comma
            $sql .= $fieldsStr;
            if(!empty($where)){
                $sql .= " WHERE ";
                $sql .= implode(" ", $where);
            }
            $sql .= " ". $extra;
            //Begin data handling, looping through each value that needs to be updated
            $this->query($sql, $values);
            $this->commit();
            return $this;
        }
        
    }
    
    public function find(){
        
    }
}
?>