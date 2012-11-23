<?php

require 'config.php';

$methodAccepted = 'GET';
$parametersRequired = array();

if(!Util::isRequestValid($methodAccepted, $parametersRequired))
  Util::return_error('Invalid request parameters.');
else {

  $requiredFields = $config['view']['return'];

  $query = 'SELECT ' . $requiredFields . ' FROM ideas ORDER BY ideas.id DESC';
  $result = Util::pikachu($query);

  $result ? Util::return_json($result) : Util::return_error('This entity cannot be found.', 404);

}