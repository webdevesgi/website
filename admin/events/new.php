<?php

require '../prepend.php';

$event = array(
  'title' => '',
  'description' => '',
  'starts_at' => '',
  'ends_at' => ''
);

$title = 'Création d\'un évènement';
$formUrl = 'create.php';
$requireScript = 'admin/events/new';

require '../layout.php';