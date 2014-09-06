<?php
require_once('lib/init.php');
$t = new Template('Write', array('main', 'write'), 'write_form.php', 'Upload a song to the Wellspring database!', array('formcheck'));
require_once(Config::get('root/content') . 'template/template.php');
?>