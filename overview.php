<?php

if (!isset($_SESSION)) { session_start(); }

require_once("inc/config.php.inc");
require_once("inc/functions.php");
include_once("mapper/SQLDAOFactory.php");
include_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
//Mit der If-Abfrage überprüfen ob der User Adminrechte hat und entsprechend den Adminheader miteinbinden
$user = check_user();
?>


<div class="mainContainer">
    <div class='overviewMainpage'>
        <div class="textAusgabeOverview">

        Hallo <?php echo htmlentities($user['vorname']) . " " . htmlentities($user['nachname']).", <br> bitte wähle das Gebäude und die Etage aus.";
//        if ($user['admin'] == true) {
//            echo "<br>Willkommen im Adminbereich, hier können Sie im internen Bereich neue Benutzer eingeben.";
//        }
//        ?>
        </div>
        <div id='wahlReiter'>
            <select name="gebaeudeReiter" class="reiter" id="gebaeudeReiter">
                <?php

                use mapper\ZimmerDAO;

                spl_autoload_register();
                $objZimmer = new ZimmerDAO();
                $arrRooms = $objZimmer->readGebaeude();
                foreach ($arrRooms as $temp) {
                    echo "<option value=\"$temp\">" . $temp . "</option>";
                }
                ?>
            </select>

            <select name="etageReiter" class="reiter" id="etageReiter">
                <?php
                $objZimmer = new ZimmerDAO();
                $arrRooms = $objZimmer->readEtage();
                foreach ($arrRooms as $temp) {
                    echo "<option value=\"$temp\">" . $temp . "</option>";
                    var_dump($temp);
                }
                ?>
            </select>
        </div>
        <div class='polygonZeichnung'>
            <div id='polygon_1'></div>
        </div>
        <div class="modal"></div>
    </div>
</div>


<script src="js/svg.min.js"></script>
<script src="js/draw-svg.js"></script>
<script src="js/mainpage-scripts.js"></script>


<?php
include("templates/footer.php");
?>

