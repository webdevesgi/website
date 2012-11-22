<?php

require '../prepend.php';

if(isset($_POST) && !empty($_POST)) {
  $query = 'UPDATE events SET ' .
    'title = "' . addslashes($_POST['event']['title']) . '",' .
    'description = "' . addslashes($_POST['event']['description']) . '",' .
    'starts_at = "' . $_POST['event']['starts_at']['date'] . ' ' . $_POST['event']['starts_at']['time'] . '",' .
    'ends_at = "' . $_POST['event']['ends_at']['date'] . ' ' . $_POST['event']['ends_at']['time'] . '",' .
    'updated_at = NOW() ' .
  'WHERE code = "' . $_POST['event']['id'] . '"';

  Util::pikachu($query, 'update');
}

header('Location: list.php');