<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

use mapper\SQLDAOFactory;

spl_autoload_register();

$user = check_user();
$dbConnect = SQLDAOFactory::getInstance();

if(isset($_POST["gebaeude"])){
    $varGebaeude = $_POST["gebaeude"];
}if(isset($_POST["etage"])){
    $varEtage = $_POST["etage"];
}


$varGebaeude = isset($_POST['gebaeude']) ? $_POST['gebaeude'] : 'B';
$varEtage = isset($_POST['etage']) ? $_POST['etage'] : 0;


$sql = "SELECT ZimmerNr, Status FROM zimmer WHERE Gebaeude=? AND Etage=?";

if($preStmt = $dbConnect->prepare($sql)){
        $preStmt->bind_param("ss", $varGebaeude, $varEtage);
        $preStmt->execute();
        $res = $preStmt->get_result();
        echo json_encode($res->fetch_all(MYSQLI_ASSOC));
}



?> 