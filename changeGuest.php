<?php

session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();

if (isset($_GET['changeGuest'])) {
    $statement = $pdo->prepare("DELETE FROM gast WHERE GastNr = ?");
    $statement->bindParam(1,$_GET['changeGuest']); 
    $result = $statement->execute(); 
}



?>