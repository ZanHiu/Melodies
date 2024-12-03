<?php
 require_once "vendor/autoload.php";

 use Omnipay\Omnipay;

 define('CLIENT_ID', 'AfM4mqIn8F7AZCyVvJQHNjNjHpiOR4g-bW5VjmI-HyUbi0o6FX74IwgYh57T-nfCLzQvnSO3OXWB717b');
 define('CLIENT_SECRET', 'EBrNYV6zHmNcebUIz21_7SoyRqDPlsJn-ObMvxB9-dLI9yciBv2dAzl6eJ_PSWKTs7iIB57PP3DH81G4');

 define('PAYPAL_RETURN_URL', 'http://localhost/da1/Melodies/views/paypal/success.php');
 define('PAYPAL_CANCEL_URL', 'http://localhost/da1/Melodies/views/paypal/cancel.php');
 define('PAYPAL_CURRENCY', 'USD');

 // Connect with database
 $db = new mysqli('localhost', 'root', '', 'melodies');
 if ($db->connect_error) {
     die("Connection failed: " . $db->connect_error);
 }

 $gateway = Omnipay::create('PayPal_Rest');
 $gateway->setClientId(CLIENT_ID);
 $gateway->setSecret(CLIENT_SECRET);
 $gateway->setTestMode(true); // Set it to false when go live
?>