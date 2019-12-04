<?php

namespace mapper;
include_once("./model/Reservierung.php");

class ReservierungDAO
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = SQLDAOFactory::getInstance();
    }

    public function create(Reservierung $reservierung){
        $id = -1;

        $sql = ("INSERT INTO reservierung (zimmerNr, gastNr, datumVon, datumBis) VALUES(?,?,,?,?)");

        $zimmernr = $reservierung->getZimmernr();
        $gastnr = $reservierung->getGastnr();
        $datumVon = $reservierung->getDatumVon();
        $datumBis = $reservierung->getDatumBis();

        if (!$preStmt = $this->dbConnect->prepare($sql)) {
            echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        } else {
            if (!$preStmt->bind_param("sssss", $zimmernr, $gastnr, $datumVon, $datumBis)) {
                echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            } else {
                if (!$preStmt->execute()) {
                    echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                } else {
                    header("Location: overview.php?signup=success");
                }
            }
        }

        $preStmt->close();
    }

    public function read(Reservierung $reservierung)
    {
        include("./model/Reservierung.php");

        $sql = ("SELECT ZimmerNr, ReservierungNr, GastNr, DatumVon, DatumBis
                        FROM Reservierung 
                        WHERE ZimmerNr = $Zimmernr
                        AND DatumVon = $datumVon
                        AND DatumBis = $datumBis");

        if (!$preStmt = $this->dbConnect->prepare($sql)) {
            echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        } else {
            if (!$preStmt->bind_param("s", $reservierung)) {
                echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            } else {
                if (!$preStmt->execute()) {
                    echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                } else {
                    if (!$preStmt->bind_result($zimmernr, $gastnr, $datumVon, $datumBis)) {
                        echo "Fehler beim Ergebnis-Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    } else {
                        if ($preStmt->fetch()) {
                            $reservierung = new Reservierung($zimmernr, $gastnr, $datumVon, $datumBis);
                        }
                        $preStmt->free_result();
                    }
                }
            }

            $preStmt->close();
        }

        return $reservierung;
    }

    public function update(Reservierung $reservierung){
		$ok = false;

		return $ok;
	}
	
	public function delete(Reservierung $reservierung){
		$ok = false;

		return $ok;
	}
}

?>