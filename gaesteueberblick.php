<?php

session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
//Mit der If-Abfrage überprüfen ob der User Adminrechte hat und entsprechend den Adminheader miteinbinden
$user = check_user();
if ($user['admin'] == true) {
    include("admin/header.php");
}
else {
    include("templates/header.php");
}


spl_autoload_register();
use mapper\GastDAO;
use model\Gast;
use mapper\SQLDAOFactory;
?>
    <div class="container main-container registration-form">
        <h1>Gäste</h1>
        <?php
        $showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

        $anrede = "";
        $vorname = "";
        $nachname = "";
        $strasse = "";
        $hausnr = "";
        $zusatz = "";
        $plz = "";
        $ort = "";
        $land = "";
        $telefon = "";
        $email = "";

        if (isset($_POST['submit'])) {
            $anrede = $_POST['anrede'];
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $strasse = $_POST['strasse'];
            $hausnr = $_POST['hausnummer'];
            $plz = $_POST['postleitzahl'];
            $ort = $_POST['ort'];
            $land = $_POST['land'];
            $zusatz = $_POST['zusatz'];
            $telefon = $_POST['telefonNr'];
            $email = $_POST['emailAddy'];

            $gast = new Gast($anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
            $gastDao = new GastDAO();
            $gastDao->read($gast);
            $gastDao->create($gast);

            if (empty($vorname) || empty($nachname) || empty($email)) {
                echo 'Bitte alle Felder ausfüllen<br>';
                $error = true;
            }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
            $error = true;
        }
        if (strlen($passwort) == 0) {
            echo 'Bitte ein Passwort angeben<br>';
            $error = true;
        }
        if ($passwort != $passwort2) {
            echo 'Die Passwörter müssen übereinstimmen<br>';
            $error = true;
        }

            //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
            if (!$error) {
                $statement = $pdo->prepare("SELECT * FROM gast WHERE email = :email");
                $result = $statement->execute(array('email' => $email));
                $gast = $statement->fetch();

                if ($gast !== true) {
                    echo 'Diese E-Mail-Adresse ist nicht vergeben<br>';
                    $error = false;
                }
            }
        }

        //Keine Fehler, wir können den Nutzer registrieren
        if (!$error) {
            $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

            $statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
            $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));

            if ($result) {
                echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
                $showFormular = false;
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
        }
    

    if ($showFormular) {
        ?>

        <form action="?register=2" method="post">

                <div class="form-group">
                    <label for="inputGastNr">Gastnummer:</label>
                    <input type="text" id="inputGastNr" size="5" maxlength="10" name="gastnr"
                         class="form-control">
                </div>

            <label for="inputName">Name:</label>

                <div class="form-group">
                    <select name="anrede" id="anrede">
                        <option value="herr">Herr</option>
                        <option value="frau">Frau</option>
                        <option value="divers">Divers</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputVorname">Vorname *:</label>
                    <input type="text" id="inputVorname" size="40" maxlength="250" name="vorname" class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label for="inputNachname">Nachname *:</label>
                    <input type="text" id="inputNachname" size="40" maxlength="250" name="nachname" class="form-control"
                           required>
                </div>

                <label for="inputAdresse">Adresse:</label>
                
                <div class="form-group">
                    <label for="inputStrasse">Strasse:</label>
                    <input type="text" id="inputStrasse" size="40" maxlength="250" name="strasse"
                           class="form-control">
                </div>
                        
                <div class="form-group">
                    <label for="inputHausNr">Hausnummer:</label>
                    <input type="text" id="inputHausNr" size="5" maxlength="10" name="hausnr"
                         class="form-control">
                </div>
                        
                <div class="form-group">
                    <label for="inputZusatz">Zusatz:</label>
                    <input type="text" id="inputZusatz" size="40" maxlength="250" name="zusatz"
                        class="form-control">
                </div>
                        
                <div class="form-group">
                    <label for="inputPLZ">PLZ:</label>
                    <input type="text" id="inputPLZ" size="5" maxlength="5" name="plz"
                    class="form-control">
                </div>
                        
                <div class="form-group">
                    <label for="inputOrt">Ort:</label>
                    <input type="text" id="inputOrt" size="40" maxlength="250" name="ort"
                    class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="inputLand">Land:</label>
                    <input type="text" id="inputLand" size="40" maxlength="250" name="Land"
                    class="form-control">
                </div>
                
                <label for="inputKontakt">Kontaktdaten:</label>
                
                <div class="form-group">
                    <label for="inputEmail">E-Mail *:</label>
                    <input type="email" id="inputEmail" size="40" maxlength="250" name="email" class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label for="inputTelefon">Telefon:</label>
                    <input type="text" id="inputTelefon" size="40" maxlength="250" name="telefon"
                           class="form-control">
                </div>

                    <button type="submit" class="btn btn-success">Search</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

            <?php
        } //Ende von if($showFormular)

      
    ?>
</div>
<?php
include("templates/footer.php");
?>

?>