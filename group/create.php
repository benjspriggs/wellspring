<?php //GROUP
require_once('../lib/init');
$STH = new StatementHandler($PDO);
$t = new Template('Create Group', array('main', 'form'), 'create_group_form', 'Create a group in the Wellspring database!', array('view'));
require_once(Config::get('root/content') . 'template/template');
?>