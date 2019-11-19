<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

use mapper\SQLDAOFactory;

spl_autoload_register();

$user = check_user();
$dbConnect = SQLDAOFactory::getInstance();

$sql = "SELECT ZimmerNr, Status FROM zimmer";

$result = $dbConnect->query($sql);

echo json_encode($result->fetch_all(MYSQLI_ASSOC));


?> 