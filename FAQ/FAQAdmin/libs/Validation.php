<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/22/2016
 * Time: 10:11 PM
 */

namespace Project\FAQ\FAQAdmin\libs;


class Validation
{

    const STREET = [
        'pattern' => '/^([0-9]+ )?[a-zA-Z ]+$/',
        'error' => 'not a valid street'
    ];
    const PROVINCE = [
        'pattern' => '/^(?:AB|BC|MB|N[BLTSU]|ON|PE|QC|SK|YT)*$/',
        'error' => 'not a province in Canada'
    ];
    const POSTAL_CODE = [
        'pattern' => '/^([A-Za-z][0-9][A-Za-z]\s?[0-9][A-Za-z][0-9])$/',
        'error' => 'not a valid postal code'
    ];

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

    public function regex($value, $patternArray) {
        $pattern = $patternArray['pattern'];
        $error = $patternArray['error'];
        return preg_match($pattern, $value) ? '' : $error;
    }



    public function street($value) {
        return $this->regex($value, self::STREET);
    }
    public function province($value) {
        return $this->regex($value, self::PROVINCE);
    }
    public function postalCode($value) {
        return $this->regex($value, self::POSTAL_CODE);
    }




}