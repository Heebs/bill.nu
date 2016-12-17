<?php

switch ($environment)
{
	case 'demo':
		$host = 'demo-core-swipp.staging.unwire.com';
		break;
		
	case 'prod':
		$host = 'api.swipp.bec.dk';
		break;
		
	case 'test':
		$host = 'apiptst.swipp.bec.dk';
		break;
		
	default:
        echo 'Unknown environment!';
        exit();
}

?>