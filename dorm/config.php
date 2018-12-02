<?php
$conn = mysqli_connect("localhost","root","1234567890","theproud") or die ("ERROR : ".mysqli_error($conn));
mysqli_query($conn,"SET NAMES 'utf8'");
?>