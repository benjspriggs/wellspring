<?php
require_once('lib/init.php');
$t = new Template('Listen', array('main', 'listen'), 'listen_content.php', array('listen'));
require_once('template/template.php');
?>