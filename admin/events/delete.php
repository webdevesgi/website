<?php

require '../prepend.php';

if(isset($_GET) && !empty($_GET)) {
  $query = 'DELETE FROM events WHERE code = "' . $_GET['id'] . '"';

  Util::pikachu($query, 'delete');
}

header('Location: list.php');