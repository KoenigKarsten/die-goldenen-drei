<?php
session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once ('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();
?>
<div class="mainContainer">

    <h1>Herzlich Willkommen!</h1>

    Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
    Herzlich Willkommen im Gästebereich!<br><br>

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
                <th>Zusatz</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Land</th>
                <th>Telefon</th>
                <th>Email</th>
            </tr>
            <?php
            $statement = $pdo->prepare("SELECT * FROM gast ORDER BY gastnr");
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
                echo "<td>" . $row['Zusatz'] . "</td>";
                echo "<td>" . $row['PLZ'] . "</td>";
                echo "<td>" . $row['Ort'] . "</td>";
                echo "<td>" . $row['Land'] . "</td>";
                echo "<td>" . $row['Telefon'] . "</td>";
                echo '<td><a href="mailto:' . $row['Email'] . '">' . $row['Email'] . '</a></td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <!-- <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Ändern</a></p>
    <br><p><a class="btn btn-primary btn-lg" href="delete.php" role="button">Gast löschen</a></p> -->
    
    <button type="button" id="change" class="btn btn-success">ändern</button>
    <button type="button" id="deleteGuest" class="btn btn-primary">löschen</button>
           
</div>

<?php
include("templates/footer.php")
?>