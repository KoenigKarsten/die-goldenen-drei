<?php

session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();
$showFormular = "";

if (isset($_GET['changeGuest'])) {
    $statement = $pdo->prepare("SELECT * FROM reservierung WHERE ReservierungNr = ?");
    $statement->bindParam(1, $_GET['changeGuest']);
    $result = $statement->execute();

    $statement = $pdo->prepare("UPDATE FROM rservierung WHERE ReservierungNr = ?");
    $statement->bindParam(1, $_GET['changeGuest']);
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
                    <th>Mitarbeiternummer |</th>
                    <th>Datum von |</th>
                    <th>Datum bis</th>
                </tr>

                <?php
                $statement = $pdo->prepare("SELECT * FROM reservierung ORDER BY ReservierungNr");
                $result = $statement->execute();
                $count = 1;

                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['ReservierungNr'] . "</td>";
                    echo "<td>" . $row['ZimmerNr'] . "</td>";
                    echo "<td>" . $row['GastNr'] . "</td>";
                    echo "<td>" . $row['MitarbeiterNr'] . "</td>";
                    echo "<td>" . $row['DatumVon'] . "</td>";
                    echo "<td>" . $row['DatumBis'] . "</td>";
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
