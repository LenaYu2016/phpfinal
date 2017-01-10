<?php
namespace Project\Validation;

class AddressValidator extends Validator {

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