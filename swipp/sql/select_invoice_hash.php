<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "SELECT id, amount, merchant, state FROM invoices WHERE hash = ?");
mysqli_stmt_bind_param($stmt, 's', $hash);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $iId, $amount, $mId, $state);
mysqli_stmt_fetch($stmt);
?>