<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "SELECT amount, reference, public, secret, callback
FROM invoices I
JOIN merchants M
ON I.merchant = M.id
WHERE I.id = ?
AND M.id = ?");
mysqli_stmt_bind_param($stmt, 'ii', $iId, $mId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $amount, $reference, $public, $secret, $callback);
mysqli_stmt_fetch($stmt);
?>