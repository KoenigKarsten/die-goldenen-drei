<?php
namespace model;
class Zimmer
{
    private $zimmerNr;
    private $gebaeude;
    private $etage;
    private $status;

    public function __construct($zimmerNr, $gebaeude, $etage, $status)
    {
        $this->zimmerNr = $zimmerNr;
        $this->gebaeude = $gebaeude;
        $this->etage = $etage;
        $this->status = $status;
    }

    public function getZimmerNr()
    {
        return $this->zimmerNr;
    }

    public function setZimmerNr($zimmerNr)
    {
        $this->zimmerNr = $zimmerNr;
    }

    public function getGebaeude()
    {
        return $this->gebaeude;
    }

    public function setGebaeude($gebaeude)
    {
        $this->gebaeude = $gebaeude;
    }

    public function getEtage()
    {
        return $this->etage;
    }

    public function setEtage($etage)
    {
        $this->etage = $etage;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}