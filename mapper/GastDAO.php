<?php

namespace mapper;
require_once("SQLDAOFactory.php");

use model\Gast;
use model\Reservierung;

// include_once("../model/Gast.php");

class GastDAO
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = SQLDAOFactory::getInstance();
    }

    public function create(Gast $gast, Reservierung $reservierung)
    {
        $id = -1;

        $sql = ("INSERT INTO gast (anrede, vorname, nachname, strasse, hausnr, zusatz, plz, ort, land, telefon, email) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

        $anrede = $gast->getAnrede();
        $vorname = $gast->getVorname();
        $nachname = $gast->getNachname();
        $strasse = $gast->getStrasse();
        $hausnr = $gast->getHausNr();
        $plz = $gast->getPlz();
        $ort = $gast->getOrt();
        $land = $gast->getLand();
        $zusatz = $gast->getZusatz();
        $telefon = $gast->getTelefon();
        $email = $gast->getEmail();

        if (!$preStmt = $this->dbConnect->prepare($sql)) {
            echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        } else {
            if (!$preStmt->bind_param("sssssssssss", $anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email)) {
                echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            } else {
                if (!$preStmt->execute()) {
                    echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                } else {
                    //success.php nur zu Testzwecken, muss eventuell noch geändert werden zu overview.php
                    header("Location: overview.php?signup=success");

                }
            }
        }

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
                    if (!$preStmt->bind_result($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email)) {
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

        return  json_decode($gast);
    }

    public function readAll(Gast $gast) {
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
                    if (!$preStmt->bind_result($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email)) {
                        echo "Fehler beim Ergebnis-Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    } else {
                        if ($preStmt->fetch()) {
                            $gast = new Gast($gastnr, $anrede, $vorname, $nachname, $strasse, $hausnr, $zusatz, $plz, $ort, $land, $telefon, $email);
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