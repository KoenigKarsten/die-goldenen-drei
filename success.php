<?php
include_once("modal-boxInfoSave.php");
include_once("mapper/GastDAO.php");

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

$gast = array($anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
$gastDao = new GastDAO();
$gastDao->read($gast);

$result = $dbConnect->query($sql);

$i = 0;

while ($row = $result->fetch_array(MSQLI_NUM)) {
    $vorname[$i] = $row[0];
    $nachname[$i] = $row[1];
    echo $vorname, $nachname;
    $i++;
}

$result->free();


?>