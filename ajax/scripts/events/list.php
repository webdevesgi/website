<?php

require 'config.php';

$requiredFields = $config['view']['return'];
$result = Util::pikachu('SELECT ' . $requiredFields . ' FROM events');
$result ? Util::return_json($result) : Util::return_error('This entity cannot be found.', 404);