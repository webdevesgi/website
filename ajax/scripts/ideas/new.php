<?php

require 'config.php';

$methodAccepted = 'POST';
$parametersRequired = $config['new']['required'];

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $needEscape = $parametersRequired;
  $parameters = Util::escapeRequestParameters($needEscape, 'POST');

  $query = 'INSERT INTO ideas(code, title, description, type, email, firstname, lastname) VALUES (' .
              '"' . Util::generateKey() . '",' .
              '"' . $parameters['title'] . '",' .
              '"' . $parameters['description'] . '",' .
              '"' . $parameters['type'] . '",' .
              '"' . $parameters['email'] . '",' .
              '"' . $parameters['firstname'] . '",' .
              '"' . $parameters['lastname'] . '"' .
            ')';
  $result = Util::pikachu($query, 'insert');
  if($result) {
    $requiredFields = $config['view']['return'];
    $query = 'SELECT ' . $requiredFields . ' FROM ideas ORDER BY ideas.id DESC LIMIT 0,1';
    $result = Util::pikachu($query, 'select_one');
    $result ? Util::return_json($result) : Util::return_error('Last record cannot be found.', 404);
  } else {
    Util::return_error('This request cannot be handled.', 406);
  }

}