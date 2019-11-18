<?php
namespace mapper;

use model\Zimmer;


    class ZimmerDAO {
        private $dbConnect;

        public function __construct () {
            $this->dbConnect = SQLDAOFactory::getInstance();
        }



        public function create(Zimmer $zimmer) {
            $id = -1;
            $sql = "INSERT INTO zimmer (ZimmerNr, Gebäude, Etage, barrierefrei, WCBadIntegriert, PreisTag, Status) values(?,?,?,?,?,?,?)";

            $zimmernr       = $zimmer->getZimmernr();
            $gebaeude       = $zimmer->getGebaeude();
            $etage          = $zimmer->getEtage();
            $barrierefrei   = $zimmer->getBarrierefrei();   
            $wcbad          = $zimmer->getWcbad();
            $preistag       = $zimmer->getPreistag();
            $status         = $zimmer->getStatus();

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
                        header("Location: overview.php?signup=success");
                    }
                }
            }
            $preStmt->close();
        }

        public function readGebaeude(){

            $sql = "SELECT Gebaeude FROM Zimmer GROUP BY Gebaeude";

            $ergebnis = $dbConnect->query($sql);

            $i = 0;
            while($zeile = $ergebnis->fetch_array(MYSQLI_NUM)){
                $gebaeude[$i] = $zeile[0];
                $i++;
            }

            return $gebaeude;
        }



    }