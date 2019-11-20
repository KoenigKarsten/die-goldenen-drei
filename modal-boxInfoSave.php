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
$plz = "";
$ort = "";
$land = "";
$zusatz = "";
$telefon = "";
$email = "";

if (isset($_POST['submit'])) {
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $strasse = $_POST['strasse'];
    $hausnr = $_POST['hausnummer'];
    $plz = $_POST['postleitzahl'];
    $ort = $_POST['ort'];
    $land = $_POST['land'];
    $zusatz = $_POST['zusatz'];
    $telefon = $_POST['telefonNr'];
    $email = $_POST['emailAddy'];

    $gast = new Gast($anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
    $gastDao = new GastDAO();

    //Gastnr. aus der Datenbank auslesen und in die Reservierungstabelle eintragen (neue DAO?)
    $reservierung = new Reservierung();
    $reservierungDao = new ReservierungDAO();

    var_dump($gast);
    $gastDao->create($gast);
    $reservierungDao->create($reservierung);
    $gastDao->read($gast);

} else {
    echo "Fehler";
}


?>