<?php
 
// get the HTTP method, path, headers and body of the request
$path = $_SERVER['PATH_INFO'];
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('-', trim($path,'/'));
$headers = apache_request_headers();
$body = file_get_contents('php://input');

// verify basic conditions
if ($method != "POST") exit;
if (sizeof($request) != 4) exit;
if ($request[0] != 'BILL') exit;
$body = preg_replace('/[^A-Za-z0-9{:",}]/', '', $body);

// extract required information
$state = json_decode($body)->state;
$mId = $request[1];
$iId = $request[2];
$tId = $request[3];

require("sql/update_state.php");

?>