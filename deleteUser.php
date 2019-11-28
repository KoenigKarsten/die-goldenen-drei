<?php
session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();

if (isset($_GET['deleteUser'])) {
    $statement = $pdo->prepare("DELETE FROM users WHERE id = ? AND id != 1");
    $statement->bindParam(1, $_GET['deleteUser']);
    $result = $statement->execute();
    if (!$result) {
        ?>
        <script>alert("Dieser Admin kann nicht gelöscht werden.");</script>
        <?php
    }
}


?>

<div class="mainContainer">
    <div class="textAusgabeRest">

        <h1>Benutzer löschen</h1>

        Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
        Herzlich Willkommen im internen Bereich!<br><br>

        <div class="panel panel-default">

            <table class="table">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>E-Mail</th>
                    <th></th>
                </tr>
                <?php
                $statement = $pdo->prepare("SELECT * FROM users ORDER BY id");
                $result = $statement->execute();
                $count = 1;

                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['vorname'] . "</td>";
                    echo "<td>" . $row['nachname'] . "</td>";
                    if ($row['admin'] == 1) {
                        echo "<td>ja</td>";
                    } else {
                        echo "<td>nein</td>";
                    }
                    echo '<td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>';
                    echo '<td>
                
                <br><p><a class="btn btn-primary btn-lg" href="deleteUser.php?deleteUser=' . $row['id'] . '" role="button">löschen</a></p>
               
                </td>';
                    echo "</tr>";
                }
                ?>


            </table>

        </div>
    </div>
</div>
