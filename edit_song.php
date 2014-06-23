<?php
require_once('lib/init.php');
$t = new Template('Edit Song', array('main', 'form', 'edit'), 'edit_song_form.php', array('edit'));
require_once('template/template.php');
?>