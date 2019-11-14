  <?php
  session_start();
  require_once("inc/config.inc.php");
  require_once("inc/functions.inc.php");
  $user = check_user();
  include("templates/header.inc.php");
  ?>

  <div class='overviewMainpage'>
    <div class='wahlReiter'>
      <select name="gebaeudeReiter" id="gebaeudeReiter" onchange=>
        <option value="B">Gebäude B</option>
        <option value="C">Gebäude C</option>
        <option value="D">Gebäude D</option>
      </select>
      <select name="etageReiter" id="etageReiter">
        <option value="1">Etage 1</option>
        <option value="2">Etage 2</option>
        <option value="3">Etage 3</option>
        <option value="4">Etage 4</option>
        <option value="5">Etage 5</option>
        <option value="6">Etage 6</option>
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

