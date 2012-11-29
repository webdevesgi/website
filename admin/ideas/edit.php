<?php

require '../prepend.php';

$title = 'Édition d\'une proposition';
$requireScript = 'admin/ideas/edit';
$requireParams = array(
  'formUrl' => 'ideas/update.php',
  'ideaId'  => $_GET['id']
);

require '../layout.php';