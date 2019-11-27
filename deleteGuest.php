<?php
session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();

if (isset($_GET['deleteGuest'])) {
    $statement = $pdo->prepare("DELETE FROM gast WHERE GastNr = ?");
    $statement->bindParam(1, $_GET['deleteGuest']);
    $result = $statement->execute();
    if (!$result) {
        ?>
        <script>alert("Dieser Gast kann nicht gelöscht werden, weil noch eine Reservierung besteht.");</script>
        <?php
    }
}

?>

<div class="mainContainer">
    <div class="textAusgabeRest">


        <h1>Gast löschen</h1>

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
                $statement = $pdo->prepare("SELECT gast.*, reservierung.ZimmerNr, reservierung.DatumVon, reservierung.DatumBis FROM gast LEFT JOIN reservierung ON gast.GastNr = reservierung.GastNr");
                $result = $statement->execute();
                $count = 1;

                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . $row['GastNr'] . "</td>";
                    echo "<td>" . $row['Anrede'] . "</td>";
                    echo "<td>" . $row['Vorname'] . "</td>";
                    echo "<td>" . $row['Nachname'] . "</td>";
                    echo "<td>" . $row['Strasse'] . "</td>";
                    echo "<td>" . $row['Hausnr'] . "</td>";
                    echo "<td>" . $row['PLZ'] . "</td>";
                    echo "<td>" . $row['Ort'] . "</td>";
                    echo "<td>" . $row['Land'] . "</td>";
                    echo "<td>" . $row['Telefon'] . "</td>";
                    echo '<td><a href="mailto:' . $row['Email'] . '">' . $row['Email'] . '</a></td>';
                    echo "<td>" . $row['ZimmerNr'] . "</td>";
                    echo "<td>" . $row['DatumVon'] . "</td>";
                    echo "<td>" . $row['DatumBis'] . "</td>";

                    echo '<td>
                
                <br><p><a class="btn btn-primary btn-lg" href="deleteGuest.php?deleteGuest=' . $row['GastNr'] . '" role="button">löschen</a></p>
               
                </td>';
                    echo "</tr>";
                }
                ?>


            </table>

        </div>
    </div>
</div>
