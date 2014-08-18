<?php
require_once('lib/init.php');
$t = new Template('Listen', array('main', 'listen'), 'listen_content.php', 'All of the songs in the Wellspring database.', array('listen'));
require_once('lib/content/template/template.php');
?>