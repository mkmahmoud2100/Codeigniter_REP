<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of City
 *
 * @author mahmoud
 */
class City {
    private $cityId;
    private $city;
    private $countryId;
    private $lastUpdate;
    
    public function __construct($cityId=0, $city="", $countryId=0, $lastUpdate=NULL) {
        $this->cityId = $cityId;
        $this->city = $city;
        $this->countryId = $countryId;
        $this->lastUpdate = $lastUpdate;
    }
    public function getCityId() {
        return $this->cityId;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCountryId() {
        return $this->countryId;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setCityId($cityId) {
        $this->cityId = $cityId;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setCountryId($countryId) {
        $this->countryId = $countryId;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }


}
