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
$requireScript = 'admin/events/edit/new';

require '../layout.php';