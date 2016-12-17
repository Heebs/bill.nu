<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "UPDATE invoices SET state=?, updated=NOW() WHERE id=? AND merchant=? AND state!='STATIC'");
mysqli_stmt_bind_param($stmt, 'sii', $state, $iId, $mId);
mysqli_stmt_execute($stmt);
?>