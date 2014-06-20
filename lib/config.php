<?php
$GLOBALS['config'] = array(
                'session' => array(
                                'session_name' => 'user',
                                'token_name' => 'csrf',
                                'username' => 'username'),
                'remember' => array(
                                'cookie_name' => 'key',
                                'cookie_expiry' => 608400),
                'hash' => array(
                                'pepper' => '64a02bd7f1ab5ab1be9eb4yawehb8720'),
                'mail' => array(
                                'verify_from' => 'emailaddress@domain.com'),
                'app' => array(
                                'root' => $_SERVER['DOCUMENT_ROOT']. '/wellspring'));
?>