<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/22/2016
 * Time: 1:54 PM
 */

namespace Project\MovieCalender\Controller;



class MovieCalender
{
    public function __construct()
    {

    }

    /**
     *
     * load MovieCalender Page
     */
    public function index(){
        //echo "This is MovieCalender Controller index action";
        require_once "./View/MovieCalender.php";
    }

    public function gotoCustomerCalender(){

    }
}