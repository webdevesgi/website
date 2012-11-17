<?php

if(isset($_POST) && !empty($_POST)) {
  if(isset($_POST['id']) && $_POST['id'] != null) {
    // Accept request
  } else {
    return_error('"id" parameter is required');
  }
} else {
  return_error('Parameters are required.');
}

function return_error($message, $code = 500) {
  return_json(array('code' => $code, 'message' => $message));
}

function return_json($array) {
  header('Content-type: application/json');
  echo json_encode($array);
}