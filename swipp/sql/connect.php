<?php
$mysqli = new mysqli('bill.nu.mysql', 'bill_nu', 'Guld3582', 'bill_nu');
mysqli_set_charset($mysqli,'utf8');

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>