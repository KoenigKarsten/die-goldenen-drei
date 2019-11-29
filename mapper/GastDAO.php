<?php

namespace mapper;
require_once("SQLDAOFactory.php");

use model\Gast;

// include_once("../model/Gast.php");

class GastDAO
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = SQLDAOFactory::getInstance();
    }

    public function create(Gast $gast, $zimmerNr,$datumVon, $datumBis){

        //////ZimmerNr Status Ändern
        $sqlChange = ("UPDATE zimmer SET Status = 1 WHERE ZimmerNr=?");

        $stat = $this->dbConnect->prepare($sqlChange);
        $stat->bind_param('s', $zimmerNr);
        $stat->execute();


        ///////////Tabelle Gast Beschreiben
        $sql = ("INSERT INTO gast (anrede, vorname, nachname, strasse, hausnr, plz, ort, land, telefon, email) VALUES(?,?,?,?,?,?,?,?,?,?)");

        $anrede = $gast->getAnrede();
        $vorname = $gast->getVorname();
        $nachname = $gast->getNachname();
        $strasse = $gast->getStrasse();
        $hausnr = $gast->getHausNr();
        $plz = $gast->getPlz();
        $ort = $gast->getOrt();
        $land = $gast->getLand();
        $telefon = $gast->getTelefon();
        $email = $gast->getEmail();

        $preStmt = $this->dbConnect->prepare($sql);
        $preStmt->bind_param("ssssssssss", $anrede, $vorname, $nachname, $strasse, $hausnr, $plz, $ort, $land, $telefon, $email);
        $preStmt->execute();

        $gastNr = $preStmt->insert_id;


        $sqlReservierung = ("INSERT INTO reservierung(ZimmerNr, GastNr, DatumVon, DatumBis) VALUES(?, ?, ?, ?)");
        $statRes = $this->dbConnect->prepare($sqlReservierung);
        $statRes->bind_param('siss', $zimmerNr, $gastNr, $datumVon, $datumBis);
        $statRes->execute();

        header("Location: overview.php?signup=success");
        $preStmt->close();
        }




    public function read($zimmerNr)
    {
        include("./model/gast.php");

        $sql = ("SELECT r.zimmerNr, g.anrede, g.vorname, g.nachname, g.strasse, g.hausnr, g.plz, g.land, g.ort,  g.telefon, g.email, r.datumVon, r.datumBis
                        FROM gast g, reservierung r
                        WHERE r.ZimmerNrr = $zimmerNr");

        if (!$preStmt = $this->dbConnect->prepare($sql)) {
            echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        } else {
            if (!$preStmt->bind_param("s", $gast)) {
                echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            } else {
                if (!$preStmt->execute()) {
                    echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                } else {
                    if (!$preStmt->bind_result($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $plz, $ort, $land, $telefon, $email)) {
                        echo "Fehler beim Ergebnis-Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    } else {
                        if ($preStmt->fetch()) {
                            $gast = new Gast($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $plz, $ort, $land, $telefon, $email, $datumVon, $datumBis);
                        }
                        $preStmt->free_result();
                    }
                }
            }

            $preStmt->close();
        }

        return json_decode($gast);
    }

    public function readAll(Gast $gast)
    {
        include("./model/gast.php");

        $sql = ("SELECT * FROM gast");

        if (!$preStmt = $this->dbConnect->prepare($sql)) {
            echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        } else {
            if (!$preStmt->bind_param("s", $gast)) {
                echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            } else {
                if (!$preStmt->execute()) {
                    echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                } else {
                    if (!$preStmt->bind_result($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $plz, $ort, $land, $telefon, $email)) {
                        echo "Fehler beim Ergebnis-Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    } else {
                        if ($preStmt->fetch()) {
                            $gast = new Gast($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $plz, $ort, $land, $telefon, $email);
                        }
                        $preStmt->free_result();
                    }
                }
            }

            $preStmt->close();
        }

        return $gast;
    }
}

?>