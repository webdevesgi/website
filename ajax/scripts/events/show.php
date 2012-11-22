<?php

require 'config.php';

$methodAccepted = 'GET';
$parametersRequired = $config['show']['required'];

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $needEscape = array('id');
  $parameters = Util::reverseIdCode(
                  array_merge($_GET, Util::escapeRequestParameters($needEscape, 'GET')));

  $requiredFields = $config['view']['return'];
  $result = Util::pikachu(
              'SELECT ' . $requiredFields . ' FROM events WHERE code = "' . $parameters['code'] . '"',
              'select_one');

  // Talks
  $query = 'SELECT ' . $config['view']['talks'] . ' FROM talks WHERE event_id = "' . $parameters['code'] . '"';
  $talks = Util::pikachu($query);
  $result['talks'] = $talks;

  // Subscribers
  $query = 'SELECT ' . $config['view']['subscribers'] . ' FROM subscribers WHERE event_id = "' . $parameters['code'] . '"';
  $subscribers = Util::pikachu($query);
  $result['subscribers'] = $subscribers;

  $result ? Util::return_json($result) : Util::return_error('This entity cannot be found.', 404);

}