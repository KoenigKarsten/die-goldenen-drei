<?php

$db_host = '192.168.101.163';
$db_user = 'root';
$db_password = '';
$db_name = 'test';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

?>