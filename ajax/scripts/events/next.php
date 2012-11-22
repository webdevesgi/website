<?php

require 'config.php';

$requiredFields = $config['view']['return'];
$query = 'SELECT ' . $requiredFields . ' FROM events ORDER BY starts_at DESC LIMIT 0,1';
$event = Util::pikachu($query, 'select_one');
if($event) {
  // Talks
  $query = 'SELECT ' . $config['view']['talks'] . ' FROM talks WHERE event_id = "' . $event['id'] . '"';
  $talks = Util::pikachu($query);

  $event['talks'] = Util::apiMakeRequest('talks/list.php?event_id=' . $event['id']);

  // Subscribers
  $query = 'SELECT ' . $config['view']['subscribers'] . ' FROM subscribers WHERE event_id = "' . $event['id'] . '"';
  $subscribers = Util::pikachu($query);
  $event['subscribers'] = $subscribers;

  Util::return_json($event);
} else {
  Util::return_error('This entity cannot be found.', 404);
}