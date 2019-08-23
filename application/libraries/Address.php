<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Address
 *
 * @author mahmoud
 */
class Address {
    private $addressId;
    private $address;
    private $address2;
    private $district;
    private $cityId;
    private $postalCode;
    private $phone;
    private $lastUpdate;
    
    public function __construct($addressId=0, $address="", $address2=""
            , $district="", $cityId=0, $postalCode="", $phone="", $lastUpdate=NULL) {
        $this->addressId = $addressId;
        $this->address = $address;
        $this->address2 = $address2;
        $this->district = $district;
        $this->cityId = $cityId;
        $this->postalCode = $postalCode;
        $this->phone = $phone;
        $this->lastUpdate = $lastUpdate;
    }
    public function getAddressId() {
        return $this->addressId;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function getCityId() {
        return $this->cityId;
    }

    public function getPostalCode() {
        return $this->postalCode;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setAddressId($addressId) {
        $this->addressId = $addressId;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }

    public function setCityId($cityId) {
        $this->cityId = $cityId;
    }

    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }


}
