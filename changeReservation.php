<?php

session_start();

require_once("inc/config.php.inc");
require_once("inc/functions.php");
require_once('templates/header.php');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

$user = check_user();

if (isset($_GET['changeReservation']) && $_GET['ReservierungNr'] !="") {

    $datumVon = $_GET['DatumVon'];
    $datumBis = $_GET['DatumBis'];

      if ($datumVon <= $datumBis) {

        $statement = $pdo->prepare("UPDATE reservierung SET reservierung.DatumVon = '$datumVon', reservierung.DatumBis = '$datumBis' WHERE reservierung.ReservierungNr = ?");
        $statement->bindParam(1, $_GET['ReservierungNr']);
        $result = $statement->execute();

        if ($result ) {
            header("Location: reservierungsueberblick.php");
        }
      }

      else {
        ?>
        <script>alert("Das Anfangsdatum der Reservierung liegt hinter dem Enddatum, bitte ändern Sie das Datum.");</script>
        <?php

      }
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
                    echo "<td>" . $row['ReservierungNr'] . "</td>";
                    ?>
                    <form method="get">
                    <input type="hidden" name="ReservierungNr" value="<?php echo $row['ReservierungNr']?>">
                    <td><output type="text" name="Zimmernummer" value="<?php echo htmlentities($row['ZimmerNr'])?>"><?php echo htmlentities($row['ZimmerNr'])?></td>
                    <td><output type="text" name="Gastnummer" value="<?php echo htmlentities($row['GastNr'])?>"><?php echo htmlentities($row['GastNr'])?></td>
                    <td><input type="date" name="DatumVon" value="<?php echo htmlentities($row['DatumVon'])?>"></td>
                    <td><input type="date" name="DatumBis" value="<?php echo htmlentities($row['DatumBis'])?>"></td>
                    <td>
                    <br><p><input type="submit" name="changeReservation" class="btn btn-primary btn-lg" role="button"></input></p>
                    </td>
                    </form>
                    <?php
                  
                }
                ?>

            </table>
        </div>
    </div>
</div>
