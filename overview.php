<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");
include_once("templates/header.php");
include_once("mapper/SQLDAOFactory.php");
$user = check_user();
?>


<div class='overviewMainpage'>
    <div class='wahlReiter'>
        <select name="gebaeudeReiter" id="gebaeudeReiter">

        </select>
        <select name="etageReiter" id="etageReiter">

        </select>
    </div>

    <div class='polygonZeichnung'>
        <div id='polygon_1'></div>
    </div>

    <div class="modal"></div>
</div>


<?php

use mapper\ZimmerDAO;

spl_autoload_register();
$objZimmer = new ZimmerDAO();
$arrRooms = $objZimmer->readGebaeude();

?>


<script src="js/svg.min.js"></script>
<script src="js/draw-svg.js"></script>
<script src="js/mainpage-scripts.js"></script>


<?php
include("templates/footer.php");
?>

