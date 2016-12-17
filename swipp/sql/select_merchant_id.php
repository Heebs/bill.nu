<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "SELECT * FROM merchants WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $mId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $mId, $name, $posId, $public, $secret, $environment, $callback);
mysqli_stmt_fetch($stmt);
?>