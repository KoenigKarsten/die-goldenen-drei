<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

use mapper\SQLDAOFactory;

spl_autoload_register();
$dbConnect = SQLDAOFactory::getInstance();

$zimmerNrInput = $_POST['zimmerNr'];



$statement = $dbConnect->prepare("SELECT gast.*, reservierung.DatumVon, reservierung.DatumBis
                        FROM gast, reservierung WHERE reservierung.GastNr = gast.GastNr AND reservierung.ZimmerNr = ?");

$statement->bind_param("s", $zimmerNrInput);
$statement->execute();
$res = $statement->get_result();
echo json_encode($res->fetch_assoc());



?>