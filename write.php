<?php
require_once('lib/init.php');
$t = new Template('Write', array('main', 'write'), 'write_form.php', array('formcheck'));
require_once(Config::get('root/content') . 'template/template.php');
?>