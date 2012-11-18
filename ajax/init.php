<?php

require_once 'config/db_secret.php';

$db_connection = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
$db_selected = mysql_select_db(DB_DBNAME);
$db_charset = mysql_set_charset('utf8', $db_connection);

require_once 'Util.class.php';