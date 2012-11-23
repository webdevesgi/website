<?php

require '../prepend.php';

$talk = array(
  'title' => '',
  'description' => '',
  'speaker' => ''
);

$title = 'Création d\'un talk';
$requireScript = 'admin/talks/new';
$requireParams = array('formUrl' => 'talks/new.php', 'eventId' => $_GET['event_id']);

require '../layout.php';