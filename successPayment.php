<?php
include('config.php');
$paymentID = $_GET['id'];
$access_token = getAccessToken(); //echo $access_token;
$res = getPaymentDetails($access_token, $paymentID);
echo"<pre>";var_dump($res);echo"</pre>";
?>