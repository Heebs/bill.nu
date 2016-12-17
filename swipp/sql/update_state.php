<?php

switch($state)
{
	case 'COMPLETED':
		require("sql/update_invoice.php");
		
	case 'CANCELLED':
	case 'FAILED':
		require("sql/update_transaction.php");
}

?>