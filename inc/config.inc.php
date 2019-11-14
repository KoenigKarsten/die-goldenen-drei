<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'hi';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

?>