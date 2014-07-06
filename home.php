<?php
require_once('lib/init.php');
$t = new Template('Home', array('main'), 'home.html');
require_once(Config::get('root/content') . 'template/template.php');
?>