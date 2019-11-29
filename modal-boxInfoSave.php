<?php

require_once('mapper/ReservierungDAO.php');
require_once("mapper/GastDAO.php");
require_once('model/Gast.php');
require_once('model/Reservierung.php');

use mapper\GastDAO;
use model\Gast;
use model\Reservierung;

$anrede = "";
$vorname = "";
$nachname = "";
$strasse = "";
$hausnr = "";
$zusatz = "";
$plz = "";
$ort = "";
$land = "";
$telefon = "";
$email = "";
$datumVon = "";
$datumBis ="";
$gastNr = "";

if (isset($_POST['submit'])) {
    $zimmerNr = $_POST['submit'];
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $strasse = $_POST['strasse'];
    $hausnr = $_POST['hausnummer'];
    $plz = $_POST['postleitzahl'];
    $ort = $_POST['ort'];
    $land = $_POST['land'];
    $telefon = $_POST['telefonNr'];
    $email = $_POST['emailAddy'];
    $datumVon = $_POST['DatumVon'];
    $datumBis = $_POST['DatumBis'];
    var_dump($datumVon);
    var_dump($datumBis);


    $gast = new Gast($anrede, $vorname, $nachname, $strasse, $hausnr,  $plz, $ort, $land, $telefon, $email);
    $gastDao = new GastDAO();
    $reservierung = new Reservierung($zimmerNr, $gastNr, $datumVon, $datumBis);

    $objGastDao1 = $gastDao->create($gast, $zimmerNr,$datumVon, $datumBis);

} else {
    echo "Fehler";
}


?>