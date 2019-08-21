<?php
include('config.php');
$access_token = getAccessToken();
$PAYMENT_ID=$_GET['paymentId'];
$PAYER_ID=$_GET['PayerID'];

$postData = '{
    "payer_id":"'.$PAYER_ID.'"
}';
$res = getExecutePayment($access_token, $postData,$PAYMENT_ID);
//print json_encode($res);	
echo "<pre>";
print_r($res);
?>