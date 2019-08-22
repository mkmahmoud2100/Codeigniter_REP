<?php

defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact_us
 *
 * @author mahmoud
 */
class Contact_us extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function configuration() {
        $conf = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required|min_length[10]|max_length[50]'
            ),
            array(
                'field' => 'email'
                , 'label' => 'email'
                , 'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'message',
                'label' => 'message',
                'rules' => 'required|min_length[10]|max_length[250]'
            ),
            array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => 'required|max_length[50]'
            )
        );
        return $conf;
    }

    public function index() {
        $this->smarty->assign("site_url", site_url());
//        $this->smarty->assign("header", "bizimle iletişime geçin");
//        $this->smarty->assign("name", $this->lang->line("Fullname"));
//        $this->smarty->assign("email", $this->lang->line("Email"));
//        $this->smarty->assign("subject", $this->lang->line("Subject"));
//        $this->smarty->assign("message", $this->lang->line("Message"));
//        $this->smarty->assign("validation_errors", $this->form_validation->error_array());
        $this->smarty->view("contact.tpl");
    }

    public function sendEmail() {
//        print 'Send Email';
        if ($this->input->post("submit")) {
//            print 'Submited';
            $conf = $this->configuration();
            $this->form_validation->set_rules($conf);
            if ($this->form_validation->run() === FALSE) {
//                print 'Error';
                $this->smarty->assign("name", set_value("name"));
                $this->smarty->assign("email", set_value("email"));
                $this->smarty->assign("subject", set_value("subject"));
                $this->smarty->assign("message", set_value("message"));
                $this->smarty->assign("validation_errors", $this->form_validation->error_array());
//                print_r($this->form_validation->error_array());
                $this->smarty->view("contact.tpl");
            } else {
//                print "Valid data";
                $to_email = 'info@cyprotransfer.com';

////                $this->security->xss_clean(
                $name = $this->security->xss_clean($this->input->post("name"));
                $email = $this->security->xss_clean($this->input->post("email"));
                $subject = $this->security->xss_clean($this->input->post("subject"));
                $message = $this->security->xss_clean($this->input->post("message"));
//                print $message;
                $config['protocol'] = 'SMTP';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['smtp_host'] = 'mail.cyprotransfer.com';
                $config['smtp_user'] = 'customer@cyprotransfer.com';
                $config['smtp_pass'] = 'fsXstxOqZQ$a';
                $config['smtp_port'] = '587';
                $this->email->initialize($config);
                $this->email->from($name);
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message . "\r\n" . $email . " \r\n");
////             You need to pass FALSE while sending in order for the email data
//// to not be cleared - if that happens, print_debugger() would have
//// nothing to output.
                if ($this->email->send(FALSE)) {
                    
                } else {
                   // print $this->email->print_debugger(array('headers'));
                    $this->smarty->assign("name", set_value("name"));
                    $this->smarty->assign("email", set_value("email"));
                    $this->smarty->assign("subject", set_value("subject"));
                    $this->smarty->assign("message", set_value("message"));
                    $this->smarty->assign("validation_errors", $this->form_validation->error_array());
//                print_r($this->form_validation->error_array());
                    $this->smarty->view("contact.tpl");
                }
////            Will only print the email headers, excluding the message subject and body
                // print 'OK';
                redirect(base_url() . 'index.php');
            }
        }
    }

}
