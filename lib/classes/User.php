<?php
class User {
    protected $loggedin = FALSE,
                $PDO,
                $STH;
    private $_userid,
            $_username,
            $_password,
            $_errors = array();
    
    public function __construct (StatementHandler $STH){
        $this->STH = $STH;
        $this->PDO = $STH->getConnection();
    }
    
    private function getDBHash($id){
        $dbhash = $this->STH->get('session_data',
                                  array('token'),
                                  array('user_id' => $id),
                                  array('user_id', '=', ':user_id'))->getResults();
        if (isset($dbhash[0]['token'])){
            return $dbhash[0]['token'];
        } else {
            return NULL;
        }
    }
    
    public function clearErrors(){
        $this->_errors = array();
    }
    
    public function hasErrors(){
        if (!empty($this->_errors)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getErrors(){
        if (!empty($this->_errors)){
            foreach($this->_errors as $errorkey => $text){
                echo $text ."<br>";
            }
        } else {
            return NULL;
        }
    }
    
    public function getUsername($id){
        $this->clearErrors();
        $STH = $this->STH;
        $results = $STH->get('users', array('username'), array('user_id' => $id), array('user_id', '=', ':user_id'))->getResults();
        if (!empty($results)){
            $username = $results[0]['username'];
            return $username;
        } else {
            return NULL;
        }
    }
    
    ##Formal check to see if a user is logged in
    public function isLoggedIn($userid){
        $this->clearErrors();
        $STH = $this->STH;
        $dbhash = $this->getDBHash($userid); //Session data
        $username = $this->getUsername($userid);
        if ($username != NULL){
            if ($dbhash != NULL){
                $token = Session::get(Config::get('session/session_name'));
                if ($token == $dbhash){
                    if (Hash::encode($username, $token) == Cookie::get(Config::get('remember/cookie_name'))){
                        //The user is logged in and remembered
                        return 3;
                    }
                    //The user is logged in successfully
                    return 2;
                } else {
                    $this->_errors[] = "The record exists but the session data does not match. Possibly logged in on another browser.";
                    return 1.5;
                }
            } else {
                //Session data has not been created, and the user has not logged in anywhere else
                return 1;
            }
            
        } else {
            $this->_errors[] = "That user does not exist.";
            return 0;
        }
    }
    
    public function isAccepted($userid){
        $this->clearErrors();
        $STH = $this->STH;
        $res = $STH->get('users', array('is_accepted'), array('user_id' => $userid), array('user_id', '=', ':user_id'))->getResults();
        if ($res[0]['is_accepted'] == 1){
            return TRUE;
        } elseif ($res[0]['is_accepted'] == 0) {
            return FALSE;
        } else {
            return FALSE;
        }
    }
    
    public function isVerified($userid){
        $this->clearErrors();
        $STH = $this->STH;
        $res = $STH->get('users', array('is_verified'), array('user_id' => $userid), array('user_id', '=', ':user_id'))->getResults();
        if ($res[0]['is_verified'] == 1){
            return TRUE;
        } elseif ($res[0]['is_verified'] == 0) {
            return FALSE;
        } else {
            return FALSE;
        }
    }
    
    public function isAdmin($userid){
        $this->clearErrors();
        $STH = $this->STH;
        $res = $STH->get('users', array('is_admin'), array('user_id' => $userid), array('user_id', '=', ':user_id'))->getResults();
        if ($res[0]['is_admin'] == 1){
            return TRUE;
        } elseif ($res[0]['is_admin'] == 0) {
            return FALSE;
        } else {
            return FALSE;
        }
    }
    
    //public function status($userid, $condition){
    //    $this->clearErrors();
    //    $STH = $this->STH;
    //    $res = $STH->get('users', array('is_'. $condition), array('user_id' => $userid), array('user_id', '=', ':user_id'))->getResults();
    //    if ($res[0]['is_'.$condition] == 1){
    //        return TRUE;
    //    } elseif ($res[0]['is_'. $condition] == 0) {
    //        return FALSE;
    //    } else {
    //        return FALSE;
    //    }
    //}
    
    public function getUserID($username){
        $this->clearErrors();
        $STH = $this->STH;
        $results = $STH->get('users', array('user_id'), array('username' => $username), array('username', '=', ':username'))->getResults();
        if (!empty($results)){
            $userid = $results[0]['user_id'];
            return $userid;
        } else {
            return NULL;
        }
    }
    
    public function getUserInfo($user){
        $this->clearErrors();
        $STH = $this->STH;
        if (is_string(intval($user))){
            $user_id = $this->getUserID($user);
            $results = $STH->get('users', '*', array('user_id' => $user_id), array('user_id', '=', ':user_id'))->getResults();
            return $results[0];
        } elseif (is_numeric($user)){
            $results = $STH->get('users', '*', array('user_id' => $user), array('user_id', '=', ':user_id'))->getResults();
            return $results[0];
        } else {
            $this->errors[] = "The provided user information did not match the types required.";
            return $this;
        }
    }
    
    ##Lists all rows in database with records attributed to a user_id
    public function attribute($user_id, $table){
        $this->clearErrors();
        $STH = $this->STH;
        $values = array(':user_id' => $user_id);
        $where = array('user_id', '=', ':user_id');
        $results = $STH->get($table, 'user_id', $values, $where)->getResults();
        return $results;
    }
    
    public function logIn($username, $password, $remember = FALSE){
        $this->clearErrors();
        $loggedin = $this->isLoggedIn($this->getUserID($username));
        if ($loggedin == 1){
            $PDO = $this->PDO;
            $STH = $this->STH;
            //Validate the information, make sure it's an actual user in the database (password is hashed already)
            $validate = new Validate($STH);
            $source = array('username' => $username, 'password' => $password);
            $items = array('username' => array(
                                'required' => true,
                                'exists' => 'users'),
                            'password' => array(
                                'required' => true));
            $validate->check($source, $items);
            $dbres = $STH->get('users', array('pass', 'salt'), array('username' => $username), array('username', '=', ':username'))->getResults();
            $dbhash = $dbres[0]['pass'];
            $salt = $dbres[0]['salt'];
            if ($validate->passed()){
                if ($dbhash == $password){
                    $this->loggedin = TRUE;
                    $token = Token::generate();
                    $user_id = $this->getUserID($username);
                    Session::put(Config::get('session/session_name'), $token);
                    Session::put('username', $username);
                    Session::put('uid', $user_id);
                    $STH->insert('session_data', array('user_id' => $user_id, 'token' => $token));
                    
                    if ($remember){
                        $cookie = Hash::encode($username, $token);
                        Cookie::create(Config::get('remember/cookie_name'), $cookie);
                        Cookie::create('id', $user_id);
                    }
                    
                    return $this;
                } else {
                    $this->_errors[] = "The hashes did not match.";
                }
            } else {
                $this->_errors[] = "The information passed was not valid.";
                return $this;
            }
        } else {
            return $this;
        }
    }
    
    public function logOut($id){
        $this->clearErrors();
        $STH = $this->STH;
        switch($this->isLoggedIn($id)){
            case(3):
                Cookie::destroy(Config::get('remember/cookie_name'));
                Cookie::destroy('id');
            case(2):
                //BLOW IT UP DOOD
                Session::destroy(Config::get('session/session_name'));
                Session::destroy('username');
                $STH->delete('session_data',
                             array('token' => $this->getDBHash($id)), array('token', '=', ':token'));
                break;
            case(1):
                $this->_errors[] = "The user is not logged in.";
                return $this;
                break;
            case(0):
                $this->_errors[] = "User ID $id does not exist in the database.";
                return $this;
                break;
        }
    }
    
    public function registerUser($username, $password, $email, $remember = FALSE, $is_admin = FALSE){
        $this->clearErrors();
        $STH = $this->STH;
        //Validate the input: is everything there and accounted for?
        //Everything unique?
        $validate = new Validate($STH);
        $source = array('username' => $username, 'password' => $password, 'email' => $email);
        $items = array('username' => array(
                            'required' => true,
                            'min' => 2,
                            'max' => 20,
                            'unique' => 'users'),
                        'password' => array(
                            'required' => true,
                            'min' => 6),
                        'email' => array(
                            'required' => true,
                            'unique' => 'users',
                            'is_email' => true));
        $validate->check($source, $items);
        if ($validate->passed()){
            //If so, insert data
            if ($is_admin){
                $is_admin = 1;
            } else {
                $is_admin = 0;
            }
            $usersalt = Token::generate();
            $password = Hash::encode($password, $usersalt);
            $token = Hash::encode($email, $usersalt);
            $q = $STH->insert('users', array('username' => $username,
                                        'pass' => $password,
                                        'email' => $email,
                                        'salt' => $usersalt,
                                        'is_verified' => 0,
                                        'is_accepted' => 1,
                                        'is_admin' => $is_admin));
            if ($q->lastCount() == 0){
                $this->_errors[] = 'There was an error sending the data to the database.';
                return $this;
            }
            //Send email with a token composed of that user's email and their salt into an md5()
            Mail::verify($email, $token);
            //Log in the user with limited permissions
            $this->logIn($username, $password, $remember);
            //Return $this
            return $this;
        } else {
            //If not, send error
            $this->_errors[] = 'The information given was not valid.';
            $validate->errors();
            return $this;
        }
    }
    
    public function deleteUser($id){
        $this->clearErrors();
        $STH = $this->STH;
        foreach(Config::get('tables/content') as $index => $table){
            //Update all the places with user_id, and set it to 0
            $STH->update($table, array('user_id'), array('user_id' => 0), array('user_id', '=', $id));
        }
        $email = $STH->get('users', array('email'), array(':user_id' => $id), array('user_id', '=', ':user_id'))->getResults();
        $email = $email[0]['email'];
        $STH->delete('users', array(':user_id' => $id), array('user_id', '=', ':user_id'));
        $STH->getErrors();
        Mail::notice($email, 'deleteUser');
        return $this;
    }
    
    public function updateUser($user_id, $info){
        $this->clearErrors();
        $STH = $this->STH;
        $fields = array();
        if (array_key_exists('username', $info)){
            $fields[] = 'username';
        }
        if (array_key_exists('password', $info)){
            $fields[] = 'password';
        }
        if (array_key_exists('email', $info)){
            $fields[] = 'email';
        }
        $STH->update('users', $fields, $info, array('user_id', '=', $user_id));
        $STH->getErrors();
        return $this;
    }
}
?>