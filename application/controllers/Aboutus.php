<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aboutus
 *
 * @author mahmoud
 */
class Aboutus extends CI_Controller {

    private $C = NULL;

    public function __construct() {
        parent::__construct();
        $this->C = &get_instance();
    }

    public function index() {
        $this->smarty->assign("site_url", site_url());

        $this->smarty->view('aboutus.tpl', array());
    }

}
