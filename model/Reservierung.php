<?php

class Reserierung
{
    private $zimmernr;
    private $gastnr;
    private $mitarbeiternr;
    private $datumVon;
    private $datumBis;

    public function __construct($zimmernr, $gastnr, $mitarbeiternr, $datumVon, $datumBis)
    {

        $this->zimmernr = $zimmernr;
        $this->gastnr = $gastnr;
        $this->mitarbeiternr = $mitarbeiternr;
        $this->datumVon = $datumVon;
        $this->datumBis = $datumBis;

    }

    public function getZimmernr()
    {
        return $this->zimmernr;
    }

    public function getGastnr()
    {
        return $this->gastnr;
    }

    public function getMitarbeiternr()
    {
        return $this->mitarbeiternr;
    }

    public function getDatumVon()
    {
        return $this->datumVon;
    }

    public function getDatumBis()
    {
        return $this->datumBis;
    }


    public function setZimmernr($zimmernr)
    {
        $this->zimmernr = $zimmernr;
    }

    public function setGastnr($gastnr)
    {
        $this->gastnr = $gastnr;
    }

    public function setMitarbeiternr($mitarbeiternr)
    {
        $this->mitarbeiternr = $mitarbeiternr;
    }

    public function setDatumVon($datumVon)
    {
        $this->datumVon = $datumVon;
    }

    public function setDatumBis($datumBis)
    {
        $this->datumBis = $datumBis;
    }

}

?>