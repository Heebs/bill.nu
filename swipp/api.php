<?php
 
// get the HTTP method, path, headers and body of the request
$path = $_SERVER['PATH_INFO'];
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($path,'/'));
$headers = apache_request_headers();
$body = file_get_contents('php://input');

// verify basic conditions
if (sizeof($request) != 2) exit;
if ($request[0] != "invoice") exit;
if (!is_numeric ($request[1])) exit;
if (!isset($headers['Authentication'])) exit;

// retreve merchant information
$authentication = $headers['Authentication'];
$public = explode(':', $authentication)[0];
require("sql/select_merchant_public.php");
$authentId = $mId;

// verify authentication of request
$hash = $body == "" ? "" : base64_encode(hash('sha256', $body, true));
$term = $method."\n".$path."\ncontent-sha256=".$hash;
$sign = base64_encode (hash_hmac ('sha256', $term, $secret, true));
if ($authentication != $public.':'.$sign) exit;

// create SQL based on HTTP method
switch ($method)
{
	case 'POST':
	    $message = json_decode($body);
		$reference = $message->ref;
		$amount = $message->amount;
		if ($amount != $request[1]) exit;
		$hash = md5($sign.time());
		$state = "INITIATED";
		require("sql/insert_invoice.php");
		if ($rows != 1) exit;
		break;
		
	case 'GET':
		$iId = $request[1];
		require("sql/select_invoice_id.php");
		if ($authentId != $mId) exit;
		break;
		
	case 'DELETE':
		$iId = $request[1];
		require("sql/select_invoice_id.php");
		if ($authentId != $mId) exit;
		if ($state != "INITIATED") break;
		$state = "CANCELLED";
		require("sql/update_invoice.php");
		break;
		
	default:
	    exit;
}

$key = md5($iId.$amount.$mId);
$answer["id"]      = $iId;
$answer["ref"]     = $reference;
$answer["amount"]  = $amount;
$answer["state"]   = $state;
$answer["created"] = $iCreated;
$answer["updated"] = $iUpdated;
$answer["url"]     = "swipp.bill.nu?key=".$key."&hash=".$hash;
echo json_encode($answer);
?>