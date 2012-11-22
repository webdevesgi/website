<?php

require '../prepend.php';

if(isset($_GET) && !empty($_GET)) {
  $query = 'DELETE FROM subscribers WHERE id = ' . $_GET['id'];
  Util::pikachu($query, 'delete');
  header('Location: list.php?event_id=' . $_GET['event_id']);
} else {
  header('Location: ../subscribers/list.php');
}