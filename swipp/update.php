<?php
$tId = $_GET['update'];
require("sql/select_merchant_id.php");
require("sql/select_transaction_state.php");

$refId = $mId.'-'.$iId.'-'.$tId;
require("retail/host.php");
require("retail/get.php");
$state = $answer->status;
require("sql/update_state.php");
require("pages/invoice_state.php");
?>