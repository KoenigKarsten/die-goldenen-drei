
<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

$user = check_user();

        if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            } 
      
      
      $_sql = "SELECT ZimmerNr, Status FROM zimmer";
          $result = $conn->query($_sql);

      if($result->num_rows > 0) {
       echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    }


?> 