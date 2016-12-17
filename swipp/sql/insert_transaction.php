<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "INSERT INTO transactions SET invoice = ?, created = NOW()");
mysqli_stmt_bind_param($stmt, 'i', $iId);
mysqli_stmt_execute($stmt);
$tId = mysqli_insert_id($mysqli);
$rows = mysqli_affected_rows($mysqli);
?>