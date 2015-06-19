<?php

$host ='localhost';
$user = 'root';
$pwd = '';
$db = 'program';

$sql = mysql_connect($host, $user, $pwd);
mysql_select_db($db,$sql);
