<?php 
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365)); 

require_once("inc/config.php.inc");
require_once("inc/functions.php");

include("templates/header.php");

include("templates/footer.php")
?>