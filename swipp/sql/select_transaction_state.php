<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "SELECT state FROM transactions WHERE invoice = ? AND id = ?");
mysqli_stmt_bind_param($stmt, 'ii', $iId, $tId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $state);
mysqli_stmt_fetch($stmt);
?>