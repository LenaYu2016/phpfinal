<?php
namespace Project\Validation;

class PhoneValidator extends Validator {
  public function phoneNumber($value) {
    $pattern = '/1?\W*([2-9][0-8][0-9])\W*([2-9][0-9]{2})\W*([0-9]{4})(\se?x?t?(\d*))?/';
    return preg_match($pattern, $value) == 1 ? '' : "$value is not a valid phone number";
  }
}