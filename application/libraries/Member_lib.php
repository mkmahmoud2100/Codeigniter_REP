<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Member
 *
 * @author mahmoud
 */
class Member_lib {
    private $memberId;
    private $name;
    private $surname;
    private $neckname;
    private $address;
    private $email;
    private $mobile;
    private $phone;
    private $qualification;
    private $major;
    private $interest;
    private $evaluation;
    private $lastLogin;
    private $membershipId;
    private $lastAvailable;
    private $banned;
    public function __construct($memberId=0, $name="", $surname="", $neckname=""
            , $address="", $email="", $mobile="", $phone="", $qualification=""
            , $major="", $interest="", $evaluation="", $lastLogin=NULL
            , $membershipId=0, $lastAvailable=NULL, $banned=0) {
        $this->memberId = $memberId;
        $this->name = $name;
        $this->surname = $surname;
        $this->neckname = $neckname;
        $this->address = $address;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->phone = $phone;
        $this->qualification = $qualification;
        $this->major = $major;
        $this->interest = $interest;
        $this->evaluation = $evaluation;
        $this->lastLogin = $lastLogin;
        $this->membershipId = $membershipId;
        $this->lastAvailable = $lastAvailable;
        $this->banned = $banned;
    }
    public function getMemberId() {
        return $this->memberId;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getNeckname() {
        return $this->neckname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getQualification() {
        return $this->qualification;
    }

    public function getMajor() {
        return $this->major;
    }

    public function getInterest() {
        return $this->interest;
    }

    public function getEvaluation() {
        return $this->evaluation;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function getMembershipId() {
        return $this->membershipId;
    }

    public function getLastAvailable() {
        return $this->lastAvailable;
    }

    public function getBanned() {
        return $this->banned;
    }

    public function setMemberId($memberId) {
        $this->memberId = $memberId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setNeckname($neckname) {
        $this->neckname = $neckname;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setQualification($qualification) {
        $this->qualification = $qualification;
    }

    public function setMajor($major) {
        $this->major = $major;
    }

    public function setInterest($interest) {
        $this->interest = $interest;
    }

    public function setEvaluation($evaluation) {
        $this->evaluation = $evaluation;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    public function setMembershipId($membershipId) {
        $this->membershipId = $membershipId;
    }

    public function setLastAvailable($lastAvailable) {
        $this->lastAvailable = $lastAvailable;
    }

    public function setBanned($banned) {
        $this->banned = $banned;
    }


    
}
