<?php
/**
 * Created by PhpStorm.
 * Author: ran
 * Date: 2/17/2016
 * Time: 10:57 PM
 */
namespace Project\Validation;

class PasswordValidator extends Validator{
    public function password($value){
        $containsLetter  = preg_match('/[a-zA-Z]/',    $value);
        $containsDigit   = preg_match('/\d/',          $value);
        $containsSpecial = preg_match('/[^a-zA-Z\d]/', $value);

        if(!$containsLetter ) {
           return "password does not have letter";
        }
        else if(!$containsDigit){
            return "password does not have digit";
        }
        else if(!$containsSpecial){
            return "password does not have special characters";
        }
        else if(strlen($value)<8) {
            return "password must have at least 8 characters";
        }
        else{
            return"";
        }
    }
}

