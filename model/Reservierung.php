<?php
namespace model;
class Reservierung
{
    private $zimmernr;
    private $gastnr;
    private $datumVon;
    private $datumBis;

    public function __construct($zimmernr, $gastnr, $datumVon, $datumBis)
    {

        $this->zimmernr = $zimmernr;
        $this->gastnr = $gastnr;
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