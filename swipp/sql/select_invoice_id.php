<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "SELECT amount, merchant, reference, hash, state, created, updated FROM invoices WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $iId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $amount, $mId, $reference, $hash, $state, $iCreated, $iUpdated);
mysqli_stmt_fetch($stmt);
?>