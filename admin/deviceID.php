<?php
include 'config.php';
$sql = "SELECT * FROM tbl_setting ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$deviceID = $row['device_id'];
?>
