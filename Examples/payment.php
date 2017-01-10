<?php

/**
 * Created by PhpStorm.
 * User: yi
 * Date: 22/03/16
 * Time: 1:14 AM
 */
include '../autoloader.php';
use \Project\Payment\Payment;
// Start a session, there is no need to add this line if session is active.
\Project\Classes\Helper::startSession();

// Create a pay with stripe button on page.
// Pass in the amount needs to be paid.
Payment::stripeButton(20);