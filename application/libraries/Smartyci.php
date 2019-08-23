<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Smartyci
 *
 * @author mahmoud
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( 'application/third_party/smarty/libs/Smarty.class.php' );

class Smartyci extends Smarty {

    public function __construct() {
        parent::__construct();

        $config = & get_config();

        //$this->caching = 1;
        $this->setTemplateDir(APPPATH . 'views/templates');
        $this->setCompileDir(APPPATH . 'views/templates_c');
        $this->setConfigDir(APPPATH . 'third_party/Smarty/configs');
        $this->setCacheDir(APPPATH . 'cache');
    }

    function view($template, $data = array(), $return = FALSE) {
//        if (!$this->debug()) {
//            $this->error_reporting = false;
//        }
//        $this->error_unassigned = FALSE;
        foreach ($data as $key => $value) {
            $this->assign($key, $value);
        }
        if ($return == FALSE) {
            $CI = &get_instance();
            if (method_exists($CI, 'set_output')) {
                $CI->output->set_output($this->fetch($template));
            } else {
                $CI->output->final_output = $this->fetch($template);
            }
            return;
        } else {
            return $this->fetch($template);
        }
    }
     function empty_view($template) {
//    
        $this->display($template);
    }

//    function setDebug($debug = true) {
//        $this->debug = $debug;
//    }

    //if specified template is cached then display template and exit, otherwise, do nothing.
    public function useCached($tpl, $cacheId = null) {
        if ($this->isCached($tpl, $cacheId)) {
            $this->display($tpl, $cacheId);
            exit();
        }
    }

}
