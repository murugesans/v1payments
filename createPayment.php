<?php
include('config.php');
$access_token = getAccessToken(); //echo $access_token;
$randomnumber=mt_rand();
$profileData='{
  "name": "Muru'.$randomnumber.'",
  "presentation": {
    "brand_name":"Muru Testing ECJSv4",
    "logo_image": "https://static.e-junkie.com/sslpic/176445.447063fea884c4e0a5a1c00284ce1ef9.jpg"
  },
  "input_fields": {
    "no_shipping": "1"
  }
}';
$webprofileid = getWebProfileID($access_token, $profileData);
$postData = '{
  "intent": "sale",
  "experience_profile_id":"'.$webprofileid.'",
  "redirect_urls": {
    "return_url": "http://127.0.0.1/PHP-Sample/executePayment.php",
    "cancel_url": "http://www.paypal.com"
  },
  "payer": {
    "payment_method":"paypal"
  },
  "transactions": [
    {
      "amount":{
        "total":"18.00",
        "currency":"USD"
      },
	 "invoice_number": "'.$randomnumber.'",
      "item_list": {
        "items": [
          {
            "name": "hat",
            "sku": "1",
            "price": "3.00",
            "currency": "USD",
            "quantity": "1",
            "description": "Brown color hat"
          },
          {
            "name": "handbag",
            "sku": "product34",
            "price": "15.00",
            "currency": "USD",
            "quantity": "1",
            "description": "Black color handbag"
          }
        ]
	  }
    }
  ]
}';
//print $postData;
$res = getApprovalURL($access_token, $postData);

//print json_encode($res);
//echo '<pre>'; print_r($res); //exit;
$approval_url = $res['links'][1]['href']; 
header("Location:" . $approval_url); 
?>