<?php
session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

include("templates/header.php")
?>
    <div class="container main-container registration-form">
        <h1>Gäste</h1>
        <?php
        $showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

        if (isset($_GET['register'])) {
            $error = false;
            $vorname = trim($_POST['vorname']);
            $nachname = trim($_POST['nachname']);
            $email = trim($_POST['email']);
            $passwort = $_POST['passwort'];
            $passwort2 = $_POST['passwort2'];

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
                $user = $statement->fetch();

                if ($user !== false) {
                    echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                    $error = true;
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
        }

        if ($showFormular) {
            ?>

            <form action="?register=2" method="post">

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
                    <input type="text" id="inputHausNr" size="5" maxlength="250" name="hausnr"
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

                    <button type="button" class="btn btn-secondary">Close</button>
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