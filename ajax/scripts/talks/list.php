<?php

require 'config.php';

$methodAccepted = 'GET';
$parametersRequired = $config['list']['required'];

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $needEscape = $parametersRequired;
  $parameters = array_merge($_GET, Util::escapeRequestParameters($needEscape, $methodAccepted));
  $requiredFields = $config['view']['return'];

  $query = 'SELECT ' . $requiredFields . ' FROM talks WHERE event_id = "' . $parameters['event_id'] . '"';
  $result = Util::pikachu($query);

  $result ? Util::return_json($result) : Util::return_error('This entity cannot be found.', 404);

}