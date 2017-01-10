<?php

use Project\Classes\Router\Nav;

include '../autoloader.php';
include '../vendor/autoload.php';
session_start();

$paymentController = '\Project\Payment\PaymentController';
$paymentRouter = new \Project\Classes\Router\Router();

$paymentRouter->post('/payment/stripe', "$paymentController@Stripe");

$paymentRouter->startRouting();

