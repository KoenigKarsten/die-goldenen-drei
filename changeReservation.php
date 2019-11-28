<?php

session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();
$showFormular = "";

if (isset($_GET['changeReservation'])) {
    $statement = $pdo->prepare("SELECT * FROM reservierung WHERE ReservierungNr = ?");
    $statement->bindParam(1, $_GET['changeReservation']);
    $result = $statement->execute();

    $statement = $pdo->prepare("UPDATE FROM reservierung WHERE ReservierungNr = ?");
    $statement->bindParam(1, $_GET['changeReservation']);
    $result = $statement->execute();
    echo '<style type="text/css">table.table {
        display:none;}
        </style>';
}

?>

<div class="mainContainer">

    <div class="textAusgabeRest">


        <h1>Reservierungsdaten ändern</h1>

        Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
        Herzlich Willkommen im Reservierungsbereich!<br><br>

        <div class="panel panel-default">

            <table class="table">

                <tr>
                    <th>Reservierungsnummer |</th>
                    <th>Zimmernummer |</th>
                    <th>Gastnummer |</th>
                    <th>Datum von |</th>
                    <th>Datum bis</th>
                </tr>

                <?php
                $statement = $pdo->prepare("SELECT * FROM reservierung ORDER BY ReservierungNr");
                $result = $statement->execute();
                $count = 1;

                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    ?>
                    <td><input type="text" name="Reservierungsnummer" value="<?php echo htmlentities($row['ReservierungNr'])?>"></td>
                    <td><input type="text" name="Zimmernummer" value="<?php echo htmlentities($row['ZimmerNr'])?>"></td>
                    <td><input type="text" name="Gastnummer" value="<?php echo htmlentities($row['GastNr'])?>"></td>
                    <td><input type="text" name="DatumVon" value="<?php echo htmlentities($row['DatumVon'])?>"></td>
                    <td><input type="text" name="DatumBis" value="<?php echo htmlentities($row['DatumBis'])?>"></td>
                    <?php
                    echo "</tr>";

                    echo '<td>

                        <br><p><a class="btn btn-primary btn-lg" href="changeReservation.php?changeReservation=' . $row['ReservierungNr'] . '" role="button">ändern</a></p>
                    
                        </td>';

                    echo "</tr>";
                }
                ?>

            </table>
        </div>
    </div>
</div>
