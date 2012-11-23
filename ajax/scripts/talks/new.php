<?php

require 'config.php';

$methodAccepted = 'POST';
$parametersRequired = $config['new']['required'];

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $needEscape = $parametersRequired;
  $parameters = Util::escapeRequestParameters($needEscape, 'POST');

  $query = 'INSERT INTO talks(code, event_id, title, description, speaker) VALUES (' .
              '"' . Util::generateKey() . '",' .
              '"' . $parameters['event_id'] . '",' .
              '"' . $parameters['title'] . '",' .
              '"' . $parameters['description'] . '",' .
              '"' . $parameters['speaker'] . '"' .
            ')';
  $result = Util::pikachu($query, 'insert');
  if($result) {
    $requiredFields = $config['view']['return'];
    $query = 'SELECT ' . $requiredFields . ' FROM talks ORDER BY talks.id DESC LIMIT 0,1';
    $result = Util::pikachu($query, 'select_one');
    $result ? Util::return_json($result) : Util::return_error('Last record cannot be found.', 404);
  } else {
    Util::return_error('This request cannot be handled.', 406);
  }

}