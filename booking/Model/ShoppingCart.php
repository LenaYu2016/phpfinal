<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/17/2016
 * Time: 7:59 PM
 */


class ShoppingCart{
    public $shoppingCart;

    public function __construct(){
        //$this->showCart();
        $this->shoppingCart = new Session('cart');

    }

    /**
     * @param $item
     * add order to Cart
     */
    public function addToCart($item){
       // var_dump($this->shoppingCart->data);
        $this->shoppingCart->data[]=$item;
    }

    /**
     * @param $item_id
     * delete item from shoppingCart
     */
    public function deleteItem($item_id){
        if(isset($this->shoppingCart->data[$item_id])){
                unset($this->shoppingCart->data[$item_id]);
            $this->shoppingCart->data = array_values($this->shoppingCart->data);
        }
    }

    /**
     * empty Shopping cart
     *
     */
    public function emptyCart(){
        $this->shoppingCart->data=[];
    }

    /**
     * show shopping Cart
     *
     */
    public function showCart(){
        var_dump($this->shoppingCart->data);
    }

    /**
     * @param $item_id
     * @return bool
     *
     * get item by item id in shopping cart.
     */
    public function getItemById($item_id){
        if(isset($this->shoppingCart->data[$item_id])) {
            return $this->shoppingCart->data[$item_id];
        }else{
            return false;
        }
    }

    /**
     * @param $item_id
     * @param $item
     *
     * update Item information
     */

    public function updateCartByItemId($item_id, $item){
        $this->shoppingCart->data[$item_id] = $item;
    }

    /**
     * @return bool
     * check shopping cart is empty or not
     */
    public function isEmpty(){
        return empty($this->shoppingCart->data)==true? true: false;
    }




}