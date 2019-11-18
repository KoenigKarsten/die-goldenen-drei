  <?php
  session_start();
  require_once("inc/config.inc.php");
  require_once("inc/functions.inc.php");
  $user = check_user();
  include("templates/header.inc.php");
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
    






  <script src="js/svg.min.js"></script>
  <script src="js/draw-svg.js"></script>
  <script src="js/mainpage-scripts.js"></script>



  <?php 
  include("templates/footer.inc.php");
  ?>

