<?php

require '../prepend.php';

$query = 'SELECT * FROM events WHERE code = "' . $_GET['id'] . '"';
$event = Util::pikachu($query, 'select_one');

$title = 'Édition d\'un évènement';
$requireScript = 'admin/events/edit';

require '../layout.php';