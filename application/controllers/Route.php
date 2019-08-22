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
class Route extends CI_Controller {

 
    private $C = NULL;

    public function __construct() {
        parent::__construct();
        $this->C = &get_instance();
    }

    public function index() {
       
        
    }
    

}
