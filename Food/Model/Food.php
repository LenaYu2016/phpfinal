<?php

class Food
{
 private $Id,$Catagory,$Price,$Instock,$Description,$Mark,$Name,$Image,
     $Discount_price,$Viewed_times,$Sales_volume;
    public function __construct($Catagory,$Price,$Instock,$Description,$Mark,$Name,$Image,
                                $Discount_price,$Viewed_times,$Sales_volume)
    {
        $this->Catagory=$Catagory;
        $this->Price=$Price;
        $this->Instock=$Instock;
        $this->Description=$Description;
        $this->Mark=$Mark;
        $this->Name=$Name;
        $this->Image=$Image;
        $this->Discount_price=$Discount_price;
        $this->Viewed_times=$Viewed_times;
        $this->Sales_volume=$Sales_volume;
    }
    public function setCatagory($Catagory){
        $this->Catagory=$Catagory;
    }
    public function setId($Id){
        $this->Id=$Id;
    }
    public function setPrice($Price){
        $this->Price=$Price;
    }
    public function setInstock($Instock){
        $this->Instock=$Instock;
    }
    public function setDescription($Description){
        $this->Description=$Description;
    }
    public function setMark($Mark){
        $this->Mark=$Mark;
    }
    public function setName($Name){
        $this->Name=$Name;
    }
    public function setImage($Image){
        $this->Image=$Image;
    }
    public function setDiscountPrice($Discount_price){
        $this->Discount_price=$Discount_price;
    }
    public function setViewedTimes($Viewed_times){
        $this->Viewed_times=$Viewed_times;
    }
    public function setSalesVolume($Sales_volume){
        $this->Sales_volume=$Sales_volume;
    }
    public function getId(){
    return $this->Id;
    }
    public function getCatagory(){
        return $this->Catagory;
    }
    public function getPrice(){
        return $this->Price;
    }
    public function getInstock(){
        return $this->Instock;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function getMark(){
        return $this->Mark;
    }
    public function getName(){
        return $this->Name;
    }
    public function getImage(){
        return $this->Image;
    }
    public function getDiscountPrice(){
        return $this->Discount_price;
    }
    public function getViewedTimes(){
        return $this->Viewed_times;
    }
    public function getSalesVolume(){
        return $this->Sales_volume;
    }
}