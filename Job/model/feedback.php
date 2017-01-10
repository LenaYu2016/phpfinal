<?php
/**
 * Created by PhpStorm.
 * User: bin
 * Date: 15/4/2016
 * Time: 下午 3:42
 */

class feedback{

    private $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function index( $username1, $phone, $email, $address, $message){
        $query = "INSERT INTO feedback (username, phone, email,address,message) VALUES ('$username1', '$phone', '$email', '$address','$message')";
        $this->_db->exec($query);
        echo 'Successful';

        }
}