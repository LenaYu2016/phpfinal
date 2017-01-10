<?php

namespace Project\Payment;
use Project\Auth\models\AuthModel;
use \Project\Classes\Config\PaymentKeys;


class Payment {

  public function __construct() {
    \Stripe\Stripe::setApiKey(PaymentKeys::STRIPE['secret_key']);
  }

  public function stripe($stripeToken) {

    $customer = \Stripe\Customer::create(array(
        'email' => AuthModel::getUser('email'),
        'source' => $stripeToken
    ));
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount' => $_SESSION['grandPrice'][0] * 100,
        'currency' => 'cad'
    ));
    unset($_SESSION['grandPrice']);

    // TODO: need handle payment errors
    return true;
  }

  public static function stripeButton() {
    $publishable_key = PaymentKeys::STRIPE['publishable_key'];
    $actionPath = PaymentKeys::STRIPE['actionPath'];

    return "
    <div id='stripe'>
      <form action=$actionPath method='post' id='paymentForm'>
          <script src='https://checkout.stripe.com/checkout.js' class='stripe-button'
                data-key=$publishable_key
                data-name='PHP Cinema'
                data-label='Pay with Stripe'
                data-description='add description later...'
                data-currency='cad'
                data-locale='auto'>
          </script>
        </form>
        </div>";
  }
}