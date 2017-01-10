<?php

//config
require_once $_SERVER['DOCUMENT_ROOT'] . "/FAQ/FAQAdmin/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/autoloader.php";
require $_SERVER['DOCUMENT_ROOT'] . "/FAQ/FAQAdmin/libs/phpMailer/PHPMailerAutoload.php";
use \Project\FAQ\FAQAdmin\libs\Router;

new Router();



//$staffs->displayStaffsByDepartment('SMSIT');
//$sendMail = new \phpFinal\libs\Email();
//$sendMail->sendEmail("wangran326990@gmail.com","test php final exam","this is a test");
?>



