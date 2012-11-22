<?php

require '../prepend.php';

$query = 'SELECT * FROM talks WHERE event_id = "' . $_GET['event_id'] . '"';
$event = Util::pikachu($query);

$title = 'Programme';
$requireScript = 'admin/talks/list';

require '../layout.php';