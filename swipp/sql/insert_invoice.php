<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "INSERT INTO invoices SET amount=?, merchant=?, reference=?, hash=?, created=NOW()");
mysqli_stmt_bind_param($stmt, 'iiss', $amount, $mId, $reference, $hash);
mysqli_stmt_execute($stmt);
$iId = mysqli_insert_id($mysqli);
$rows = mysqli_affected_rows($mysqli);
?>