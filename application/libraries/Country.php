<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Country
 *
 * @author mahmoud
 */
class Country {
    private $countryId;
    private $country;
    private $lastUpdate;
    public function __construct($countryId=0, $country="", $lastUpdate=NULL) {
        $this->countryId = $countryId;
        $this->country = $country;
        $this->lastUpdate = $lastUpdate;
    }
    public function getCountryId() {
        return $this->countryId;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setCountryId($countryId) {
        $this->countryId = $countryId;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }


}
