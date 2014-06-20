<?php
require_once('functions.php');

class Search {
    private $PDO;
    public $needles = array();
    public function __construct($search_terms, PDO $PDO){
        $indivTerms = explode(", ", $search_terms); //You can add a Regex separator here later
        $this->needles[] = $search_terms;
        $this->needles[] = $indivTerms;
        $this->PDO = $PDO;
    }
    
    public function getConnection(){
        return $this->PDO;
    }
    
    public function getQuery(array $sTerms){
        $string = implode(", ", $sTerms);
        $q = "";
        return $q;
    }
    
    public function orderedSearch($terms, $field, $view = "text"){
        //Searches and orders by a field (name, description etc), within a predetermined view
        //Returns an array of associated objects (for now, Songs, but eventually, users and groups)
    }
    
    public function generalSearch($terms, $view){
        //Searches indescriminately with terms within a predetermined view
        //Returns an array of associated objects (for now, Songs, but eventually, users and groups)
    }
}

?>