<?php

    include("mapper/GastDAO.php");
    include("model/Gast.php");
    include_once("mapper/SQLDAOFactory.php");

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

    if(isset($_POST['submit'])) {
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


        $gastDao -> create($gast);
        $reservierungDao -> create($reservierung);
        $gastDao -> read($gast);
        
    }
  
    else {
        echo "Fehler";
    }

  
   ?>