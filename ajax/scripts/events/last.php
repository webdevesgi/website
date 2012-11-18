<?php

require 'config.php';

$requiredFields = $config['view']['return'];
$query = 'SELECT ' . $requiredFields . ' FROM events ORDER BY starts_at DESC LIMIT 0,1';
$result = Util::pikachu($query, 'select_one');
$result ? Util::return_json($result) : Util::return_error('This entity cannot be found.', 404);