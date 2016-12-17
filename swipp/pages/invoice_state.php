<?php

switch ($state)
{
	case '':
	case 'STATIC':
	case 'INITIATED':
	case 'PROCESSING':
	case 'PENDING_CONFIRMATION':
		break;
		
	case 'COMPLETED':
	case 'CANCELLED':
		require("pages/invoice_".$state.".php");
		exit;
	
	default:
		require("pages/error_occurred.php");
		exit;
}

?>