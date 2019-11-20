<?php
namespace model;
class Zimmer
{
    private $zimmerNr;
    private $gebaeude;
    private $etage;
    private $wcBad;
    private $barrierefrei;
    private $preisTag;
    private $status;

    public function __construct($zimmerNr, $gebaeude, $etage, $wcBad, $barrierefrei, $preisTag, $status)
    {
        $this->zimmerNr = $zimmerNr;
        $this->gebaeude = $gebaeude;
        $this->etage = $etage;
        $this->wcBad = $wcBad;
        $this->barrierefrei = $barrierefrei;
        $this->preisTag = $preisTag;
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

    public function getWcBad()
    {
        return $this->wcBad;
    }

    public function setWcBad($wcBad)
    {
        $this->wcBad = $wcBad;
    }

    public function getBarrierefrei()
    {
        return $this->barrierefrei;
    }

    public function setBarrierefrei($barrierefrei)
    {
        $this->barrierefrei = $barrierefrei;
    }

    public function getPreisTag()
    {
        return $this->preisTag;
    }

    public function setPreisTag($preisTag)
    {
        $this->preisTag = $preisTag;
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