<?php //GROUP
require_once('../lib/init.php');
$STH = new StatementHandler($PDO);
$t = new Template('Create Group', array('main', 'song'), 'create_group_form.php', 'Create a group in the Wellspring database!', array('view'));
require_once(Config::get('root/content') . 'template/template.php');
?>