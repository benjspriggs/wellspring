<?php
require_once('lib/init');
$t = new Template('Listen', array('main', 'listen'), 'listen_content', 'All of the songs in the Wellspring database.', array('clicky'));
require_once('lib/content/template/template');
?>