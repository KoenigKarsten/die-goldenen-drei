<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

use mapper\SQLDAOFactory;

spl_autoload_register();
$dbConnect = SQLDAOFactory::getInstance();

//$zimmerNr = $_POST['zimmerNr'];
$zimmerNrInput = 'D903';

$statement = $dbConnect->prepare("SELECT gast.*, reservierung.DatumVon, reservierung.DatumBis
                        FROM gast, reservierung WHERE reservierung.GastNr = gast.GastNr AND reservierung.ZimmerNr = ?");
//$statement->bind_param("s", $_POST['name']);
$statement->bind_param("s", $zimmerNrInput);
$statement->execute();
//$statement->store_result();
//$statement->bind_result($gastNr, $anrede, $vorname, $nachname, $strasse, $hausNr, $zusatz, $plz, $ort, $land, $telefon, $email, $datumVon, $datumBis);
//
$statement->execute();
$res = $statement->get_result();
echo json_encode($res->fetch_all(MYSQLI_ASSOC));



?>