<?php

namespace mapper;

use model\Zimmer;


class ZimmerDAO
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = SQLDAOFactory::getInstance();
    }


    public function create(Zimmer $zimmer)
    {
        $id = -1;
        $sql = "INSERT INTO zimmer (ZimmerNr, Gebäude, Etage, Status) values(?,?,?,?)";

        $zimmernr = $zimmer->getZimmernr();
        $gebaeude = $zimmer->getGebaeude();
        $etage = $zimmer->getEtage();
        $status = $zimmer->getStatus();

        if (!$preStmt = $this->dbConnect->prepare($sql)) {
            echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        } else {
            if (!$preStmt->bind_param("ssss", $zimmerNr, $gebaeude, $etage, $status)) {
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

    public function readGebaeude()
    {
        $arr = [];

        $stmt = $this->dbConnect->prepare("SELECT Gebaeude FROM zimmer GROUP BY Gebaeude");

        $stmt->execute();

        $stmt->bind_result($res);
        while ($stmt->fetch()) {
            array_push($arr, $res);
        }
        return $arr;
    }

    public function readEtage()
    {
        $arr = [];

        $stmt = $this->dbConnect->prepare("SELECT Etage FROM zimmer GROUP BY Etage");

        $stmt->execute();

        $stmt->bind_result($res);
        while ($stmt->fetch()) {
            array_push($arr, $res);
        }
        return $arr;
    }
}
