<?php
  
    // require_once("./inc/config.inc.php");
    // require_once("/SQLDAOFactory.php");
    class GastDAO {
        private $dbConnect;

        public function __construct (){
            $this->dbConnect = SQLDAOFactory::getInstance();
        }
        //     public function create(Gast $gast) {
                     
        //         $sql = ("INSERT INTO gast (vorname) VALUES(?)");
        //         $vorname = $gast->getVorname();
         
	// 	$preStmt = $this->dbConnect->prepare($sql);
	// 	$preStmt->bind_param("s", $vorname);
	// 	$preStmt->execute();
	// 	//Auslesen des neuen primary keys
	// 	$id = $preStmt->insert_id;
	// 	$preStmt->close();           
        //     }
	
            
            public function create(Gast $gast) {
            $id = -1;

            $sql = ("INSERT INTO gast (vorname) VALUES(?)");
            $vorname = $gast->getVorname();

            if(!$preStmt = $this->dbConnect->prepare($sql)){
                echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            }
            else {
                if(!$preStmt->bind_param("s", $vorname)) {
                    echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                }

                else {
                    if(!$preStmt->execute()) {
                        echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
                    }

                    else { 
                        // if(!$preStmt->bind_result($vorname, $nachname, $strasse, $hausNr, $zusatz, $plz, $ort, $land, $telefon, $email)){
                        // echo "Fehler beim Ergebnis-Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error ."<br>";
                        // }

                        // else {
                        // if($preStmt->fetch()){
                        //         $gast = new Gast($gastNr, $anrede, $vorname, $nachname, $strasse, $hausNr, $zusatz, $plz, $ort, $land, $telefon, $email);
                        // }
                        // $preStmt->free_result();
                    }
                }
            }

            $preStmt->close();
        }               

    // return $gast;
    // }
}
                        
         
     
?>