<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Video
 *
 * @author mahmoud
 */
class Image {

    private $imageId;
    private $title;
    private $sizeOnDisk;
    private $categoryId;
    private $publishedDate;
    public function __construct($imageId=0, $title="", $sizeOnDisk=0, $categoryId=0, $publishedDate=NULL) {
        $this->imageId = $imageId;
        $this->title = $title;
        $this->sizeOnDisk = $sizeOnDisk;
        $this->categoryId = $categoryId;
        $this->publishedDate = $publishedDate;
    }
    public function getImageId() {
        return $this->imageId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSizeOnDisk() {
        return $this->sizeOnDisk;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function getPublishedDate() {
        return $this->publishedDate;
    }

    public function setImageId($imageId) {
        $this->imageId = $imageId;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setSizeOnDisk($sizeOnDisk) {
        $this->sizeOnDisk = $sizeOnDisk;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function setPublishedDate($publishedDate) {
        $this->publishedDate = $publishedDate;
    }


}
