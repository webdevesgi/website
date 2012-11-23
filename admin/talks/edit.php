<?php

require '../prepend.php';

$title = 'Édition d\'un talk';
$requireScript = 'admin/talks/edit';
$requireParams = array(
  'formUrl' => 'talks/update.php',
  'eventId' => $_GET['event_id'],
  'talkId'  => $_GET['id']
);

require '../layout.php';