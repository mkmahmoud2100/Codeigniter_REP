<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author mahmoud
 */
class Home extends CI_Controller {

    private $c = NULL;

    public function __construct() {
        parent::__construct();
        $this->c = &get_instance();
    }

    public function index() {

//        $routes = $this->Route_model->viewAll();
//        print_r($routes);
//        $addresses = $this->RouteAddress_model->viewAll();
//        $accessories=  $this->Accessories_model->viewAll();
//        $this->smarty->assign("site_url", site_url());
//        $this->smarty->assign("addresses", $addresses);
//        $this->smarty->assign("accessories",$accessories);
          $this->smarty->assign("site_url",  site_url());
        $this->smarty->view('home.tpl', array());
    }

    public function viewRouteByAddresses($init, $dest) {
//        $route = $this->Route_model->viewByAddress($init, $dest);
//            $data = json_encode($route);
//            echo $data;
    }

}
