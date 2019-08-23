<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookingSchedule
 *
 * @author mahmoud
 */
class Schedule_lib {

    private $scheduleId;
    private $flightNo;
    private $returnFlightNo;
    private $departDate;
    private $departTime;
    private $arrivalDate;
    private $arrivalTime;
    private $flag;

    function __construct($scheduleId = 0, $flightNo = "", $returnFlightNo = "", $departDate = "", $departTime = "", $arrivalDate = "", $arrivalTime = "", $flag = "") {
        $this->scheduleId = $scheduleId;
        $this->flightNo = $flightNo;
        $this->returnFlightNo = $returnFlightNo;
        $this->departDate = $departDate;
        $this->departTime = $departTime;
        $this->arrivalDate = $arrivalDate;
        $this->arrivalTime = $arrivalTime;
        $this->flag = $flag;
    }
    function getScheduleId() {
        return $this->scheduleId;
    }

    function getFlightNo() {
        return $this->flightNo;
    }

    function getReturnFlightNo() {
        return $this->returnFlightNo;
    }

    function getDepartDate() {
        return $this->departDate;
    }

    function getDepartTime() {
        return $this->departTime;
    }

    function getArrivalDate() {
        return $this->arrivalDate;
    }

    function getArrivalTime() {
        return $this->arrivalTime;
    }

    function getFlag() {
        return $this->flag;
    }

    function setScheduleId($scheduleId) {
        $this->scheduleId = $scheduleId;
    }

    function setFlightNo($flightNo) {
        $this->flightNo = $flightNo;
    }

    function setReturnFlightNo($returnFlightNo) {
        $this->returnFlightNo = $returnFlightNo;
    }

    function setDepartDate($departDate) {
        $this->departDate = $departDate;
    }

    function setDepartTime($departTime) {
        $this->departTime = $departTime;
    }

    function setArrivalDate($arrivalDate) {
        $this->arrivalDate = $arrivalDate;
    }

    function setArrivalTime($arrivalTime) {
        $this->arrivalTime = $arrivalTime;
    }

    function setFlag($flag) {
        $this->flag = $flag;
    }

}
