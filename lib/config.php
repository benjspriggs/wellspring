<?php
$GLOBALS['config'] = array(
                'session' => array(
                                'session_name' => 'user_record',
                                'token_name' => 'csrf',
                                'exittoken' => 'exittoken',
                                'db' => 'session_data',
                                'expiry' => '1 DAY'),
                'remember' => array(
                                'cookie_name' => 'key',
                                'cookie_expiry' => 608400),
                'hash' => array(
                                'pepper' => '64aasddk-0412f1db5ab1be9eb4yawehb8720'),
                'mail' => array(
                                'verify_from' => 'postmaster@digitize.com'),
                'root' => array(
                                'site' => $_SERVER['DOCUMENT_ROOT']. '/',
                                'app' => $_SERVER['DOCUMENT_ROOT']. '/lib/',
                                'uploads' => $_SERVER['DOCUMENT_ROOT']. '/uploads/'));
?>