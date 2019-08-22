<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MemberController
 *
 * @author mahmoud
 */
class MemberController extends CI_Controller{
    private  $c=NULL;
    public function __construct() {
        parent::__construct();
        $this->c=&get_instance();
    }
    
    public function index(){
         $result=$this->Member_model->viewAll();
         print_r($result);
    }
    public function configuration(){
        $conf=array(
            array(
                'field'=>'name',
                'label'=>'lang:Name',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'surname',
                'label'=>'lang:Surname',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'nickname',
                'label'=>'lang:Nickname',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'address',
                'label'=>'lang:Address',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'email',
                'label'=>'lang:Email',
                'rules'=>'required|valid_email|xss_clean'
            ),
            array(
                'field'=>'confirm_email',
                'label'=>'lang:Confirm Email',
                'rules'=>'required|valid_email|xss_clean'
            ),
            array(
                'field'=>'mobile',
                'label'=>'lang:Mobile',
                'rules'=>'required|numeric|xss_clean'
            ),
            array(
                'field'=>'phone',
                'label'=>'lang:Phone',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'qualification',
                'label'=>'lang:Qualification',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'major',
                'label'=>'lang:Major',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'interest',
                'label'=>'lang:Interest',
                'rules'=>'required|xss_clean'
            ),
            array(
                'field'=>'password',
                'label'=>'lang:Password',
                'rules'=>'required|trim|xss_clean'
            ),
            array(
                'field'=>'confirm-password',
                'label'=>'lang:Confirm password',
                'rules'=>'required|trim|xss_clean'
            ),
            array(
                'field'=>'secret',
                'label'=>'lang:Secret',
                'rules'=>'required|trim|xss_clean'
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
                 $member=new Member();
                 $member->setMemberId($this->input->post('member_id'));
                 $member->setName($this->input->post('name'));
                 $member->setSurname($this->input->post('surname'));
                 $member->setNeckname($this->input->post('nickname'));
                 $member->setAddress($this->input->post('address'));
                 $member->setEmail($this->input->post('email'));
                 $member->setMobile($this->input->post('mobile'));
                 $member->setPhone($this->input->post('phone'));
                 $member->setQualification($this->input->post('qualification'));
                 $member->setMajor($this->input->post('major'));
                 $member->setInterest($this->input->post('interest'));
                 $member->setEvaluation($this->input->post('evaluation'));
                 $member->setLastLogin($this->input->post('last_login'));
                 $member->setLastAvailable($this->input->post('last_available'));
                 $member->setBanned($this->input->post('banned'));
                 
                 //insert data 
                    $resul=$this->Member_model->insert($member);
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
                 $member=new Member();
                 $member->setMemberId($this->input->post('member_id'));
                 $member->setName($this->input->post('name'));
                 $member->setSurname($this->input->post('surname'));
                 $member->setNeckname($this->input->post('nickname'));
                 $member->setAddress($this->input->post('address'));
                 $member->setEmail($this->input->post('email'));
                 $member->setMobile($this->input->post('mobile'));
                 $member->setPhone($this->input->post('phone'));
                 $member->setQualification($this->input->post('qualification'));
                 $member->setMajor($this->input->post('major'));
                 $member->setInterest($this->input->post('interest'));
                 $member->setEvaluation($this->input->post('evaluation'));
                 $member->setLastLogin($this->input->post('last_login'));
                 $member->setLastAvailable($this->input->post('last_available'));
                 $member->setBanned($this->input->post('banned'));
                 
                 //insert data 
                    $resul=$this->Member_model->insert($member);
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
                 $member=new Member();
                 $member->setMemberId($this->input->post('member_id'));
                 $member->setName($this->input->post('name'));
                 $member->setSurname($this->input->post('surname'));
                 $member->setNeckname($this->input->post('nickname'));
                 $member->setAddress($this->input->post('address'));
                 $member->setEmail($this->input->post('email'));
                 $member->setMobile($this->input->post('mobile'));
                 $member->setPhone($this->input->post('phone'));
                 $member->setQualification($this->input->post('qualification'));
                 $member->setMajor($this->input->post('major'));
                 $member->setInterest($this->input->post('interest'));
                 $member->setEvaluation($this->input->post('evaluation'));
                 $member->setLastLogin($this->input->post('last_login'));
                 $member->setLastAvailable($this->input->post('last_available'));
                 $member->setBanned($this->input->post('banned'));
                 
                 //insert data 
                    $resul=$this->Member_model->insert($member);
                    ($resul != 1 ? error_log($resul): NULL);
                    //insert error and other information to log file
                    print 'success';
                }
            }
//        }
    }
    
}
