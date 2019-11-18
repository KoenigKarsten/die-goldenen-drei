<?php

include_once("../model/Reservierung.php");

    class ReservierungDAO {
        private $dbConnect;

        public function __construct (){
            $this->dbConnect = SQLDAOFactory::getInstance();
        }

        public function create (Reservierung $reservierung) {
            $id = -1;

            $sql = ("INSERT INTO reservierung (zimmerNr, gastNr, mitarbeiterNr, datumVon, datumBis) VALUES(?,?,?,?,?)");

            $zimmernr       = $reservierung->getZimmernr();
            $gastnr         = $reservierung->getGastnr();
            $mitarbeiternr  = $reservierung->getMitarbeiternr();
            $datumVon       = $reservierung->getDatumVon();
            $datumBis       = $reservierung->getDatumBis();

            if(!$preStmt = $this->dbConnect->prepare($sql)){
                echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            }
            else {
                if(!$preStmt->bind_param("sssss", $zimmernr, $gastnr, $mitarbeiternr, $datumVon, $datumBis)) {
                    echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                }

                else {
                    if(!$preStmt->execute()) {
                        echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    }

                    else { 
                        header("Location: overview.php?signup=success");
        
                    }
                }
            }

            $preStmt->close();
        }

    }
    
?>