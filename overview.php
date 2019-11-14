<!DOCTYPE html>
<html lang="en" style="overflow: hidden;">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet-mainpage.css">
    
    <title>Raum-Buchungsplan</title>
  </head>
  <body>
  <?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
?>

<div class='overviewMainpage'>

    <div class='container'>
      <div id='polygon_1'></div>
      <p>
        <a class="btn btn-primary btn-sm"  role="button">Zeige barrierefrei</a>
        <a class="btn btn-primary btn-sm"  role="button">Zeige WC-Intern </a>
      </p>
    </div>
    
    <div class="modal"></div>
    
    <!-- <p><a class="btn btn-primary btn-sm"  role="button">Zeige barrierefrei</a></p>
    <p><a class="btn btn-primary btn-sm"  role="button">Zeige WC-Intern </a></p> -->
      <!-- <div class='buttons'>
        <button>Zeige Behindertengerecht</button>
        <button>Zeige WC-Intern</button>
      </div> -->
  </div>
    
  <script src="js/svg.min.js"></script>
  <script src="js/draw-svg.js"></script>
  <!-- <script src="js/"></script> -->
  <script src="js/mainpage-scripts.js"></script>
  <!-- <script src="js/modal-box-script.js"></script> -->
<?php 
include("templates/footer.inc.php")
?>

  </body>
  </html>

