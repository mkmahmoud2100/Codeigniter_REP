<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Address
 *
 * @author mahmoud
 */

class Route_address_controller extends CI_Controller{
    private $c=NULL;
    public function __construct() {
        parent::__construct();
        $this->c=&get_instance();
    }
    public function index(){
        $this->smarty->assign("site_url", site_url());
        $cities=  $this->City_model->viewAll();
        $currency=  $this->Currency_model->viewAll();
//        echo json_encode($currency);
        $this->smarty->assign("currencies",$currency);
        $this->smarty->assign("cities",$cities);
        $this->smarty->view("route_address.tpl",array());
    }
     public function  viewByAddress($init,$dest){
       $array=  $this->Route_model->viewByAddress($init,$dest);
       $data=  json_encode($array);
       echo $data;
   }
}