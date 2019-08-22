<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AJAXSearch
 *
 * @author mahmoud
 */
class Ajax_Search extends CI_Controller {

    private $C = null;

    public function __construct() {
        parent::__construct();
        $this->C = &get_instance();
        $this->output->enable_profiler(TRUE);
    }

    public function search($address) {
        if ($this->input->post('from-address')) {
            $result = $this->ajax_Search_model->search_database($address);
            echo json_encode($result);
        }
    }

}
