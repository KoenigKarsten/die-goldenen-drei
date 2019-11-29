<?php

session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();
// $showFormular = "";

if (isset($_GET['changeGuest']) && $_GET['GastNr'] != "") {
        
        $anrede = $_GET['Anrede'];
        $vorname = $_GET['Vorname'];
        $nachname = $_GET['Nachname'];
        $strasse = $_GET['Strasse'];
        $hausNr = $_GET['HausNr'];
        $plz = $_GET['PLZ'];
        $ort = $_GET['Ort'];
        $land = $_GET['Land'];
        $telefon = $_GET['Telefon'];
        $email = $_GET['Email'];
  
    $statement = $pdo->prepare("UPDATE gast SET gast.Anrede = '$anrede', gast.Vorname = '$vorname', gast.Nachname = '$nachname', gast.Strasse = '$strasse', gast.Hausnr = '$hausNr', gast.PLZ = '$plz', gast.Ort = '$ort', gast.Land = '$land', gast.Telefon = '$telefon', gast.Email = '$email'
                                WHERE GastNr = ?");
    $statement->bindParam(1, $_GET['GastNr']);
    $result = $statement->execute();

    if ($result) {
        header("Location: gaesteueberblick.php");
    }
}

?>

<div class="mainContainer">

    <div class="textAusgabeRest">


        <h1>Gastdaten ändern</h1>

        Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
        Herzlich Willkommen im internen Bereich!<br><br>

        <div class="panel panel-default">

            <table class="table">
                <tr>
                    <th>#</th>
                    <th>GastNr</th>
                    <th>Anrede</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Strasse</th>
                    <th>Hausnr</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                    <th>Land</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Zimmernr</th>
                    <th>Reserviert von</th>
                    <th>bis</th>
                </tr>
                <?php
                $statement = $pdo->prepare("SELECT gast.*, reservierung.ZimmerNr, reservierung.DatumVon, reservierung.DatumBis 
                                            FROM gast LEFT JOIN reservierung ON gast.GastNr = reservierung.GastNr");
                $result = $statement->execute();
                $count = 1;

                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . $row['GastNr'] . "</td>";
                    ?> 
                    <form method="get">
                        <input type="hidden" name="GastNr" value=" <?php echo $row['GastNr']?>">
                    <td>
                    <select name="Anrede" id="anrede">
                        <?php 
                        if ($row['Anrede'] == "Herr") {
                            ?>
                            <option value="Herr">Herr</option>
                            <option value="Frau">Frau</option>
                            <option value="Divers">Divers</option>
                            <?php
                        }
                        else if ($row['Anrede'] == "Frau") {
                            ?>
                            <option value="Frau">Frau</option>
                            <option value="Herr">Herr</option>
                            <option value="Divers">Divers</option>
                            <?php
                        }
                        else {
                            ?>
                            <option value="Divers">Divers</option>
                            <option value="Herr">Herr</option>
                            <option value="Frau">Frau</option>
                            <?php
                        }
                        ?>
                    </select> 
                    </td>  
                    <td><input type="text" name="Vorname" value="<?php echo htmlentities($row['Vorname'])?>"></td>
                    <td><input type="text" name="Nachname" value="<?php echo htmlentities($row['Nachname'])?>"></td> 
                    <td><input type="text" name="Strasse" value="<?php echo htmlentities($row['Strasse'])?>"></td>
                    <td><input type="text" name="HausNr" value="<?php echo htmlentities($row['Hausnr'])?>"></td>
                    <td><input type="text" name="PLZ" value="<?php echo htmlentities($row['PLZ'])?>"></td>
                    <td><input type="text" name="Ort" value="<?php echo htmlentities($row['Ort'])?>"></td>
                    <td><input type="text" name="Land" value="<?php echo htmlentities($row['Land'])?>"></td>
                    <td><input type="text" name="Telefon" value="<?php echo htmlentities($row['Telefon'])?>"></td>
                    <td><input type="text" name="Email" value=" <?php echo htmlentities($row['Email'])?>"></td>
                    <td><output type="text" name="ZimmerNr" value="<?php echo htmlentities($row['ZimmerNr'])?>"><?php echo htmlentities($row['ZimmerNr'])?></td>
                    <td><output type="date" name="DatumVon" value="<?php echo htmlentities($row['DatumVon'])?>"><?php echo htmlentities($row['DatumVon'])?></td>
                    <td><output type="date" name="DatumBis" value="<?php echo htmlentities($row['DatumBis'])?>"><?php echo htmlentities($row['DatumBis'])?></td>
                    <td>
                    <br><p><input type="submit" name="changeGuest" class="btn btn-primary btn-lg" role="button"></input></p>
                    </td>
                    </tr>
                    </form>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
