<?php
    class ZimmerDAO {
        private $dbConnect;

        public function __construct () {
            $this->dbConnect = SQLDAOFactory::getInstance();
        }

        public function create($zimmerNr, $gebaeude, $etage, $barrierefrei, $wcBad, $preisTag, $status) {
            $id = -1;
            $sql = "insert into zimmer (ZimmerNr, Gebäude, Etage, barrierefrei, WCBadIntegriert, PreisTag, Status) values(?,?,?,?,?,?,?)";

            if(!$preStmt = $this->dbConnect->prepare($sql)){
                echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            }
            else {
                if(!$preStmt->bind_param("sssssss", $zimmerNr, $gebaeude, $etage, $barrierefrei, $wcBad, $preisTag, $status)) {
                    echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                }
                else {
                    if(!$preStmt->execute()) {
                        echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    }
                    else {
                        $id = $preStmt->insert_id;
                    }
                }
            }

            $preStmt->free_result();
            $preStmt->close();
            return $id;
        }
    }