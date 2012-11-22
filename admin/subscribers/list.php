<?php

require '../prepend.php';

$query = 'SELECT * FROM subscribers WHERE event_id = "' . $_GET['event_id'] . '"';
$event = Util::pikachu($query);

$title = 'Inscrits';
$requireScript = 'admin/subscribers/list';

require '../layout.php';