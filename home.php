<?php
require_once('lib/init');
$t = new Template('Home', array('main'), 'home.html', 'Welcome to the home page of Wellspring!');
require_once(Config::get('root/content') . 'template/template');
?>