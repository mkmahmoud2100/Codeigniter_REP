<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of PassengerOnBoard
 *
 * @author mahmoud
 */
class PassengerOnBoard {

    private $passengerOnBoardId;
    private $adult;
    private $kids;
    private $infant;
    function __construct($passengerOnBoardId=0, $adult=0, $kids=0, $infant=0) {
        $this->passengerOnBoardId = $passengerOnBoardId;
        $this->adult = $adult;
        $this->kids = $kids;
        $this->infant = $infant;
    }
    function getPassengerOnBoardId() {
        return $this->passengerOnBoardId;
    }

    function getAdult() {
        return $this->adult;
    }

    function getKids() {
        return $this->kids;
    }

    function getInfant() {
        return $this->infant;
    }

    function setPassengerOnBoardId($passengerOnBoardId) {
        $this->passengerOnBoardId = $passengerOnBoardId;
    }

    function setAdult($adult) {
        $this->adult = $adult;
    }

    function setKids($kids) {
        $this->kids = $kids;
    }

    function setInfant($infant) {
        $this->infant = $infant;
    }

}
