<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Driver
 *
 * @author mahmoud
 */
class Driver {

    private $driverId;
    private $name;
    private $surname;
    private $licenseType;
    private $licensePublishedDate;
    private $licenseValidTo;
    private $addressId;
    private $age;
    private $bloodGroup;
    private $behavior;
    private $healthStatus;
    private $banned;
    private $comments;

    public function __construct($driverId = 0, $name = "", $surname = "", $licenseType = ""
    , $licensePublishedDate = NULL, $licenseValidTo = NULL, $addressId = 0, $age = 0
    , $bloodGroup = "", $behavior = "", $healthStatus = "", $banned = false
    , $comments = "") {
        $this->driverId = $driverId;
        $this->name = $name;
        $this->surname = $surname;
        $this->licenseType = $licenseType;
        $this->licensePublishedDate = $licensePublishedDate;
        $this->licenseValidTo = $licenseValidTo;
        $this->addressId = $addressId;
        $this->age = $age;
        $this->bloodGroup = $bloodGroup;
        $this->behavior = $behavior;
        $this->healthStatus = $healthStatus;
        $this->banned = $banned;
        $this->comments = $comments;
    }

    public function getDriverId() {
        return $this->driverId;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getLicenseType() {
        return $this->licenseType;
    }

    public function getLicensePublishedDate() {
        return $this->licensePublishedDate;
    }

    public function getLicenseValidTo() {
        return $this->licenseValidTo;
    }

    public function getAddressId() {
        return $this->addressId;
    }

    public function getAge() {
        return $this->age;
    }

    public function getBloodGroup() {
        return $this->bloodGroup;
    }

    public function getBehavior() {
        return $this->behavior;
    }

    public function getHealthStatus() {
        return $this->healthStatus;
    }

    public function getBanned() {
        return $this->banned;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setDriverId($driverId) {
        $this->driverId = $driverId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setLicenseType($licenseType) {
        $this->licenseType = $licenseType;
    }

    public function setLicensePublishedDate($licensePublishedDate) {
        $this->licensePublishedDate = $licensePublishedDate;
    }

    public function setLicenseValidTo($licenseValidTo) {
        $this->licenseValidTo = $licenseValidTo;
    }

    public function setAddressId($addressId) {
        $this->addressId = $addressId;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setBloodGroup($bloodGroup) {
        $this->bloodGroup = $bloodGroup;
    }

    public function setBehavior($behavior) {
        $this->behavior = $behavior;
    }

    public function setHealthStatus($healthStatus) {
        $this->healthStatus = $healthStatus;
    }

    public function setBanned($banned) {
        $this->banned = $banned;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

}
