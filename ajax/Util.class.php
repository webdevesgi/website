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

  public static function view($suffix = '_c')
  {
    return preg_replace('/\.([^.]+)$/', $suffix . '.$1', basename($_SERVER['SCRIPT_NAME']));
  }

  public static function adminFlashNoticeHelper()
  {
    if (isset($_SESSION['success']))
    {
      echo '<div class="message success"><p>' . $_SESSION['success'] . '</p></div>';
      unset($_SESSION['success']);
    }
    if (isset($_SESSION['errors']))
    {
      echo '<div class="message errormsg"><p>' . implode('<br />', $_SESSION['errors']) . '</p></div>';
      unset($_SESSION['errors']);
    }
  }

  public static function apiMakeRequest($url, $data = null) {

    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
    curl_setopt($c, CURLOPT_URL, API_URL . $url);
    if($data !== null) {
      curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($data));
    }
    $content = curl_exec($c);
    curl_close($c);
    return json_decode($content, true);
  }

  public static function generateKey()
  {
    return self::randomString(6);
  }

  public static function randomString($len)
  {
    $base = 'abcdefghjkmnpqrstwxyz123456789';
    $max = strlen($base) - 1;
    $code = '';
    mt_srand((double)microtime() * 1000000);
    while (strlen($code) < $len)
    {
      $code .= $base{mt_rand(0,$max)};
    }

    return $code;
  }

}