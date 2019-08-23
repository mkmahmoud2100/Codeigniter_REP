<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Route
 *
 * @author mahmoud
 */
class Route_lib {

    private $routeId;
    private $fromAddress;
    private $toAddress;
    private $address;
    private $estimatedTime;
    private $distance;
    private $fees;
    private $currencyISO;
    private $comments;

    public function __construct($routeId = 0, $fromAddress = 0, $toAddress = 0
    ,$address="", $estimatedTime = 0, $distance = 0, $fees = 0, $currencyISO = 0, $comments = "") {
        $this->routeId = $routeId;
        $this->fromAddress = $fromAddress;
        $this->toAddress = $toAddress;
        $this->address=$address;
        $this->estimatedTime = $estimatedTime;
        $this->distance = $distance;
        $this->fees = $fees;
        $this->currencyISO = $currencyISO;
        $this->comments = $comments;
    }

    public function getRouteId() {
        return $this->routeId;
    }

    public function getFromAddress() {
        return $this->fromAddress;
    }

    public function getToAddress() {
        return $this->toAddress;
    }

    public function getEstimatedTime() {
        return $this->estimatedTime;
    }

    public function setDistance($distance = 0) {
        $this->distance = $distance;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getFees() {
        return $this->fees;
    }

    public function getCurrencyISO() {
        return $this->currencyISO;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setRouteId($routeId) {
        $this->routeId = $routeId;
    }

    public function setFromAddress($fromAddress) {
        $this->fromAddress = $fromAddress;
    }

    public function setToAddress($toAddress) {
        $this->toAddress = $toAddress;
    }

    public function setEstimatedTime($estimatedTime) {
        $this->estimatedTime = $estimatedTime;
    }

    public function setFees($fees) {
        $this->fees = $fees;
    }

    public function setCurrencyISO($currencyISO) {
        $this->currencyISO = $currencyISO;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }
    function getAddress() {
        return $this->address;
    }

    function setAddress($address) {
        $this->address = $address;
    }


}
