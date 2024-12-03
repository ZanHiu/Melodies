<?php 
// PremiumController.php
$actived = "";
  switch($action){
    case 'premium':
      $actived = "premium";
      include "views/premium/premium.php";
      break;
    case 'checkout':
      $actived = "checkout";
      include "views/premium/checkout.php";
      break;
    case 'charge':
      include "views/paypal/charge.php";
      break;
    case 'cancel':
      include "views/paypal/cancel.php";
      break;
    case 'success':
      include "views/paypal/success.php";
      break;
  }