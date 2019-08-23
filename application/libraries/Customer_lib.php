<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Customer
 *
 * @author mahmoud
 */
class Customer_lib {
    private $customerId;
    private $name;
    private $surname;
    private $email;
    private $mobile;
    private $phone;
    private $address;
    function __construct($customerId=0, $name='', $surname='', $email='', $mobile='', $phone='', $address='') {
        $this->customerId = $customerId;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->phone = $phone;
        $this->address = $address;
    }
    function getCustomerId() {
        return $this->customerId;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getPhone() {
        return $this->phone;
    }

    function getAddress() {
        return $this->address;
    }

    function setCustomerId($customerId) {
        $this->customerId = $customerId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setAddress($address) {
        $this->address = $address;
    }

}
