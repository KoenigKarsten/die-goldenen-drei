<?php
session_start();
require_once("inc/config.php.inc");
require_once("inc/functions.php");

require_once ('templates/header.php');

spl_autoload_register();

use mapper\ReservierungsDAO;
use model\Reservierung;

?>
<div class="mainContainer">

        <h1>Reservierung</h1>

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
                <th>Datum bis </th>
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
            }
            ?>
        </table>
    </div>

    <button type="button" id="change" class="btn btn-success">ändern</button>
    <button type="button" id="deleteReservation" class="btn btn-primary">löschen</button>


</div>

<?php
include("templates/footer.php")
?>
