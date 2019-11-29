<?php
namespace model;

class Gast
{
    private $gastnr;
    private $anrede;
    private $vorname;
    private $nachname;
    private $strasse;
    private $hausnr;
    private $plz;
    private $ort;
    private $land;
    private $telefon;
    private $email;

    public function __construct($anrede, $vorname, $nachname, $strasse, $hausnr,  $plz, $ort, $land, $telefon, $email)
    {
        // $this->gastnr = $gastnr;
        $this->anrede = $anrede;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->strasse = $strasse;
        $this->hausnr = $hausnr;
        $this->plz = $plz;
        $this->ort = $ort;
        $this->land = $land;
        $this->telefon = $telefon;
        $this->email = $email;
    }

    public function getGastnr()
    {
        return $this->gastnr;
    }

    public function getAnrede()
    {
        return $this->anrede;
    }

    public function getVorname()
    {
        return $this->vorname;
    }

    public function getNachname()
    {
        return $this->nachname;
    }

    public function getStrasse()
    {
        return $this->strasse;
    }

    public function getHausnr()
    {
        return $this->hausnr;
    }


    public function getPlz()
    {
        return $this->plz;
    }

    public function getOrt()
    {
        return $this->ort;
    }

    public function getLand()
    {
        return $this->land;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setGastnr($gastnr)
    {
        $this->gastnr = $gastnr;
    }

    public function setAnrede($anrede)
    {
        $this->anrede = $anrede;
    }

    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;
    }

    public function setHausnr($hausnr)
    {
        $this->hausnr = $hausnr;
    }


    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    public function setLand($land)
    {
        $this->land = $land;
    }

    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

?>
