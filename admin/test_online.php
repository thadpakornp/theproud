<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE></TITLE>
<meta charset="utf-8" />
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="thadpakorn" >
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</HEAD>

<BODY>
<?php
session_start();
include_once ("config.php");
date_default_timezone_set("Asia/Bangkok");
$sqlonline = "SELECT * FROM tbl_user WHERE id = '".$_SESSION['id']."'";
$resultonline = mysqli_query($conn,$sqlonline);
$rowonline = mysqli_fetch_array($resultonline);
if ($rowonline['machine_name'] != $_SESSION['machine_name']){
    $id = $_SESSION['id'];
   die("<script>
				alert('พบการเข้าสู่ระบบจากแหล่งอื่น');
				window.location='logout.php?id=$id';
			 </script>");
}
?>
</BODY>
</HTML>
