<?php

require '../prepend.php';

$query = 'SELECT * FROM subscribers WHERE event_id = "' . $_GET['event_id'] . '"';
$event = Util::pikachu($query);

$title = 'Inscrits';
$requireScript = 'admin/subscribers/list';
$requireParams = array('event_id' => $_GET['event_id']);

require '../layout.php';