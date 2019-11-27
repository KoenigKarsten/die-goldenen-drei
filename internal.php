<?php
session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once ('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();
?>
<div class="container main-container">

    <h1>Herzlich Willkommen!</h1>

    Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
    Herzlich Willkommen im internen Bereich!<br><br>

    <div class="panel panel-default">

        <table class="table">
            <tr>
                <th>#</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Admin</th>
                <th>E-Mail</th>
            </tr>
            <?php
            $statement = $pdo->prepare("SELECT * FROM users ORDER BY id");
            $result = $statement->execute();
            $count = 1;
            
            while ($row = $statement->fetch()) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $row['vorname'] . "</td>";
                echo "<td>" . $row['nachname'] . "</td>";
                if ($row['admin'] == 1) {
                    echo "<td>ja</td>";
                } 
                else {
                    echo "<td>nein</td>"; 
                }
                echo '<td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Jetzt registrieren</a></p>

</div>

<?php
include("templates/footer.php")
?>
