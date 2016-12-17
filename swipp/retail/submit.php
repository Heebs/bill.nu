<?php

$_path = '/invoice/'.$iId;

$_request["id"]     = $iId;
$_request["ref"]    = $reference;
$_request["amount"] = $amount;
$_request["state"]  = $state;

$_body = json_encode($_request);

$_hash = base64_encode (hash ('sha256', $_body, true));
$_term = "POST\n".$_path."\ncontent-sha256=".$_hash;
$_sign = base64_encode (hash_hmac ('sha256', $_term, $secret, true));

$_curl = curl_init();
curl_setopt($_curl, CURLOPT_URL, 'https://'.$callback.$_path);
curl_setopt($_curl, CURLOPT_POST, true);
curl_setopt($_curl, CURLOPT_POSTFIELDS, $_body);
curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($_curl, CURLOPT_CAINFO, dirname(__FILE__)."/cert.pem");
curl_setopt($_curl, CURLOPT_HTTPHEADER, array(
    'content-sha256:'.$_hash,
    'authentication:'.$public.':'.$_sign,
	'content-type:application/json; charset=utf-8',
    ));

curl_exec($_curl);
curl_close($_curl);

?>