<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booking
 *
 * @author mahmoud
 */
class Booking_lib {

    private $bookingId;
    private $bookingDate;
    private $lastUpdate;
    private $commited;
    private $lateness;
    private $routeId;
    private $scheduleId;
    private $passengerId;
    private $passengersOnboardId;
    private $bookingAccessoriesId;
    private $memberId;
    private $typeId;
    private $banned;
    private $flag;
    private $total;

    function __construct($bookingId = 0, $bookingDate = "", $lastUpdate = "", 
            $commited = 0, $lateness = 0, $routeId = 0, $scheduleId = 0,
            $passengerId = 0, $passengersOnboardId = 0,
            $bookingAccessoriesId = 0, $memberId = 0, 
            $typeId = '', $banned = 0, $flag = 0, $total = 0) {
        $this->bookingId = $bookingId;
        $this->bookingDate = $bookingDate;
        $this->lastUpdate = $lastUpdate;
        $this->commited = $commited;
        $this->lateness = $lateness;
        $this->routeId = $routeId;
        $this->scheduleId = $scheduleId;
        $this->passengerId = $passengerId;
        $this->$passengersOnboardId = $passengersOnboardId;
        $this->bookingAccessoriesId = $bookingAccessoriesId;
        $this->memberId = $memberId;
        $this->typeId = $typeId;
        $this->banned = $banned;
        $this->flag = $flag;
        $this->total = $total;
    }
    function getBookingId() {
        return $this->bookingId;
    }

    function getBookingDate() {
        return $this->bookingDate;
    }

    function getLastUpdate() {
        return $this->lastUpdate;
    }

    function getCommited() {
        return $this->commited;
    }

    function getLateness() {
        return $this->lateness;
    }

    function getRouteId() {
        return $this->routeId;
    }

    function getScheduleId() {
        return $this->scheduleId;
    }

    function getPassengerId() {
        return $this->passengerId;
    }

    function getPassengersOnboardId() {
        return $this->passengersOnboardId;
    }

    function getBookingAccessoriesId() {
        return $this->bookingAccessoriesId;
    }

    function getMemberId() {
        return $this->memberId;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getBanned() {
        return $this->banned;
    }

    function getFlag() {
        return $this->flag;
    }

    function getTotal() {
        return $this->total;
    }

    function setBookingId($bookingId) {
        $this->bookingId = $bookingId;
    }

    function setBookingDate($bookingDate) {
        $this->bookingDate = $bookingDate;
    }

    function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }

    function setCommited($commited) {
        $this->commited = $commited;
    }

    function setLateness($lateness) {
        $this->lateness = $lateness;
    }

    function setRouteId($routeId) {
        $this->routeId = $routeId;
    }

    function setScheduleId($scheduleId) {
        $this->scheduleId = $scheduleId;
    }

    function setPassengerId($passengerId) {
        $this->passengerId = $passengerId;
    }

    function setPassengersOnboardId($passengersOnboardId) {
        $this->passengersOnboardId = $passengersOnboardId;
    }

    function setBookingAccessoriesId($bookingAccessoriesId) {
        $this->bookingAccessoriesId = $bookingAccessoriesId;
    }

    function setMemberId($memberId) {
        $this->memberId = $memberId;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setBanned($banned) {
        $this->banned = $banned;
    }

    function setFlag($flag) {
        $this->flag = $flag;
    }

    function setTotal($total) {
        $this->total = $total;
    }


}
