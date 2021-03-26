<?php

namespace App\DataSearch;

class SearchData
{


    /**
     * @var string
     */
    public $r;

    /**
     * @var boolean
     */
    public $organisateurs =false;

    /**
     * @var boolean
     */
    public $participants =false;

    /**
     * @return bool
     */
    public function Organisateur(): bool
    {
        return $this->organisateurs;
    }

    /**
     * @param bool $organisateur
     * @return SearchData
     */
    public function setOrganisateur(bool $organisateur): SearchData
    {
        $this->organisateur = $organisateur;
        return $this;
    }

    /**
     * @return bool
     */
    public function Participants(): bool
    {
        return $this->participants;
    }

    /**
     * @param bool $participants
     * @return SearchData
     */
    public function setParticipants(bool $participants): SearchData
    {
        $this->participants = $participants;
        return $this;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $site
     * @return SearchData
     */
    public function setSite(string $site): SearchData
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @var string
     */
    public $site ;

    /**
     * @return string
     */
    public function getR(): string
    {
        return $this->r;
    }

    /**
     * @param string $r
     * @return SearchData
     */
    public function setR(string $r): SearchData
    {
        $this->r = $r;
        return $this;
    }

}