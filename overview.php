<?php
session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");
include_once("templates/header.php");
include_once("mapper/SQLDAOFactory.php");
$user = check_user();
?>





<div class='overviewMainpage'>
    Hallo <?php echo htmlentities($user['vorname'])  ." ".  htmlentities($user['nachname']); ?><br>
    <br><br>
    <div class='wahlReiter'>
        <select name="gebaeudeReiter" id="gebaeudeReiter">
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


        <select name="etageReiter" id="etageReiter">
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


<script src="js/svg.min.js"></script>
<script src="js/draw-svg.js"></script>
<script src="js/mainpage-scripts.js"></script>


<?php
include("templates/footer.php");
?>

