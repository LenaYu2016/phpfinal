<?php
namespace Project\Validation;

include_once '../autoloader.php';

// Test data
$v = new Validator([
    'name' => 'asdfsdf',
    'age' => '20',
    'phone' => '123123',
    'email' => 'aoidsf@213.com',
    'password' => 'wang1@'
]);

// Validate one field with multiple rules
$v->validate('name', [
    'notEmpty',
    ['greaterThan', 100],
    ['between', 0, 20]
]);
$v->validate('age', [
    'notEmpty',
    ['between', 0, 100],
]);


//length validation
//equal validation
$v->validate('name',[
    ['length',7]
]);

$v->validate('name',[
    ['equal',true]
]);
// Email
$v->email()->validate('age', [
    ['EmailValidator', '123.com']
]);

// Call additional validator
echo $v->address()->street(3) . '<br>';
// Use getKey method to validate key value
echo $v->phone()->phoneNumber('12345') . '<br>';
echo $v->phone()->phoneNumber($v->getKey('phone')) . '<br>';

echo 'street', $v->address()->validate('email', ['street']) . '<br>';

//password validation
echo $v->password()->password($v->getKey('password')). '<br>';

// Errors
echo '<hr/>';
if ($v->isValid()) {
  echo 'all valid';
}else {
  echo 'error on age field: ';
  $v->displayError('age');
  echo 'All errors';
  $v->displayErrorAll();
}
echo '<hr/>';