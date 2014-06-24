<?php
require_once('../lib/init.php');
$t = new Template('Edit Song', array('main', 'form', 'edit'), 'edit_song_form.php', array('edit'));
require_once(Config::get('root/content') . 'template/template.php');
?>