<?php
 require_once "setting.php";

 if (isset($_POST['submit'])) {
  try {
   $response = $gateway->purchase(array(
    'amount' => $_POST['amount'],
    'currency' => PAYPAL_CURRENCY,
    'returnUrl' => PAYPAL_RETURN_URL,
    'cancelUrl' => PAYPAL_CANCEL_URL,
    // 'items' => array(
    //  'name' => 'Course Subscription',
    //  'price' => $_POST['amount'],
    //  'description' => 'Course Subscription',
    //  'quantity' => 1
    // )
   ))->send();

   if ($response->isRedirect()) {
    // forward to paypal
    $response->redirect();
   } else {
    // not successfully
    echo $response->getMessage();
   }

  } catch (Exception $e) {
   echo $e->getMessage();
  }
 }
?>