<?php
namespace Project\Validation;

class EmailValidator extends Validator {
    public function EmailValidator($email) {
        if (preg_match( "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/",$email)) {
            return '';
        }else{
            return 'wrong email address';
        }
    }
}


