<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MembershipController
 *
 * @author mahmoud
 */
class MembershipController extends CI_Controller{
    private $c=NULL;
    public function __construct() {
        parent::__construct();
        $this->c=&get_instance();
    }
    public function configuration(){
        $conf=array(
            array(
                'field'=>'period',
                'label'=>'lang:Period',
                'rules'=>'required|xss_clean|numeric'
            ),
            array(
                'field'=>'fees',
                'label'=>'lang:Fees',
                'rules'=>'required|xss_clean|integer'
            ),
            array(
                'field'=>'currency',
                'label'=>'lang:Currency',
                'rules'=>'required|xss_clean'
            )
        );
        return $conf;
    }
    public function insert() {
        /*
         * verify session
         */
//        if ($this->session->auth_identifiers) {
            /*
             * check action
             */
            if ($this->input->post("save")) {
                $config = $this->configuration();
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    print 'Fail';
                } else {
                    /*
                     * insert data to database
                     */
                    $membership=new Membership();
                            
                    $membership->setMembershipId($this->input->post('membership_id'));
                    $membership->setPeriod($this->input->post('period'));
                    $membership->setFees($this->input->post('fees'));
                    $membership->setCurrency($this->input->post('currency'));
                    //insert data 
                    $resul=$this->Membership_model->insert($membership);
                    ($resul != 1 ? error_log($resul): NULL);
                    //insert error and other information to log file
                    print 'success';
                }
            }
//        }
    }

     public function edit() {
        /*
         * verify session
         */
//        if ($this->session->auth_identifiers) {
            /*
             * check action
             */
            if ($this->input->post("edit")) {
                $config = $this->configuration();
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    print 'Fail';
                } else {
                    /*
                     * insert data to database
                     */
                    $membership=new Membership();
                            
                    $membership->setMembershipId($this->input->post('membership_id'));
                    $membership->setPeriod($this->input->post('period'));
                    $membership->setFees($this->input->post('fees'));
                    $membership->setCurrency($this->input->post('currency'));
                    //insert data 
                    $resul=$this->Membership_model->insert($membership);
                    ($resul != 1 ? error_log($resul): NULL);
                    //insert error and other information to log file
                    print 'success';
                }
            }
//        }
    }
     public function delete() {
        /*
         * verify session
         */
//        if ($this->session->auth_identifiers) {
            /*
             * check action
             */
            if ($this->input->post("delete")) {
                $config = $this->configuration();
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    print 'Fail';
                } else {
                    /*
                     * insert data to database
                     */
                    $membership=new Membership();
                            
                    $membership->setMembershipId($this->input->post('membership_id'));
                    $membership->setPeriod($this->input->post('period'));
                    $membership->setFees($this->input->post('fees'));
                    $membership->setCurrency($this->input->post('currency'));
                    //insert data 
                    $resul=$this->Membership_model->insert($membership);
                    ($resul != 1 ? error_log($resul): NULL);
                    //insert error and other information to log file
                    print 'success';
                }
            }
//        }
    }
}
