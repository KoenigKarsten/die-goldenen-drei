<?php

    include("mapper/GastDAO.php");
    include("model/Gast.php");
    include_once("inc/config.inc.php");
    include_once("mapper/SQLDAOFactory.php");

    // use mapper\GastDAO;
    // spl_autoload_register();

    $anrede = null;
    $vorname = "";
    $nachname = null;
    $strasse = null;
    $hausnr = null;
    $plz = null;
    $ort = null;
    $land = null;
    $zusatz = null;
    $telefon = null;
    $email = null;

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
        
        $gast = new Gast($vorname);
        $gastDao = new GastDAO();
        $gastDao -> create($gast);
    
    }
  
    else {
        echo "Fehler";
    }
    // $gastDao -> create('gastNr', $anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
  
   ?>