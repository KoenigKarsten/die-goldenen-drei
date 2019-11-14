<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("templates/header.inc.php")
?>
<div class="container main-container registration-form">
<h1>Reservierung</h1>
<?php
$showFormular = true; //Variable ob das Reservierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
	$error = false;
	$vorname = trim($_POST['vorname']);
	$nachname = trim($_POST['nachname']);
	$email = trim($_POST['email']);
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
	
	if(empty($vorname) || empty($nachname) || empty($email)) {
		echo 'Bitte alle Felder ausfüllen<br>';
		$error = true;
	}
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}
	
	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		}	
	}
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));
		
		if($result) {		
			echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
 
if($showFormular) {
?>

<form action="?register=1" method="post">

<div class="form-group">
<label for="inputResNr">Reservierungsnummer:</label>
<input type="text" id="inputResNr" size="40" maxlength="250" name="ReservierungNr" class="form-control" required>
</div>

<div class="form-group">
<label for="inputZimmerNr">Zimmernummer:</label>
<input type="text" id="inputZimmerNr" size="40" maxlength="250" name="ZimmerNr" class="form-control" required>
</div>

<div class="form-group">
<label for="inputGastNr">Gästenummer:</label>
<input type="text" id="inputGastNr" size="40" maxlength="250" name="GastNr" class="form-control" required>
</div>

<div class="form-group">
<label for="inputDatumVon">Startdatum:</label>
<input type="date" id="inputDatumVon" size="40"  maxlength="250" name="DatumVon" class="form-control" required>
</div> 

<div class="form-group">
<label for="inputDatumBis">Enddatum:</label>
<input type="date" id="inputDatumBis" size="40" maxlength="250" name="DatumBis" class="form-control" required>
</div> 
<button type="submit" class="btn btn-lg btn-primary btn-block">Reservieren</button>
</form>
</div>



<?php 
include("templates/footer.inc.php")
?>