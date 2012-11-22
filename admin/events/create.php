<?php

require '../prepend.php';

if(isset($_POST) && !empty($_POST)) {
  $query = 'INSERT INTO events(code, title, description, starts_at, ends_at, created_at, updated_at) VALUES (' .
    '"' . Util::generateKey() . '",' .
    '"' . addslashes($_POST['event']['title']) . '",' .
    '"' . addslashes($_POST['event']['description']) . '",' .
    '"' . $_POST['event']['starts_at']['date'] . ' ' . $_POST['event']['starts_at']['time'] . '",' .
    '"' . $_POST['event']['ends_at']['date'] . ' ' . $_POST['event']['ends_at']['time'] . '",' .
    'NOW(),' .
    'NOW())';

  Util::pikachu($query, 'insert');
}

header('Location: list.php');