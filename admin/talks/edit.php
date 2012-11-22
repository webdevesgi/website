<?php

require '../prepend.php';

$talk = Util::apiMakeRequest('talks/show.php?id=' . $_GET['id']);

$title = 'Édition d\'un talk';
$formUrl = 'update.php';

require '../layout.php';