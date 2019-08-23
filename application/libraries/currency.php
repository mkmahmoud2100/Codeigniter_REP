<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of currency
 *
 * @author mahmoud
 */
class currency {
    private $iso;
    private $name;
    private $symbol;
    public function __construct($iso="", $name="", $symbol="") {
        $this->iso = $iso;
        $this->name = $name;
        $this->symbol = $symbol;
    }
    public function getIso() {
        return $this->iso;
    }

    public function getName() {
        return $this->name;
    }

    public function getSymbol() {
        return $this->symbol;
    }

    public function setIso($iso) {
        $this->iso = $iso;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSymbol($symbol) {
        $this->symbol = $symbol;
    }


}
