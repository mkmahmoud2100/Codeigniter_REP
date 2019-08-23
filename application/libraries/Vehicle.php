<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehicle
 *
 * @author mahmoud
 */
class Vehicle {
    private $vehicleId;
    private $type;
    private $model;
    private $manufucturer;
    private $licensePublishedDate;
    private $licenseValidTo;
    private $plate;
    private $color;
    private $comments;
    
    public function __construct($vehicleId=0, $type="", $model="", $manufucturer=""
            , $licensePublishedDate=NULL, $licenseValidTo=NULL, $plate=""
            , $color="", $comments="") {
        $this->vehicleId = $vehicleId;
        $this->type = $type;
        $this->model = $model;
        $this->manufucturer = $manufucturer;
        $this->licensePublishedDate = $licensePublishedDate;
        $this->licenseValidTo = $licenseValidTo;
        $this->plate = $plate;
        $this->color = $color;
        $this->comments = $comments;
    }
    public function getVehicleId() {
        return $this->vehicleId;
    }

    public function getType() {
        return $this->type;
    }

    public function getModel() {
        return $this->model;
    }

    public function getManufucturer() {
        return $this->manufucturer;
    }

    public function getLicensePublishedDate() {
        return $this->licensePublishedDate;
    }

    public function getLicenseValidTo() {
        return $this->licenseValidTo;
    }

    public function getPlate() {
        return $this->plate;
    }

    public function getColor() {
        return $this->color;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setVehicleId($vehicleId) {
        $this->vehicleId = $vehicleId;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setManufucturer($manufucturer) {
        $this->manufucturer = $manufucturer;
    }

    public function setLicensePublishedDate($licensePublishedDate) {
        $this->licensePublishedDate = $licensePublishedDate;
    }

    public function setLicenseValidTo($licenseValidTo) {
        $this->licenseValidTo = $licenseValidTo;
    }

    public function setPlate($plate) {
        $this->plate = $plate;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }


}
