<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/22/2016
 * Time: 10:11 PM
 */

namespace Project\FAQ\libs;


class Validation
{
    public function __construct(){

    }

    public function isEmpty($value){
        if($value==="" || $value===null){
            return true;
        }else{
            return false;
        }
    }

    public function phoneNumber($value) {
        $pattern = '/1?\W*([2-9][0-8][0-9])\W*([2-9][0-9]{2})\W*([0-9]{4})(\se?x?t?(\d*))?/';
        return preg_match($pattern, $value) == 1 ? '' : "$value is not a valid phone number";
    }


    public function EmailValidator($email) {
        if (preg_match( "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/",$email)) {
            return '';
        }else{
            return 'wrong email address';
        }
    }


}