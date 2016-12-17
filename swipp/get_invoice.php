<?php
if (!isset($_GET['key'])) { require("pages/error_occurred.php"); exit; }
$key = $_GET['key'];

if (!isset($_GET['hash'])) { require("pages/error_occurred.php"); exit; }
$hash = $_GET['hash'];

require("sql/select_invoice_hash.php");
if ($key != md5($iId.$amount.$mId)) { require("pages/error_occurred.php"); exit; }

$date = date_create($created);
$s_date = $date->format('d. M Y k\l. H:i');
$s_amount = number_format($amount / 100, 2, ',', '.');

require("pages/invoice_state.php");
?>