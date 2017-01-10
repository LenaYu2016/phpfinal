<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/20/2016
 * Time: 2:55 PM
 */

/**
 * all the validation functions
 * Class Validation
 */
class Validation{
   //private $compareArray = [];
    public function __construct(){

    }

    public function emptyValidation($array){
                if(is_array($array)){
                    foreach($array as $key=>$value){
                        //echo"$value<br>";
                        if($value=="default"){
                            return "$key should be selected !";
                        }
                    }
                    return true;
                }else{
                    return false;
                }
    }
}