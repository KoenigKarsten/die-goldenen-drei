<?php
session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

require_once('templates/header.php');

spl_autoload_register();

use mapper\ReservierungsDAO;

?>
<div class="mainContainer">
    <div class="textAusgabeRest">


        <h1>Reservierung</h1>

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
                    $dateStart = new DateTime($row['DatumVon']);
                    $dateEnd = new DateTime($row['DatumBis']);
                    echo "<tr>";
                    echo "<td>" . $row['ReservierungNr'] . "</td>";
                    echo "<td>" . $row['ZimmerNr'] . "</td>";
                    echo "<td>" . $row['GastNr'] . "</td>";
                    echo "<td>" . $dateStart->format('d.m.Y') . "</td>";
                    echo "<td>" . $dateEnd->format('d.m.Y') . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <p><a class="btn btn-primary btn-lg" href="changeReservation.php" role="button">Reservierung ändern</a>
           <a class="btn btn-primary btn-lg" href="deleteReservation.php" role="button">Reservierung löschen</a></p>

    </div>

</div>

<?php
include("templates/footer.php")
?>
