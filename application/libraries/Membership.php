<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Membership
 *
 * @author mahmoud
 */
class Membership {
    private $membershipId;
    private $period;
    private $fees;
    private $currency;
    
    public function __construct($membershipId=0, $period=0, $fees=0, $currency="") {
        $this->membershipId = $membershipId;
        $this->period = $period;
        $this->fees = $fees;
        $this->currency = $currency;
    }
    public function getMembershipId() {
        return $this->membershipId;
    }

    public function getPeriod() {
        return $this->period;
    }

    public function getFees() {
        return $this->fees;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setMembershipId($membershipId) {
        $this->membershipId = $membershipId;
    }

    public function setPeriod($period) {
        $this->period = $period;
    }

    public function setFees($fees) {
        $this->fees = $fees;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }


}
