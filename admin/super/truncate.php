<?php
session_start();
include_once ("../config.php");
date_default_timezone_set("Asia/Bangkok");
if (!isset($_SESSION['user'])){
if (!isset($_SERVER['PHP_AUTH_USER'])){
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
	} else {
		$sql = "SELECT * FROM tbl_user WHERE username = '".$_SERVER['PHP_AUTH_USER']."' AND password = '".md5($_SERVER['PHP_AUTH_PW'])."' AND role = 'SPA'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['user'] = $_SERVER['PHP_AUTH_USER'];
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','เข้าสู่ระบบ super admin สำเร็จ','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
		} else {
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','เข้าสู่ระบบ super admin ไม่สำเร็จ','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			echo "Not Allow";
		}
	}
} 
$sql = "TRUNCATE `tbl_change`;
TRUNCATE `tbl_contact`;
TRUNCATE `tbl_contract`;
TRUNCATE `tbl_member`;
TRUNCATE `tbl_payment`;
TRUNCATE `tbl_promotion`;
TRUNCATE `tbl_reserve`;
TRUNCATE `tbl_room`;
TRUNCATE `tbl_service`;
TRUNCATE `tbl_setting`;
TRUNCATE `tbl_up`;
TRUNCATE `tbl_usage`;";
$result = mysqli_query($conn,$sql);
echo "ล้างข้อมูลสำเร็จ";
?>