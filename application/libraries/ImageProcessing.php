<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageProcessing
 *
 * @author mahmoud
 */
class ImageProcessing {

    public function cropImage($path) {
        print '<a href="' . $path . '">Path</a>';
        $im = imagecreatefrompng($path);
        $hieght = imagesx($im);
        $width = imagesy($im);
        $cropHeight = (int) ($hieght - 250) / 2;
        $cropWidth = (int) ($width - 250) / 2;
        print "Size " . $size;
        $im2 = imagecrop($im, ['x' => $cropHeight, 'y' => $cropWidth, 'width' => 250, 'height' => 250]);
        if ($im2 !== FALSE) {
            imagepng($im2, 'example-cropped.png');
            print "Writting Image";
        } else {
            print "Cant create images";
        }
    }

    public function uploadImage($path, $name) {
        $flag = TRUE;
        $config['upload_path'] = base_url() . 'images/';
        print 'Upload Path ' . $config['upload_path'];
        print 'Image File link ' . $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_nane'] = $name . "_" . $this->getLastProductId() . '.jpg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }

        return $flag;
    }

}
