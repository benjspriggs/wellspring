<?php
$GLOBALS['config'] = array(
                'session' => array(
                                'session_name' => 'user_record',
                                'token_name' => 'csrf',
                                'exittoken' => 'exittoken',
                                'db' => 'session_data',
                                'expiry' => '5 HOUR'),
                'remember' => array(
                                'cookie_name' => 'key',
                                'cookie_expiry' => 608400),
                'hash' => array(
                                'pepper' => '64aasddk-0412f1db5ab1be9eb4yawehb8720'),
                'mail' => array(
                                'verify_from' => 'postmaster@wellspring.com'),
                'root' => array(
                                'content' => $_SERVER['DOCUMENT_ROOT']. '/wellspring/lib/content/',
                                'lib' => $_SERVER['DOCUMENT_ROOT']. '/wellspring/lib/',
                                'uploads' => $_SERVER['DOCUMENT_ROOT']. '/wellspring/uploads/'),
                'root_link' => array(
                                'site' => '//' .$_SERVER['SERVER_NAME']. '/wellspring/',
                                'content' => '//' .$_SERVER['SERVER_NAME']. '/wellspring/lib/content/'),
                'tables' => array(
                                'content' => array('songs_meta', 'media', 'tags', 'embeds', 'groups', 'groups_lookup'),
                                'internal' => array('users', 'session_data')
                                ));
?>