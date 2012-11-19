<?php

require 'config.php';

$requiredFields = $config['view']['return'];
$query = 'SELECT ' . $requiredFields . ' FROM events ORDER BY starts_at DESC LIMIT 0,1';
$event = Util::pikachu($query, 'select_one');
if($event) {
  $query = 'SELECT ' . $config['view']['talks'] . ' FROM talks WHERE event_id = "' . $event['id'] . '"';
  $talks = Util::pikachu($query);
  $event['talks'] = $talks;
  Util::return_json($event);
} else {
  Util::return_error('This entity cannot be found.', 404);
}