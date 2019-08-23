<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accessories
 *
 * @author mahmoud
 */
class Accessories_lib {

    private $accessoryId;
    private $title;
    private $fees;
    private $currencyISO;
    private $imageId;

    public function __construct($accessoryId = 0, $title = "", $fees = 0, $currencyISO = "", $imageId = 0) {
        $this->accessoryId = $accessoryId;
        $this->title = $title;
        $this->fees = $fees;
        $this->currencyISO = $currencyISO;
        $this->imageId = $imageId;
    }

    public function getAccessoryId() {
        return $this->accessoryId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getFees() {
        return $this->fees;
    }

    public function getCurrencyISO() {
        return $this->currencyISO;
    }

    public function getImageId() {
        return $this->imageId;
    }

    public function setAccessoryId($accessoryId) {
        $this->accessoryId = $accessoryId;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setFees($fees) {
        $this->fees = $fees;
    }

    public function setCurrencyISO($currencyISO) {
        $this->currencyISO = $currencyISO;
    }

    public function setImageId($imageId) {
        $this->imageId = $imageId;
    }

}
