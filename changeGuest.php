<?php

session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();
// $showFormular = "";

if (isset($_GET['changeGuest'])) {

    $statement = $pdo->prepare("UPDATE gast, reservierung SET gast.* = ?, reservierung.ZimmerNr = ?, reservierung.DatumVon = ?, reservierung.DatumBis = ?
                                WHERE GastNr = ?");
    $statement->bindParam(1, $_GET['changeGuest']);
    $result = $statement->execute();
    echo '<style type="text/css">table.table {
        display:none;}
        </style>';
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
                    <td>
                    <select name="anrede" id="anrede">
                        <option value="herr">Herr</option>
                        <option value="frau">Frau</option>
                        <option value="divers">Divers</option>
                    </select> 
                    </td>  
                    <td><input type="text" name="Vorname" value="<?php echo htmlentities($row['Vorname'])?>"></td>
                    <td><input type="text" name="Nachname" value="<?php echo htmlentities($row['Nachname'])?>"></td> 
                    <td><input type="text" name="Strasse" value="<?php echo htmlentities($row['Strasse'])?>"></td>
                    <td><input type="text" name="Hausnr" value="<?php echo htmlentities($row['Hausnr'])?>"></td>
                    <td><input type="text" name="PLZ" value="<?php echo htmlentities($row['PLZ'])?>"></td>
                    <td><input type="text" name="Ort" value="<?php echo htmlentities($row['Ort'])?>"></td>
                    <td><input type="text" name="Land" value="<?php echo htmlentities($row['Land'])?>"></td>
                    <td><input type="text" name="Telefon" value="<?php echo htmlentities($row['Telefon'])?>"></td>
                    <td><input type="text" name="Email" value=" <?php echo htmlentities($row['Email'])?>"></td>
                    <td><input type="text" name="Zimmernr" value="<?php echo htmlentities($row['ZimmerNr'])?>"></td>
                    <td><input type="text" name="Reserviert von" value="<?php echo htmlentities($row['DatumVon'])?>"></td>
                    <td><input type="text" name="bis" value="<?php echo htmlentities($row['DatumBis'])?>"></td>
                    <?php
       
                    echo '<td>
                <br><p><a class="btn btn-primary btn-lg" href="changeGuest.php?changeGuest=' . $row['GastNr'] . '" role="button">ändern</a></p>
                    </td>';
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
