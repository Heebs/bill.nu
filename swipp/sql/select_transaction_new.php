<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "SELECT id FROM transactions WHERE invoice = ? AND state = ''");
mysqli_stmt_bind_param($stmt, 'i', $iId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $tId);
mysqli_stmt_fetch($stmt);
?>