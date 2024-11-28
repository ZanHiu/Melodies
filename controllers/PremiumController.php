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
  }