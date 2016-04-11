<?php

$host = '******';
$user = '******';
$password = '********';
$db_name = '*****';

if (!$link = mysql_connect($host, $user, $password)) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db($db_name, $link)) {
    echo 'Could not select database';
    exit;
}


?>