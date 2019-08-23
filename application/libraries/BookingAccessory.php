<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of BookingAccessory
 *
 * @author mahmoud
 */
class BookingAccessory {
    private $id;
    private $accessId;
    private $count;
    private $bookingId;
    function __construct($id=0, $accessId=0, $count=0, $bookingId=0) {
        $this->id = $id;
        $this->accessId = $accessId;
        $this->count = $count;
        $this->bookingId = $bookingId;
    }
    function getId() {
        return $this->id;
    }

    function getAccessId() {
        return $this->accessId;
    }

    function getCount() {
        return $this->count;
    }

    function getBookingId() {
        return $this->bookingId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAccessId($accessId) {
        $this->accessId = $accessId;
    }

    function setCount($count) {
        $this->count = $count;
    }

    function setBookingId($bookingId) {
        $this->bookingId = $bookingId;
    }

}
