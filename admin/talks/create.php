<?php

require '../prepend.php';

if(isset($_POST) && !empty($_POST)) {
  $query = 'INSERT INTO talks(event_id, title, description, speaker) VALUES (' .
    '"' . $_POST['talk']['event_id'] . '",' .
    '"' . addslashes($_POST['talk']['title']) . '",' .
    '"' . addslashes($_POST['talk']['description']) . '",' .
    '"' . addslashes($_POST['talk']['speaker']) . '"' .
  ')';

  Util::pikachu($query, 'insert');
}

header('Location: list.php?event_id=' . $_POST['talk']['event_id']);