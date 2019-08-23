<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fees
 *
 * @author mahmoud
 */
class Fees {
    private $feesId;
    private $fees;
    private $iso;
    public function __construct($feesId=0, $fees=0, $iso="") {
        $this->feesId = $feesId;
        $this->fees = $fees;
        $this->iso = $iso;
    }
    public function getFeesId() {
        return $this->feesId;
    }

    public function getFees() {
        return $this->fees;
    }

    public function getIso() {
        return $this->iso;
    }

    public function setFeesId($feesId) {
        $this->feesId = $feesId;
    }

    public function setFees($fees) {
        $this->fees = $fees;
    }

    public function setIso($iso) {
        $this->iso = $iso;
    }


    
}
