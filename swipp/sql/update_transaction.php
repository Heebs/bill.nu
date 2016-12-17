<?php
require("sql/connect.php");
$stmt = mysqli_prepare($mysqli, "UPDATE transactions SET state = ?, updated = NOW() WHERE id = ? AND invoice = ?");
mysqli_stmt_bind_param($stmt, 'sii', $state, $tId, $iId);
mysqli_stmt_execute($stmt);
?>