<?php

$method = '/ecr-api/v1/transaction/ext/'.$refId;

$_term = "GET\n".$method."\ncontent-sha256=";
$_sign = base64_encode (hash_hmac ('sha256' , $_term, $secret, true));

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://'.$host.$method);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cert.pem");
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'content-sha256:',
    'authentication:'.$public.':'.$_sign,
    ));

$result = curl_exec($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$error = ($result != false) && $httpcode == 400;
$answer = json_decode($result);

curl_close($curl);

?>