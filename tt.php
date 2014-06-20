<?php
require_once 'lib/init.php';
$STH = new StatementHandler($PDO);
    $validate = new Validate($STH);
    $source = array('username' => 'test', 'password' => 'morethant5');
            $items = array('username' => array(
                                'required' => true,
                                'min' => 2,
                                'max' => 20,
                                'unique' => 'users'),
                            'password' => array(
                                'required' => true,
                                'min' => 6));
    $validate->check($source, $items);
    if($validate->passed()){
        echo "Validation passed, the username is unique.";
    } else {
        echo "Failed, the username already exists.";
    }
    $rule_value = 'users';
    $item = 'username';
    $value = 'tesdt';
    $check = $STH->get($rule_value, '*', array("$item" => $value), array($item, "=", ":$item"))->lastCount();
  //  var_dump($check);
                            //if($check->lastCount() < 0){
                            //    echo "username does not exist.";
                            //} else {
                            //    echo "exists";
                            //}
//echo escape('test@gmal.com');
//var_dump($STH->get('users', array('salt'), array('username', '=', 'novak'))->getResults());

//$data['media'][] = array('song_id' => 'thing');
//$data['media'][] = array('song_id' => 'another thing');
//$data['tags'] = array('song_id' => 'third thing');
//foreach($data as $key => $data){
//                    if(is_int($key)){
//                        //Multiple sets of data to the same table need to be inserted
//                        echo "Key is: $key <br>";
//                        echo "Data is: <br>";
//                        print_r($data);
//                    } else {
//                        echo "Key is: $key <br>";
//                        echo "Data is: <br>";
//                        print_r($data);
//                    }
//                }
//                
$k = $STH->insert(array('songs_meta' => array('song_name', 'song_desc', 'lyrics'),
                        'tags' => array('song_id', 'tags')),
                  array('songs_meta' => array('song_name' => 'tdlfkjad5st', 'song_desc' => 'dfmsdfsdfsa', 'lyrics' => 'sdfasmndkj'),
                        'tags' => array('song_id' => 'LAST_INSERT_ID()', 'tags' => 'ad,sflaskdj')), 'songs_meta', 'song_id'); 
var_dump($k->getResults());
?>