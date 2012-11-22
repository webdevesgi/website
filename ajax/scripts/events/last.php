<?php

require 'config.php';

$requiredFields = $config['view']['return'];
$query = 'SELECT ' . $requiredFields . ' FROM events ORDER BY starts_at DESC LIMIT 0,1';
$event = Util::pikachu($query, 'select_one');
if($event) {
  // Talks
  $query = 'SELECT ' . $config['view']['talks'] . ' FROM talks WHERE event_id = "' . $event['id'] . '"';
  $talks = Util::pikachu($query);

  $c = curl_init();
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
  curl_setopt($c, CURLOPT_URL, 'http://wde/ajax/scripts/talks/list.php?event_id=e00001');

  $content = curl_exec($c);
  curl_close($c);

  $event['talks'] = Util::apiMakeRequest('talks/list.php?event_id=e00001');

  // Subscribers
  $query = 'SELECT ' . $config['view']['subscribers'] . ' FROM subscribers WHERE event_id = "' . $event['id'] . '"';
  $subscribers = Util::pikachu($query);
  $event['subscribers'] = $subscribers;

  Util::return_json($event);
} else {
  Util::return_error('This entity cannot be found.', 404);
}