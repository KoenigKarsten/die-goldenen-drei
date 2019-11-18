<?php

    include("mapper/GastDAO.php");
    include("model/Gast.php");
    include("mapper/ReservierungDAO.php");
    include("model/Reservierung.php");
    include_once("mapper/SQLDAOFactory.php");

    $anrede     = "";
    $vorname    = "";
    $nachname   = "";
    $strasse    = "";
    $hausnr     = "";
    $plz        = "";
    $ort        = "";
    $land       = "";
    $zusatz     = "";
    $telefon    = "";
    $email      = "";
    $datumVon   = "";
    $datumBis   = "";

    if(isset($_POST['submit'])) {
        $anrede     = $_POST['anrede'];
        $vorname    = $_POST['vorname'];
        $nachname   = $_POST['nachname'];
        $strasse    = $_POST['strasse'];
        $hausnr     = $_POST['hausnummer'];
        $plz        = $_POST['postleitzahl'];
        $ort        = $_POST['ort'];
        $land       = $_POST['land'];
        $zusatz     = $_POST['zusatz'];
        $telefon    = $_POST['telefonNr'];
        $email      = $_POST['emailAddy'];
        $datumVon   = $_POST['datumVon'];
        $datumBis   = $_POST['datumBis'];

        $gast = new Gast($anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
        $gastDao = new GastDAO();
        $reservierung = new Reservierung($zimmernr, $gastnr, $mitarbeiternr, $datumVon, $datumBis);
        $reservierungDao  = new ReservierungDAO();


        $gastDao -> create($gast);
        $reservierungDao -> create($reservierung);
        $gastDao -> read($gast);

        
        
    }
  
    else {
        echo "Fehler";
    }

  
   ?>