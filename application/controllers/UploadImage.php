<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadImage
 *
 * @author mahmoud
 */
class UploadImage {

    function __construct() {
        //  chmod($base_url . '/images', 0777);

        $config['upload_path'] = '';

        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = '' . '.jpg';
        $this->upload->initialize($config);
    }

    private function upload() {
        //ajax call
        (!$this->upload->do_upload('userfile') ? $error = $this->upload->display_errors() : 1);
        $data = json_encode($error);
        echo $data;
    }

}
