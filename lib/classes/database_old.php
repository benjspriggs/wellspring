<?php

##This class simplifies mysqli queries
class Database extends mysqli {
    
    private $result = array(); //Stores results for MySQL queries
    private $sql = array();
    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    
    ##Checks if the table exists in the database - returns boolean
    private function tableExists($table){
        $result = $this->query('SHOW TABLES LIKE '. $table);
        if (($result->num_rows) > 1){
            return true;
        } else {
            return false;
        }
    }
    
    private function getSQL(){
        $var = $this->sql;
        $q = implode(" ", $var);
        return $q;
    }
    
    private function runQuery($q){
        $query = $this->query($q);
        if ($query){
            $result[] = $query->fetch_assoc();
            $sql[] = $q;
        } else {
            return "There was an error.";
        }
    }
    
    ##Runs a mysqli select query - returns boolean
    public function select($table, $rows = '*', $where = NULL, $order = NULL){
        //if ($this->tableExists($table)){
            $q = "SELECT ". $rows ." FROM ". $table;
            
            if ($where != NULL){
                $q .= " WHERE ". $where;
            }
            
            if ($order != NULL){
                $q .= " ORDER BY ". $order;
            }
            
            $this->runQuery($q);
        //} else {
        //    return false; //The table does not exist
        //}
        
    }
    
    ##Runs a mysqli insert query with $values being a single dimensional array
    public function insert($table, $values, $rows = NULL){
        if (tableExists($table)){
            $q = "INSERT INTO ".$table;
            
            if ($rows != NULL){
                $q .= " (". $rows .")";
            }
            
            for ($i = 0; $i < count($values); $i++){
                if (is_string($values[$i])){
                    $values[$i] = '"'.$values[$i].'"';
                }
            }
            $values = implode(', ', $values);
            $q .= " VALUES (". $values .")";
            
            passSQL($q);
        }
    }
    
    ##Deletes either a table or entry from the database
    public function delete($table, $where = NULL){}
    
    ##Runs a mysqli update query
    public function update($table, $rows, $where){}
    
}

?>