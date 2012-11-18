<?php

class Util {

  public static function return_error($message, $code = 500) {
    self::return_json(array('error' => $code, 'message' => $message));
  }

  public static function return_json($array) {
    header('Content-type: application/json');
    echo json_encode($array);
  }

  public static function isRequestValid($methodAccepted, $parametersRequired) {
    $result = true;
    $method = $methodAccepted === 'GET' ? $_GET : $_POST;
    foreach($parametersRequired as $param)
      if(!isset($method[$param]) || $method[$param] === null || $method[$param] === '') $result = false;
    return $result;
  }

  public static function escapeRequestParameters($requestParams, $method) {
    $method = $method === 'GET' ? $_GET : $_POST;
    $result = array();
    foreach($requestParams as $param)
      $result[$param] = mysql_real_escape_string($method[$param]);
    return $result;
  }

  public static function pikachu($query, $case = 'select_several') {
    $execute = mysql_query($query);

    switch($case)
    {
      case 'select_one':
        return mysql_fetch_assoc($execute);
        break;
      case 'select_several':
        $finalArray = array();
        while($result = mysql_fetch_assoc($execute))
        {
          $finalArray[] = $result;
        }
        return $finalArray;
        break;
      case 'insert':
        return $execute;
        break;
      case 'update':
        return $execute;
      break;
      case 'delete':
        return $execute;
        break;
      default:
        return 'error';
    }
  }

  public static function reverseIdCode($arr) {
    $arr['code'] = $arr['id'];
    unset($arr['id']);
    return $arr;
  }

}