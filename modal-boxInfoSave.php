<?php

spl_autoload_register();
use mapper\GastDAO;
use model\Gast;
use mapper\SQLDAOFactory;

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

if (isset($_POST['submit'])) {
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $strasse = $_POST['strasse'];
    $hausnr = $_POST['hausnummer'];
    $zusatz = $_POST['zusatz'];
    $plz = $_POST['postleitzahl'];
    $ort = $_POST['ort'];
    $land = $_POST['land'];
    $telefon = $_POST['telefonNr'];
    $email = $_POST['emailAddy'];
    $datumVon = $_POST['datumVon'];
    $datumBis = $_POST['datumBis'];

    $gast = new Gast($anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
    $gastDao = new GastDAO();

    //Gastnr. aus der Datenbank auslesen und in die Reservierungstabelle eintragen (neue DAO?)
    $reservierung = new Reservierung($zimmernr, $gastnr, $mitarbeiternr, $datumVon, $datumBis);
    $reservierungDao = new ReservierungDAO();

   
    $gastDao->create($gast);
    $reservierungDao->create($reservierung);
    $gastDao->read($gast);

} else {
    echo "Fehler";
}


?>