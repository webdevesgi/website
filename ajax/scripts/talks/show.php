<?php

require 'config.php';

$methodAccepted = 'GET';
$parametersRequired = $config['show']['required'];

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $needEscape = $parametersRequired;
  $parameters = array_merge($_GET, Util::escapeRequestParameters($needEscape, 'GET'));

  $requiredFields = $config['view']['return'];
  $result = Util::pikachu(
    'SELECT ' . $requiredFields . ' FROM talks WHERE id = ' . $parameters['id'], 'select_one'
  );

  $result ? Util::return_json($result) : Util::return_error('This entity cannot be found.', 404);

}