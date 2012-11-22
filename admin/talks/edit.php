<?php

require '../prepend.php';

$query = 'SELECT * FROM talks WHERE id = ' . $_GET['id'];
$talk = Util::pikachu($query, 'select_one');

$title = 'Édition d\'un talk';
$formUrl = 'update.php';

require '../layout.php';