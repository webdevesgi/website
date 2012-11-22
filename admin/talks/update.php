<?php

require '../prepend.php';

if(isset($_POST) && !empty($_POST)) {
  $query = 'UPDATE talks SET ' .
    'title = "' . addslashes($_POST['talk']['title']) . '",' .
    'description = "' . addslashes($_POST['talk']['description']) . '",' .
    'speaker = "' . $_POST['talk']['speaker'] . '" ' .
  'WHERE code = "' . $_POST['talk']['id'] . '"';

  Util::pikachu($query, 'update');
}

header('Location: list.php?event_id=' . $_POST['talk']['event_id']);