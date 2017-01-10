<?php


class Shoppingcart
{
  private $Id,$User_id,$Food_id,$Quantity,$Size;
    public function __construct($User_id,$Food_id,$Quantity,$Size)
    {
        $this->User_id=$User_id;
        $this->Food_id=$Food_id;
        $this->Quantity=$Quantity;
        $this->Size=$Size;
    }
    public function setId($Id){
        $this->Id=$Id;
    }
    public function setUserId($User_id){
        $this->User_id=$User_id;
    }
    public function setFoodId($Food_id){
        $this->Food_id=$Food_id;
    }
    public function setQuantity($Quantity){
        $this->Quantity=$Quantity;
    }
    public function setSize($Size){
        $this->Size=$Size;
    }
    public function getId(){
        return $this->Id;
    }
    public function getUserId(){
        return $this->User_id;
    }
    public function getFoodId(){
        return $this->Food_id;
    }
    public function getQuantity(){
        return $this->Quantity;
    }
    public function getSize(){
        return $this->Size;
    }
}