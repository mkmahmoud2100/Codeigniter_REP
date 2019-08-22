<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accessories_controller
 *
 * @author mahmoud
 */
class Accessories extends CI_Controller{
    private $C=NULL;
    public function __construct() {
        parent::__construct();
        $this->C=&get_instance();
    }
    public function index(){
        $this->smarty->assign("site_url",  site_url());
        $currency=  $this->Currency_model->viewAll();
//        echo json_encode($currency);
        $this->smarty->assign("currencies",$currency);
        
        $this->smarty->view('accessories.tpl',array());
    }
    public function viewAll(){
        
    }
    public function viewById($id){
        $data= $this->Accessories_model->viewById($id);
        $array= json_encode($data);
        //print_r($array);
        echo $array;
    }
}
