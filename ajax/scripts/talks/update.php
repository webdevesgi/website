<?php

require 'config.php';

$methodAccepted = 'POST';
$parametersRequired = $config['update']['required'];

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $needEscape = $parametersRequired;
  $parameters = Util::reverseIdCode(
                  array_merge($_GET, Util::escapeRequestParameters($needEscape, 'POST')));

  $query = 'UPDATE talks SET ' .
              'title = "' . $parameters['title'] . '",' .
              'description = "' . $parameters['description'] . '",' .
              'speaker = "' . $parameters['speaker'] . '" ' .
            'WHERE code = "' . $parameters['code'] . '"';

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