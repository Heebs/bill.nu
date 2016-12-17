<?php

$method = '/ecr-api/v1/transaction';

$request["time"]          = time ();
$request["referenceId"]   = $refId;
$request["posId"]         = $posId;
$request["msisdn"]        = $msisdn;
$request["paymentAmount"] = $amount;
$request["currencyCode"]  = "DKK";

$request["callbackUrl"]   = "https://swipp.bill.nu/callback.php/BILL-".$refId;
$request["callbackOnStates"] = array("CANCELLED", "COMPLETED", "FAILED");

$body = json_encode($request);

$_hash = base64_encode (hash ('sha256', $body, true));
$_term = "POST\n".$method."\ncontent-sha256=".$_hash;
$_sign = base64_encode (hash_hmac ('sha256' , $_term, $secret, true));

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://'.$host.$method);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cert.pem");
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'content-sha256:'.$_hash,
    'authentication:'.$public.':'.$_sign,
	'content-type:application/json; charset=utf-8',
    ));

$result = curl_exec($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$error = ($result != false) && $httpcode == 400;
$answer = json_decode($result);

curl_close($curl);

?>