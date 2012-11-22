<?php

require '../prepend.php';

$title = 'Programme';
$requireScript = 'admin/talks/list';
$requireParams = array('event_id' => $_GET['event_id']);

require '../layout.php';