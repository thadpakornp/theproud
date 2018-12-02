<?php
include_once ("config.php");
if ($_GET['id'] != ""){
    session_start();
    $sqllogin = "UPDATE tbl_user SET status = '0' WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sqllogin);
    session_destroy();
}
header( "location: login.php" );
?>