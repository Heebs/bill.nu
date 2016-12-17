<?php
$index = true;

require("get_invoice.php");
if (!isset($_GET['msisdn'])) { require("pages/need_msisdn.php"); exit; }
$msisdn = $_GET['msisdn'];

require("sql/select_merchant_id.php");
require("sql/select_transaction_new.php");
require("retail/host.php");

if ($tId == '')
{
	require("sql/insert_transaction.php");
	$refId = $mId.'-'.$iId.'-'.$tId;
	require("retail/post.php");
	if ($error)
	{
		$state = 'REJECTED';
		require("sql/update_transaction.php");
		require("pages/error_occurred.php");
		exit;
	}
}
else
{
	$refId = $mId.'-'.$iId.'-'.$tId;
	require("retail/get.php");
	$state = $answer->status;
	require("sql/update_state.php");
	require("pages/invoice_state.php");
}

require("pages/need_accept.php");
?>