<!doctype html>
<html>

<head>
    <title>THE PROUD RESIDENCE & CAFE' DORM MANAGEMENT</title>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>

<body>
    <?php
session_start();
include_once 'test_online.php';
include_once ("config.php");
date_default_timezone_set("Asia/Bangkok");
    
if ($_GET['action']=='setting_unit'){
	$water = $_POST['unit_water'];
	$elec = $_POST['unit_eltc'];
	$did = $_POST['did'];
	$sql = "INSERT INTO tbl_setting (unit_water,unit_elec,device_id) VALUES ('".$water."','".$elec."','".$did."')";
	$result = mysqli_query($conn,$sql);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','บันทึกน้ำไฟ','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
			window.location='setting_system.php';
		  </script>";

}

if ($_GET['action'] == 'cancelroom'){
	$room = $_GET['rid'];
	$sql = "UPDATE tbl_room SET r_status = '0' WHERE r_name = '".$room."'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "UPDATE tbl_reserve SET reserve_status = '3' WHERE reserve_room = '".$room."' AND reserve_status = '0' ORDER BY id ASC LIMIT 1";
	$result1 = mysqli_query($conn,$sql1);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ยกเลิกการจอง','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
			window.location='index.php';
		  </script>";

}

if ($_GET['action']=='addroom'){
	$number = $_POST['numberroom'];
	$floor = $_POST['floor'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$sql = "SELECT r_name FROM tbl_room WHERE r_name = '".$number."'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1){
		die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} else {
			$sqladdroom = "INSERT INTO tbl_room (r_name,r_floor,r_price,r_size,r_status) VALUES ('".$number."','".$floor."','".$price."','".$size."','0')";
			$resultaddroom = mysqli_query($conn,$sqladdroom);
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','เพิ่มห้อง','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
			window.location='setting_system.php';
		  </script>";

	}
}

if ($_GET['action']=='deleteroom'){
	$room = $_GET['rid'];
	$status = $_GET['s'];
	if ($status==1){
		die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} elseif ($status==2){
		die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} else {
		$sql = "DELETE FROM tbl_room WHERE id = '".$room."'";
		$result = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ลบห้อง','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
		die("<script>
				swal({
  					title: \"success!\",
  					type: \"success\"
				});
				history.back();
				exit();
			 </script>");
	}
}

if ($_GET['action']=='changepf'){
	$uid = $_GET['u'];
	$fn = $_POST['youname'];
	$ln = $_POST['lastname'];
    $namename = $fn." ".$ln;
	$phone = $_POST['phone'];
	$sql = "UPDATE tbl_user SET firstname = '".$namename."', phone = '".$phone."' WHERE id = '".$uid."'";
	$result = mysqli_query($conn,$sql);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','เปลี่ยนโปรไฟล์','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	die("<script>
				swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location = 'logout.php';
			 </script>");
}

if ($_GET['action']=='changepw'){
	$uid = $_GET['u'];
	$oldpw = $_POST['oldpw'];
	$newpw = $_POST['newpw'];
	$renew = $_POST['renewpw'];
	if ($renew != $newpw){
		die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} else {
		$mdoldpw = md5($oldpw);
		$sql = "SELECT username FROM tbl_user WHERE id = '".$uid."' AND password = '".$mdoldpw."'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)!=1){
			die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
		} else {
			$mdnewpw = md5($newpw);
			$sql = "UPDATE tbl_user SET password = '".$mdnewpw."' WHERE id = '".$uid."'";
			$result = mysqli_query($conn,$sql);
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','เปลี่ยนรหัสผ่าน','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			die("<script>
				swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location = 'logout.php';
			 </script>");
		}
	}
}

if ($_GET['action']=='changesc'){
	$uid = $_GET['u'];
	$oldsc = $_POST['oldsc'];
	$newsc = $_POST['newsc'];
	$renew = $_POST['renewsc'];
	if ($renew != $newsc){
		die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} else {
		$mdoldsc = md5($oldsc);
		$sql = "SELECT username FROM tbl_user WHERE id = '".$uid."' AND password = '".$mdoldsc."'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)!=1){
			die("<script>
				swal({
  					title: \"Error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
		} else {
			$mdnewsc = md5($newsc);
			$sql = "UPDATE tbl_user SET code = '".$mdnewsc."' WHERE id = '".$uid."'";
			$result = mysqli_query($conn,$sql);
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','เปลี่ยนรหัสลับ','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			die("<script>
				swal({
  					title: \"success!\",
  					type: \"success\"
				});
				history.back();
				exit();
			 </script>");
		}
	}
}

if ($_GET['action']=='reserve'){
	$reservedate1 = date("d-m-Y");
	$checkin1 = $_POST['date_checkin'];
    
    function dateDiff($dformat, $endDate, $beginDate)
{
    $date_parts1=explode($dformat, $beginDate);
    $date_parts2=explode($dformat, $endDate);
    $start_date=gregoriantojd($date_parts1[1], $date_parts1[0], $date_parts1[2]);
    $end_date=gregoriantojd($date_parts2[1], $date_parts2[0], $date_parts2[2]);
    return $end_date - $start_date;
}

// mm-dd-yyyy
	$date1= $checkin1;
	$date2 = date("d-m-Y");
	$date3 = dateDiff("-", $date2, $date1);

	if ($date3 < "0"){
		die("<script>
				swal({
		title: \"Error!\",
        text: \"ไม่สามารถจองย้อนหลังได้\",
  					type: \"error\"
				});
                history.back();
                exit();
			 </script>");
	}
    
    if ($date3 < "-180"){
		die("<script>
				swal({
		title: \"Error!\",
        text: \"ไม่สามารถจองมากกว่า 180 วันได้\",
  					type: \"error\"
				});
                history.back();
                exit();
			 </script>");
	}
	$youname = $_POST['youname'];
	$idcard = $_POST['idcard'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$reserve = $_POST['reserve_num'];
	$room = $_POST['room'];
	$floor = $_POST['floor'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$checkin = $_POST['checkin'];
	$n = explode("-",$_POST['checkin']);
	$nn = $n[2]."-".$n[1]."-".$n[0];


	$sql = "INSERT INTO tbl_reserve (reserve_id,reserve_name,reserve_idcard,reserve_phone,reserve_address,reserve_room,reserve_floor,reserve_size,reserve_price,reserve_date,reserve_checkin,reserve_status,server_checkin1) VALUES ('".$reserve."','".$youname."','".$idcard."','".$phone."','".$address."','".$room."','".$floor."','".$size."','".$price."','".$reservedate1."','".$checkin."','0','".$nn."')";
	$result = mysqli_query($conn,$sql);
	$sql1 = "UPDATE tbl_room SET r_status = '1' WHERE r_name = '".$room."'";
	$result1 = mysqli_query($conn,$sql1);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','จองห้อง','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
			window.location='reserve_final.php?u=$reserve';
		  </script>";
}

if ($_GET['action']=='confirmcontract'){
	$contract_id = $_POST['contract_n'];
	$contract_name = $_POST['youname'];
	$contract_idcard = $_POST['idcard'];
	$contract_address = $_POST['address'];
	$contract_job = $_POST['job'];
	$contract_room = $_POST['room'];
	$contract_floor = $_POST['floor'];
	$contract_start = $_POST['startcontract'];
	$contract_end = $_POST['endcontract'];
	$n = explode("-",$_POST['endcontract']);
	$nn = $n[2]."-".$n[1]."-".$n[0];
	$contract_date = date("d-m-Y");
	$contract_term = $_POST['term'];
	$contract_price = $_POST['price'];
	$contract_phone = $_POST['phone'];
    $remask = $_POST['r1'];
	$remask1 = $_POST['r2'];
	$remask2 = $_POST['r3'];
	$contract_status = "0";

	$sqlcontract = "INSERT INTO tbl_contract (contract_id,contract_name,contract_idcard,contract_address,contract_job,contract_room,contract_floor,contract_start,contract_end,contract_date,contract_term,contract_price,contract_status,contract_phone,contract_remark,contract_remark1,contract_remark2,server_checkin1,servcer_check1) VALUES ('".$contract_id."','".$contract_name."','".$contract_idcard."','".$contract_address."','".$contract_job."','".$contract_room."','".$contract_floor."','".$contract_start."','".$contract_end."','".$contract_date."','".$contract_term."','".$contract_price."','0','".$contract_phone."','".$remask."','".$remask1."','".$remask2."','".$nn."','".date("Y")."')";
	$result = mysqli_query($conn,$sqlcontract);
	$sqlupdateroom = "UPDATE tbl_room SET r_status = '2' WHERE r_name = '".$contract_room."'";
	$result1 = mysqli_query($conn,$sqlupdateroom);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ทำสัญญา','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
    echo $remask;
	echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
			window.location='contract_final.php?cid=$contract_id';
		  </script>";

}

if ($_GET['action']=='confirmcontract1'){
	$contract_id = $_POST['contract_n'];
	$contract_name = $_POST['youname'];
	$contract_idcard = $_POST['idcard'];
	$contract_address = $_POST['address'];
	$contract_job = $_POST['job'];
	$contract_room = $_POST['room'];
	$contract_floor = $_POST['floor'];
	$contract_start = $_POST['startcontract'];
	$contract_end = $_POST['endcontract'];
	$n = explode("-",$_POST['endcontract']);
	$nn = $n[2]."-".$n[1]."-".$n[0];
	$contract_date = date("d-m-Y");
	$contract_term = $_POST['term'];
	$contract_price = $_POST['price'];
	$contract_phone = $_POST['phone'];
	$reserveid = $_POST['reserve_number'];
	$reserveid1 = base64_decode($reserveid);
    $remask = $_POST['r1'];
	$remask1 = $_POST['r2'];
	$remask2 = $_POST['r3'];
	$contract_status = "0";

	$sqlcontract = "INSERT INTO tbl_contract (contract_id,contract_name,contract_idcard,contract_address,contract_job,contract_room,contract_floor,contract_start,contract_end,contract_date,contract_term,contract_price,contract_status,contract_phone,contract_remark,contract_remark1,contract_remark2,server_checkin1,servcer_check1) VALUES ('".$contract_id."','".$contract_name."','".$contract_idcard."','".$contract_address."','".$contract_job."','".$contract_room."','".$contract_floor."','".$contract_start."','".$contract_end."','".$contract_date."','".$contract_term."','".$contract_price."','0','".$contract_phone."','".$remask."','".$remask1."','".$remask2."','".$nn."','".date("Y")."')";
	$result = mysqli_query($conn,$sqlcontract);
	$sqlupdateroom = "UPDATE tbl_room SET r_status = '2' WHERE r_name = '".$contract_room."'";
	$result1 = mysqli_query($conn,$sqlupdateroom);
	$sqlreserve = "UPDATE tbl_reserve SET reserve_status = '1' WHERE reserve_id = '".$reserveid1."' OR reserve_idcard = '".$reserveid1."'";
	$result2 = mysqli_query($conn,$sqlreserve);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','อัพโหลดสัญญา','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='contract_final.php?cid=$contract_id';
		  </script>";

}

if ($_GET['action']=='uploadcontract'){
	$contract_id = $_POST['contract_id'];
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $userphone = $_POST['userphone'];
	$pass = base64_encode($contract_id);
	$fileupload = $_REQUEST['img1'];
	$date = date("Ymd");
	$numrand = (mt_rand());
	$upload=$_FILES['img1'];
	if($upload <> '') {
		$path="img/";
		$type = strrchr($_FILES['img1']['name'],".");
		$newname = $date.$numrand.$type;
		$path_copy=$path.$newname;
		$path_link="img/".$newname;
		move_uploaded_file($_FILES['img1']['tmp_name'],$path_copy);
		$sql = "UPDATE tbl_contract SET img1 = '".$newname."' WHERE contract_id = '".$contract_id."' AND contract_status = '0'";
		$objQuery = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','อัพโหลดสัญญา','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
		echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='upload2.php?auth=$pass&username=$username&userid=$userid&userphone=$userphone';
		  </script>";
	}
}

if ($_GET['action']=='uploadcontract1'){
    include "super/smsGateway.php";
	include "deviceID.php";
	$contract_id = $_POST['contract_id'];
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $userphone = $_POST['userphone'];
	$fileupload = $_REQUEST['img2'];
	$date = date("Ymd");
	$numrand = (mt_rand());
	$upload=$_FILES['img2'];
	if($upload <> '') {
		$path="img/";
		$type = strrchr($_FILES['img2']['name'],".");
		$newname = $date.$numrand.$type;
		$path_copy=$path.$newname;
		$path_link="img/".$newname;
		move_uploaded_file($_FILES['img2']['tmp_name'],$path_copy);
		$sql = "UPDATE tbl_contract SET img2 = '".$newname."' WHERE contract_id = '".$contract_id."' AND contract_status = '0'";
		$objQuery = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','อัพโหลดสัญญา','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
        $passw = rand();
        $sccode = rand();
        
        $sqltestuser = "SELECT * FROM tbl_user WHERE username = '".$userid."'";
        $resultuest = mysqli_query($conn,$sqltestuser);
        if(mysqli_num_rows($resultuest)!=1){
            $sqlcuser = "INSERT INTO tbl_user (username,password,firstname,phone,role,sta,status,code) VALUES ('".$userid."','".md5($passw)."','".$username."','".$userphone."','C','0','0','".md5($sccode)."')";
            $objQuery1 = mysqli_query($conn,$sqlcuser);
        } else {
            $sqlcuser = "UPDATE tbl_user SET sta = '0',password = '".md5($passw)."',code = '".md5($sccode)."',login = '' WHERE username = '".$userid."'";
            $objQuery1 = mysqli_query($conn,$sqlcuser);
        }    
        $sqllog1 = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','สร้างชื่อผู้ใช้งานใหม่','".date("Y-m-d h:m:sa")."')";
		$resultlog1 = mysqli_query($conn,$sqllog1) or die ("ERROR : ".mysqli_error($sqllog1));
        $smsGateway = new SmsGateway('thadpakorn.p@gmail.com', 'mon25march');
		if($_POST["userphone"]>10){
			$ph = explode("-",$_POST["userphone"]);
			$phonenumber = $ph[0].$ph[1].$ph[2];
		} else {
			$phonenumber = $_POST["userphone"];
		}
		$number = '+66'.substr($phonenumber,1,10);
		$message = "เลขที่สัญญา".$contract_id." ชื่อผู้ใช้งาน:".$userid." รหัสผ่าน:".$passw." รหัสลับ:".$sccode;

		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);



		echo "<br>";
		echo "<center>การอัปโหลดสัญญาเสร็จสมบูรณ์</center>";
		echo "<br>";
		echo "<center><a href=\"http://".$_SERVER['REMOTE_ADDR']."/wifi/admin/GenAutouser.php?id=".$userid."&p=".$passw."&name=".$username."&phone=".$_POST['userphone']."\">เพิ่มผู้ใช้งานอินเทอร์เน็ตทันที</a></center>";
	}
}

if ($_GET['action']=='cuser'){
    include "super/smsGateway.php";
	include "deviceID.php";
	$contract_id = $_POST['contract_id'];
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $userphone = $_POST['userphone'];
    $sql = "SELECT * FROM tbl_contract WHERE contract_id = '".$contract_id."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if (($row['img1']=="") AND ($row['img2']=="")){
        echo "<center><h3><strong><font color=\"red\">การอัพโหลดสัญญาไม่สมบูรณ์ กรุณาตรวจสอบ</font></strong></h3></center>";
    } else {
        $passw = rand();
        $sccode = rand();
        $sqltestuser = "SELECT * FROM tbl_user WHERE username = '".$userid."'";
        $resultuest = mysqli_query($conn,$sqltestuser);
        if(mysqli_num_rows($resultuest)!=1){
            $sqlcuser = "INSERT INTO tbl_user (username,password,firstname,phone,role,sta,status,code) VALUES ('".$userid."','".md5($passw)."','".$username."','".$userphone."','C','0','0','".md5($sccode)."')";
            $objQuery1 = mysqli_query($conn,$sqlcuser);
        } else {
             $sqlcuser = "UPDATE tbl_user SET sta = '0',password = '".md5($passw)."',code = '".md5($sccode)."',login = '' WHERE username = '".$userid."'";
            $objQuery1 = mysqli_query($conn,$sqlcuser);
        }
        $sqllog1 = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','สร้างชื่อผู้ใช้งานใหม่','".date("Y-m-d h:m:sa")."')";
		$resultlog1 = mysqli_query($conn,$sqllog1) or die ("ERROR : ".mysqli_error($sqllog1));
        $smsGateway = new SmsGateway('thadpakorn.p@gmail.com', 'mon25march');

		if($_POST["userphone"]>10){
			$ph = explode("-",$_POST["userphone"]);
			$phonenumber = $ph[0].$ph[1].$ph[2];
		} else {
			$phonenumber = $_POST["userphone"];
		}
		$number = '+66'.substr($phonenumber,1,10);
		$message = "เลขที่สัญญา".$contract_id." ชื่อผู้ใช้งาน:".$userid." รหัสผ่าน:".$passw." รหัสลับ:".$sccode;

		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

		echo "<br>";
		echo "<center>การอัปโหลดสัญญาเสร็จสมบูรณ์</center>";
		echo "<br>";
		echo "<center><a href=\"http://".$_SERVER['REMOTE_ADDR']."/wifi/admin/GenAutouser.php?id=".$userid."&p=".$passw."&name=".$username."&phone=".$_POST['userphone']."\">เพิ่มผู้ใช้งานอินเทอร์เน็ตทันที</a></center>";
    }
}

if ($_GET['action']=='passkey'){
	$pass = $_POST['passkey'];
	$passkey = base64_decode($pass);
	$sql = "SELECT * FROM tbl_contract WHERE contract_id = '".$passkey."' AND contract_status = '0' AND ISNULL(img1) AND ISNULL(img2)";
	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)!=1){
		die("<script>
				swal({
  					title: \"error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} else {
        $sql1 = "UPDATE tbl_up SET up_1 = '1',up_2 = '1' WHERE contract_id = '".$passkey."'";
        $result1 = mysqli_query($conn,$sql1);
		header("Location: mobileupload.php?auth=$pass");
	}
}

if ($_GET['action']=='uploadcontractpage1'){
	$contract_id = $_POST['contract_id'];
	$pass = base64_encode($contract_id);
	$fileupload = $_REQUEST['img1'];
	$date = date("Ymd");
	$numrand = (mt_rand());
	$upload=$_FILES['img1'];
	if($upload <> '') {
		$path="img/";
		$type = strrchr($_FILES['img1']['name'],".");
		$newname = $date.$numrand.$type;
		$path_copy=$path.$newname;
		$path_link="img/".$newname;
		move_uploaded_file($_FILES['img1']['tmp_name'],$path_copy);
		$sql = "UPDATE tbl_contract SET img1 = '".$newname."' WHERE contract_id = '".$contract_id."' AND contract_status = '0'";
		$objQuery = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','อัพโหลดสัญญา','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
         $sql1 = "UPDATE tbl_up SET up_3 = '1' WHERE contract_id = '".$contract_id."'";
        $result1 = mysqli_query($conn,$sql1);
		echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='mobileupload2.php?auth=$pass';
		  </script>";
	}
}

if ($_GET['action']=='uploadcontractpage2'){
	$contract_id = $_POST['contract_id'];
	$fileupload = $_REQUEST['img2'];
	$date = date("Ymd");
	$numrand = (mt_rand());
	$upload=$_FILES['img2'];
	if($upload <> '') {
		$path="img/";
		$type = strrchr($_FILES['img2']['name'],".");
		$newname = $date.$numrand.$type;
		$path_copy=$path.$newname;
		$path_link="img/".$newname;
		move_uploaded_file($_FILES['img2']['tmp_name'],$path_copy);
		$sql = "UPDATE tbl_contract SET img2 = '".$newname."' WHERE contract_id = '".$contract_id."' AND contract_status = '0'";
		$objQuery = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','อัพโหลดสัญญา','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
        $sql1 = "UPDATE tbl_up SET up_4 = '1',up_5 = '1' WHERE contract_id = '".$contract_id."'";
        $result1 = mysqli_query($conn,$sql1);
		echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\",
					text: \"You can close this page\"
				});
		  </script>";
	}
}

if ($_GET['action']=='searchreserve'){
	$choice = $_POST['select1'];
	$keyword = $_POST['keyword'];
	$cid = base64_encode($keyword);
	if ($choice == 1){
		$sql = "SELECT * FROM tbl_reserve WHERE reserve_id = '".$keyword."' AND reserve_status = '0'";
	}
	if ($choice == 2){
		$sql = "SELECT * FROM tbl_reserve WHERE reserve_idcard = '".$keyword."' AND reserve_status = '0'";
	}
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)!=1){
		die("<script>
				swal({
  					title: \"error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
	} else {
		echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='contract_have_reserve_2.php?cid=$cid';
		  </script>";
	}
}

if ($_GET['action']=='payment1'){
    $sqlpay = "SELECT * FROM tbl_payment ORDER BY id DESC LIMIT 1";
    $resultpay = mysqli_query($conn,$sqlpay);
	$optionsRadios2 = $_POST['optionsRadios2'];
    if (mysqli_num_rows($resultpay)<1){
        $paymentid1 = "PAY1";
    } else {
        $rowpay = mysqli_fetch_array($resultpay);
        $a = $rowpay['payment_id'];
        $b = substr($a,3,150);
        $c = $b+1;
        $paymentid1 = "PAY".$c;
    }
	$invoiceid = "INV".date("Ymdhis");
	$todaydate = date("Y-m");
	$contractid = $_POST['contract_n'];
	$reserveid = $_POST['reserveid'];
	$totalcontract = $_POST['contractpayment'];
    if ($_POST['reservepayment']==""){
        $totalreserve = $totalcontract;
    } else {
        $totalreserve = $_POST['reservepayment'];
    }
	$water = $_POST['water'];
	$elec = $_POST['elec'];

	$reservename = $_POST['reservename'];
	$reserveroom = $_POST['reserveroom'];
	$reservesize = $_POST['reservesize'];
	$reservefloor = $_POST['reservefloor'];

	$contractname = $_POST['contractname'];
	$contractroom = $_POST['contractroom'];
	$contractfloor = $_POST['contractfloor'];

	$sqlpayment1 = "INSERT INTO tbl_payment (payment_id,payment_date,payment_ref,payment_total,month1,year1) VALUES ('".$paymentid1."','".date("d-m-Y")."','".$contractid."','".$totalreserve."','".date("m-Y")."','".date("Y")."')";
	$resultpayment = mysqli_query($conn,$sqlpayment1);

	if($optionsRadios2 == 1){
		$netivem = date('Y-m',strtotime('-1 month'));
		$sqlinvoice1 = "INSERT INTO tbl_usage (usage_id,usage_date,usage_water,usage_elec,usage_ref,usage_total,usage_status,year1) VALUES ('".$invoiceid."','".$netivem."','".$water."','".$elec."','".$contractid."','".$totalcontract."','1','".date("Y")."')";
		$resultinvoice1 = mysqli_query($conn,$sqlinvoice1);
	} else {
		$sqlinvoice = "INSERT INTO tbl_usage (usage_id,usage_date,usage_water,usage_elec,usage_ref,usage_total,usage_status,year1) VALUES ('".$invoiceid."','".$todaydate."','".$water."','".$elec."','".$contractid."','".$totalcontract."','1','".date("Y")."')";
		$resultinvoice = mysqli_query($conn,$sqlinvoice);
	}
	$sqlpayment2 = "INSERT INTO tbl_payment (payment_id,payment_date,payment_ref,payment_total,month1,year1) VALUES ('".$paymentid1."','".date("d-m-Y")."','".$invoiceid."','".$totalcontract."','".date("m-Y")."','".date("Y")."')";
	$resultpayment1 = mysqli_query($conn,$sqlpayment2);
	$auth = base64_encode($paymentid1);
	$auth1 = base64_encode($invoiceid);
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ชำระเงิน','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
    $sqlusage = "UPDATE tbl_usage SET usage_status = '1' WHERE usage_id = '".$invoiceid."'";
    $resultusage = mysqli_query($conn,$sqlusage);
	$discount = $_POST['num3'];
	echo "<script>
			swal({
  				title: \"success!\",
  				type: \"success\"
			});
			window.location='bill.php?pid=$auth&nid=$auth1&rn=$reservename&rr=$reserveroom&rs=$reservesize&rf=$reservefloor&cn=$contractname&cr=$contractroom&cf=$contractfloor&u=$reserveid&discount=$discount';
	  </script>";
}

if ($_GET['action']=='payment2'){
    $sqlpay = "SELECT * FROM tbl_payment ORDER BY id DESC LIMIT 1";
    $resultpay = mysqli_query($conn,$sqlpay);
    if (mysqli_num_rows($resultpay)<1){
        $paymentid = "PAY1";
    } else {
        $rowpay = mysqli_fetch_array($resultpay);
        $a = $rowpay['payment_id'];
        $b = substr($a,3,150);
        $c = $b+1;
        $paymentid = "PAY".$c;
    }
    $todaydate = date("Y-m");
    $inv = $_POST['inv'];
    $total = $_POST['total'];
    $name1 = $_POST['name1'];
    $d = $_POST['d'];
    $room1 = $_POST['room1'];
    $size1 = $_POST['size1'];
    $sql = "INSERT INTO tbl_payment (payment_id,payment_date,payment_ref,payment_total,month1,year1) VALUES ('".$paymentid."','".date("d-m-Y")."','".$inv."','".$total."','".date("m-Y")."','".date("Y")."')";
    $result = mysqli_query($conn,$sql);
    $sqlusage = "UPDATE tbl_usage SET usage_status = '1' WHERE usage_id = '".$inv."'";
    $resultusage = mysqli_query($conn,$sqlusage);
    $sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ชำระเงิน','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
    
    $sqlpoint = "SELECT * FROM tbl_usage WHERE usage_id = '".$inv."'";
    $resultpoint = mysqli_query($conn,$sqlpoint);
    $rowpoint = mysqli_fetch_array($resultpoint);
    
    $sqlpoint1 = "SELECT * FROM tbl_contract WHERE contract_id = '".$rowpoint['usage_ref']."'";
    $resultpoint1 = mysqli_query($conn,$sqlpoint1);
    $rowpoint1 = mysqli_fetch_array($resultpoint1);
    
    $sqlpoint2 = "SELECT * FROM tbl_member WHERE member_idcard = '".$rowpoint1['contract_idcard']."'";
    $resultpoint2 = mysqli_query($conn,$sqlpoint2);
    $rowpoint2 = mysqli_fetch_array($resultpoint2);
    
	$sqlchpoint = "SELECT * FROM tbl_usage ORDER BY id DESC LIMIT 1";
	$resultchpoint = mysqli_query($conn,$sqlchpoint);
	$rowchpoint = mysqli_fetch_array($resultchpoint);

	$sqlchpoint1 = "SELECT * FROM tbl_usage WHERE usage_date = '".$rowchpoint['usage_date']."' AND usage_status = '1'";
	$resultchpoint1 = mysqli_query($conn,$sqlchpoint1);
	if(mysqli_num_rows($resultchpoint1) == 1){
		 if($rowpoint2['member_point']==0){
        $addpoint = "UPDATE tbl_member SET member_point = '2' WHERE member_idcard = '".$rowpoint2['member_idcard']."'";
        $resultadd = mysqli_query($conn,$addpoint);
    	}
    if($rowpoint2['member_point']==1){
        $newpoint = $rowpoint2['member_point'] + 1;
        $addpoint = "UPDATE tbl_member SET member_point = '".$newpoint."' WHERE member_idcard = '".$rowpoint2['member_idcard']."'";
        $resultadd = mysqli_query($conn,$addpoint);
    }
	} else {
		 if($rowpoint2['member_point']==0){
        $addpoint = "UPDATE tbl_member SET member_point = '3' WHERE member_idcard = '".$rowpoint2['member_idcard']."'";
        $resultadd = mysqli_query($conn,$addpoint);
    	}
    if($rowpoint2['member_point']==1){
        $newpoint = $rowpoint2['member_point'] + 2;
        $addpoint = "UPDATE tbl_member SET member_point = '".$newpoint."' WHERE member_idcard = '".$rowpoint2['member_idcard']."'";
        $resultadd = mysqli_query($conn,$addpoint);
    }
	if($rowpoint2['member_point']==2){
        $newpoint = $rowpoint2['member_point'] + 1;
        $addpoint = "UPDATE tbl_member SET member_point = '".$newpoint."' WHERE member_idcard = '".$rowpoint2['member_idcard']."'";
        $resultadd = mysqli_query($conn,$addpoint);
    }
	}
    echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='bill2.php?name1=$name1&d=$d&room=$room1&size=$size1&total=$total&inv=$inv&pay=$paymentid';
		  </script>";
}

if ($_GET['action']=='payment3'){
  include "super/smsGateway.php";
  include "deviceID.php";
    $invoiceid = "INV".date("Ymdhis");
    $roomprice = $_POST['roomprice'];
    $msgservice = $_POST['msgservice'];
    $roommsg = $_POST['roommsg'];
    $water1 = $_POST['newwater'];
    $seevice3 = $_POST['seevice3'];
    $water = $_POST['oldwater'];
    $elec1 = $_POST['newelec'];
    $elec = $_POST['oldelec'];
    $ref = $_POST['ref'];
    $total = $_POST['total'];
    $msg = $_POST['msg'];
    $msg1 = $_POST['msgprice'];
    $air = $_POST['air'];
    $clean = $_POST['clean'];
    $priceother = $_POST['priceother'];
    $description = $_POST['description'];
    $todaydate = date("Y-m");
    $optionsRadios2 = $_POST['optionsRadios2'];
    $sqlpay = "SELECT * FROM tbl_payment ORDER BY id DESC LIMIT 1";
    $resultpay = mysqli_query($conn,$sqlpay);
    if (mysqli_num_rows($resultpay)<1){
        $paymentid = "PAY1";
    } else {
        $rowpay = mysqli_fetch_array($resultpay);
        $a = $rowpay['payment_id'];
        $b = substr($a,3,150);
        $c = $b+1;
        $paymentid = "PAY".$c;
    }
    
    if ($optionsRadios2 == '1'){
        $sql001 = "SELECT * FROM tbl_usage WHERE usage_ref = '".$ref."' ORDER BY id DESC LIMIT 1";
        $result001 = mysqli_query($conn,$sql001);
        $row001 = mysqli_fetch_array($result001);
        $sqlup001 = "UPDATE tbl_usage SET usage_water = '".$water1."',usage_elec = '".$elec1."' WHERE id = '".$row001['id']."'";
        $resultup001 = mysqli_query($conn,$sqlup001);
    } else {
         $sqlinvoice = "INSERT INTO tbl_usage (usage_id,usage_date,usage_water,usage_elec,usage_ref,usage_total,usage_status,year1) VALUES ('".$invoiceid."','".$todaydate."','".$water1."','".$elec1."','".$ref."','".$total."','1','".date("Y")."')";
	       $resultinvoice = mysqli_query($conn,$sqlinvoice);
    }
    $sql = "INSERT INTO tbl_payment (payment_id,payment_date,payment_ref,payment_total,month1,year1) VALUES ('".$paymentid."','".date("d-m-Y")."','".$invoiceid."','".$total."','".date("m-Y")."','".date("Y")."')";
    $result = mysqli_query($conn,$sql);
    $sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ชำระเงิน','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
    $sql1 = "SELECT * FROM tbl_contract WHERE contract_id = '".$ref."'";
                                                    $result1 = mysqli_query($conn,$sql1);
                                                    $row1 = mysqli_fetch_array($result1);
    $sql2 = "UPDATE tbl_contract SET contract_status = '3' WHERE contract_id = '".$ref."'";
    $result2 = mysqli_query($conn,$sql2);
        $sql3 = "UPDATE tbl_room SET r_status = '0' WHERE r_name = '".$row1['contract_room']."'";
    $resul3 = mysqli_query($conn,$sql3);
    
    $sqlupdateuser = "UPDATE tbl_user SET sta = '1' WHERE username = '".$row1['contract_idcard']."'";
    $reultupdateuser = mysqli_query($conn,$sqlupdateuser);
    
    

    $smsGateway = new SmsGateway('thadpakorn.p@gmail.com', 'mon25march');

	if($_POST["contract_phone"]>10){
			$ph = explode("-",$_POST["contract_phone"]);
			$phonenumber = $ph[0].$ph[1].$ph[2];
		} else {
			$phonenumber = $_POST["contract_phone"];
		}
	$number = '+66'.substr($phonenumber,1,10);
    $message = "ระบบได้ทำการยกเลิกสัญญาเรียบร้อยแล้ว ยอดคงค้าง ".$total." บาท";
    $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

    if ($roomprice != ""){
      echo "<script>
  			swal({
    					title: \"success!\",
    					type: \"success\"
  				});
  				window.location='cancel_contract2.php?invoice=$invoiceid&water1=$water1&water=$water&elec1=$elec1&elec=$elec&ref=$ref&total=$total&msg=$msg&msg1=$msg1&air=$air&clean=$clean&priceother=$priceother&description=$description&today=$todaydate&pay=$paymentid&roomprice=$roomprice&msgservice=$msgservice&roommsg=$roommsg&seevice3=$seevice3';
  		  </script>";
    } else {
    echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='cancel_contract.php?invoice=$invoiceid&water1=$water1&water=$water&elec1=$elec1&elec=$elec&ref=$ref&total=$total&msg=$msg&msg1=$msg1&air=$air&clean=$clean&priceother=$priceother&description=$description&today=$todaydate&pay=$paymentid';
		  </script>";
      }
}

if ($_GET['action']=='expenses'){
    include "super/smsGateway.php";
	include "deviceID.php";
    for($i=1;$i<=$_POST["hdnLine"];$i++) {
        if ($_POST["unitelec$i"] < $_POST["usageelec$i"]) {
            die("<script>
				swal({
  					title: \"error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
        }
        if ($_POST["unitwater$i"] < $_POST["usagewater$i"]) {
            die("<script>
				swal({
  					title: \"error!\",
  					type: \"error\"
				});
				history.back();
				exit();
			 </script>");
        }
    }
    for($i=1;$i<=$_POST["hdnLine"];$i++) {
        if($_POST['submit']=='Save'){
            $numberinv = "SELECT * FROM tbl_usage ORDER BY id DESC LIMIT 1";
            $resultinv = mysqli_query($conn,$numberinv);
            $rowinv = mysqli_fetch_array($resultinv);
            $inv = substr($rowinv['usage_id'],3,14)+1;
            $inv1 = "INV".$inv;
            $sql = "INSERT INTO tbl_usage (usage_id,usage_date,usage_water,usage_elec,usage_ref,usage_total,usage_status,year1) VALUES ('".$inv1."','".date("Y-m")."','".$_POST["unitwater$i"]."','".$_POST["unitelec$i"]."','".$_POST["contract_id$i"]."','".((($_POST["unitwater$i"] - $_POST["usagewater$i"]) * $_POST["pricewater"])+(($_POST["unitelec$i"] - $_POST["usageelec$i"]) * $_POST["priceelec"]))."','0','".date("Y")."'); ";
            $resul = mysqli_query($conn,$sql);
        }
        if($_POST['submit']=='Edit'){
            $sql = "UPDATE tbl_usage SET usage_water = '".$_POST["unitwater$i"]."',usage_elec = '".$_POST["unitelec$i"]."' WHERE id = '".$_POST["recordid$i"]."'";
            $resultt = mysqli_query($conn,$sql);
        }
        

        $sqlroom = "SELECT * FROM tbl_room WHERE r_name = '".$_POST["contract_room$i"]."'";
        $resultroom = mysqli_query($conn,$sqlroom);
        $rowroom = mysqli_fetch_array($resultroom);
        $priceroom = $rowroom['r_price'];

        $sqlservie1 = "SELECT * FROM tbl_service WHERE service_room = '".$_POST["contract_room$i"]."' AND service_code = '1' AND service_status = '0'";
        $rservice1 = mysqli_query($conn,$sqlservie1);
        $row1 = mysqli_fetch_array($rservice1);
        $price1 = $row1['servie_price'];

        $sqlservie2 = "SELECT * FROM tbl_service WHERE service_room = '".$_POST["contract_room$i"]."' AND service_code = '2' AND service_status = '0'";
        $rservice2 = mysqli_query($conn,$sqlservie2);
        $row2 = mysqli_fetch_array($rservice2);
        $price2 = $row2['service_price'];

        $totalsentsmsm = ((($_POST["unitwater$i"] - $_POST["usagewater$i"]) * $_POST["pricewater"])+$priceroom+$price1+$price2+(($_POST["unitelec$i"] - $_POST["usageelec$i"]) * $_POST["priceelec"]));

        $sqlservice3 = "SELECT * FROM tbl_service WHERE service_room = '".$_POST["contract_room$i"]."' AND service_code = '1' AND service_status = '0'";
        $rsservie3 = mysqli_query($conn,$sqlservice3);
        $rtservice3 = mysqli_fetch_array($rsservie3);
        $numcount = $rtservice3['service_num']+1;
        $updateservice = "UPDATE tbl_service SET service_num = '".$numcount."' WHERE service_room = '".$_POST["contract_room$i"]."' AND service_code = '1' AND service_status = '0'";
        $rtupdate3 = mysqli_query($conn,$updateservice);

        $sqlservice4 = "SELECT * FROM tbl_service WHERE service_room = '".$_POST["contract_room$i"]."' AND service_code = '2' AND service_status = '0'";
        $rsservie4 = mysqli_query($conn,$sqlservice4);
        $rtservice4 = mysqli_fetch_array($rsservie4);
        $numcount1 = $rtservice4['service_num']+1;
        $updateservice1 = "UPDATE tbl_service SET service_num = '".$numcount1."' WHERE service_room = '".$_POST["contract_room$i"]."' AND service_code = '2' AND service_status = '0'";
        $rtupdate4 = mysqli_query($conn,$updateservice1);

        $smsGateway = new SmsGateway('thadpakorn.p@gmail.com', 'mon25march');

		if($_POST["contract_phone$i"]>10){
			$ph = explode("-",$_POST["contract_phone$i"]);
			$phonenumber = $ph[0].$ph[1].$ph[2];
		} else {
			$phonenumber = $_POST["contract_phone$i"];
		}
		$number = '+66'.substr($phonenumber,1,10);
        $message = "ใบแจ้งค่าเช่า เดือน".date("M-Y")."จำนวน".$totalsentsmsm."บาท";
        $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

    };
    $m = date("Y-m");
    echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='invoice.php?m=$m';
		  </script>";
}

if ($_GET['action']=='service'){
    $room = $_POST['roomservie'];
    $service = $_POST['select1'];
    $price = $_POST['price'];
    $sql = "INSERT INTO tbl_service (service_room,service_code,service_price,service_num,service_status) VALUES ('".$room."','".$service."','".$price."','0','0')";
    $reseul = mysqli_query($conn,$sql);
         echo "<script>
            swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.history.back();
		  </script>";
}
if ($_GET['action']=='deleteservice'){
    $sql = "UPDATE tbl_service SET service_status = '1' WHERE id = '".$_GET['id']."'";
    $reseul = mysqli_query($conn,$sql);
         echo "<script>
            swal({
  					title: \"success!\",
  					type: \"success\"
				});
                window.history.back();
		  </script>";
}

if ($_GET['action']=='renewcontract'){
    $contractold = $_POST['contractold'];
    $agenew = $_POST['select1'];

    $sqlold = "SELECT * FROM tbl_contract WHERE contract_id = '".$contractold."'";
    $resultold = mysqli_query($conn,$sqlold);
    $rowold = mysqli_fetch_array($resultold);

    $sqlupdateold = "UPDATE tbl_contract SET contract_status = '2' WHERE contract_id = '".$contractold."'";
    $resultupdateolg = mysqli_query($conn,$sqlupdateold);

    $endcontractnew=date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+($agenew-1) , date("d")+0, date("Y")+0));

    $sql = "SELECT * FROM tbl_contract ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $contract = $row['contract_id'];
        if (strlen($contract)==6){
          $number = substr($contract, 0, 1);
          $number1 = substr($contract, 2, 7);
        }
        if (strlen($contract)==7){
          $number = substr($contract, 0, 2);
          $number1 = substr($contract, 3, 8);
        }
        if (strlen($contract)==8){
          $number = substr($contract, 0, 3);
          $number1 = substr($contract, 4, 9);
        }
        $toyear = date('Y');
        if ($number1 == $toyear){
            $number3 = $number+1;
            $contractnumber = $number3."/".$toyear;
        } else {
            $number3 = "1";
            $contractnumber = $number3."/".$toyear;
        }
    } else {
        $contract = date("Y");
        $number = "1";
        $contractnumber = $number."/".$contract;
    }

	$n = explode("-",$endcontractnew);
	$nn = $n[2]."-".$n[1]."-".$n[0];
    $sqlnew = "INSERT INTO tbl_contract (contract_id,contract_name,contract_idcard,contract_address,contract_job,contract_room,contract_floor,contract_start,contract_end,contract_date,contract_term,contract_price,contract_status,contract_phone,server_checkin1,servcer_check1) VALUES ('".$contractnumber."','".$rowold['contract_name']."','".$rowold['contract_idcard']."','".$rowold['contract_address']."','".$rowold['contract_job']."','".$rowold['contract_room']."','".$rowold['contract_floor']."','".$rowold['contract_end']."','".$endcontractnew."','".date("Y-m-d")."','".$agenew." เดือน"."','".$rowold['contract_price']."','0','".$rowold['contract_phone']."','".$nn."','".date("Y")."')";
	$resultnew = mysqli_query($conn,$sqlnew);

    $sqlch = "INSERT INTO tbl_change (contract_old,contract_new) VALUES ('".$contractold."','".$contractnumber."')";
    $rlch = mysqli_query($conn,$sqlch);

    echo "<script>
			swal({
  					title: \"success!\",
  					type: \"success\"
				});
				window.location='contract_final.php?cid=$contractnumber';
		  </script>";
}

if ($_GET['action']=='moveroom'){
  include "super/smsGateway.php";
  include "deviceID.php";
  $unitwaterroomold = $_POST['unitwater'];
  $unitelecroomold = $_POST['unitelec'];
  $unitwaterroomnew = $_POST['usagewater'];
  $unitelecroomnew = $_POST['usageelec'];
  $roomname = $_POST['roomnew'];
  $contractid = $_POST['roomold'];
  $term = $_POST['select1'];
  $air = $_POST['air'];
  $clean = $_POST['clean'];

    $sqlcontractall = "SELECT * FROM tbl_contract WHERE contract_id = '".$contractid."'";
	$resultall = mysqli_query($conn,$sqlcontractall);
	$rowall = mysqli_fetch_array($resultall);
	$fg = $rowall['contract_remark'];
	$car = $rowall['contract_remark1'];
	$pin = $rowall['contract_remark2'];

  $sql0 = "SELECT * FROM tbl_usage WHERE usage_ref = '".$contractid."' ORDER BY id DESC LIMIT 1";
  $result0 = mysqli_query($conn,$sql0);
  $row0 = mysqli_fetch_array($result0);
  $water = $row0['usage_water'];
  $elec = $row0['usage_elec'];
	$sqlchser = "SELECT * FROM tbl_service WHERE service_room = '".$row0['contract_room']."' AND service_status = '0'";
	  $resultchser = mysqli_query($conn,$sqlchser);
	  if(mysqli_num_rows($resultchser) == 1){
		   die("<script>
				alert('กรุณาลบข้อมูลบริการออกจากห้องเดิมก่อน');
				history.back();
    			exit();
			 </script>");
	  } else {
		  if ($unitelecroomold < $elec){
    die("<script>
    swal({
      title: \"error!\",
      type: \"error\"
    });
    history.back();
    exit();
    </script>");
  }
  if ($unitwaterroomold < $water){
    die("<script>
    swal({
      title: \"error!\",
      type: \"error\"
    });
    history.back();
    exit();
    </script>");
  }

  $sql1 = "SELECT * FROM tbl_contract WHERE contract_id = '".$contractid."'";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_array($result1);

  $sql2 = "SELECT * FROM tbl_room WHERE r_name = '".$row1['contract_room']."'";
  $result2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_array($result2);

  $sql3 = "SELECT * FROM tbl_room WHERE r_name = '".$roomname."'";
  $result3 = mysqli_query($conn,$sql3);
  $row3 = mysqli_fetch_array($result3);

  if ($row3['r_price'] != $row2['r_price']){
    $newmove = $row3['r_price'] - $row2['r_price'];
  } else {
    $newmove = $row3['r_price'];
  }

  $sql = "SELECT * FROM tbl_contract ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)==1){
      $row = mysqli_fetch_array($result);
      $contract = $row['contract_id'];
      if (strlen($contract)==6){
        $number = substr($contract, 0, 1);
        $number1 = substr($contract, 2, 7);
      }
      if (strlen($contract)==7){
        $number = substr($contract, 0, 2);
        $number1 = substr($contract, 3, 8);
      }
      if (strlen($contract)==8){
        $number = substr($contract, 0, 3);
        $number1 = substr($contract, 4, 9);
      }
      $toyear = date('Y');
      if ($number1 == $toyear){
          $number3 = $number+1;
          $contractnumber = $number3."/".$toyear;
      } else {
          $number3 = "1";
          $contractnumber = $number3."/".$toyear;
      }
  } else {
      $contract = date("Y");
      $number = "1";
      $contractnumber = $number."/".$contract;
  }

  	$sqlsetting = "SELECT * FROM tbl_setting ORDER BY id LIMIT 1";
      $resultwetting = mysqli_query($conn,$sqlsetting);
      $rowsetting = mysqli_fetch_array($resultwetting);
      $priceelec = $rowsetting['unit_elec'];
      $pricewater = $rowsetting['unit_water'];

      $sqlpay = "SELECT * FROM tbl_payment ORDER BY id DESC LIMIT 1";
      $resultpay = mysqli_query($conn,$sqlpay);
      if (mysqli_num_rows($resultpay)<1){
          $paymentid = "PAY1";
      } else {
          $rowpay = mysqli_fetch_array($resultpay);
          $a = $rowpay['payment_id'];
          $b = substr($a,3,150);
          $c = $b+1;
          $paymentid = "PAY".$c;
      }

  	$tttt = date("Ymdhis");
  	$tttttt = $tttt + 1;
  	$pricetotal = $waters + $elecs + $air + $clean;
  	$inv1 = "INV".$tttttt;
	$inv = "INV".date("Ymdhis");
	//[บิลใหม่]
  	$sql4 = "INSERT INTO tbl_usage (usage_id,usage_date,usage_water,usage_elec,usage_ref,usage_total,usage_status,year1) VALUES ('".$inv1."','".date("Y-m")."','".$unitwaterroomnew."','".$unitelecroomnew."','".$contractnumber."','".$newmove."','1','".date("Y")."')";
  	$result4 = mysqli_query($conn,$sql4);
  	//บิลเก่า
  	$waters = ($unitwaterroomold - $row0['usage_water'])*$pricewater;
  	$elecs = ($unitelecroomold - $row0['usage_elec'])*$priceelec;
  	$sql5 = "INSERT INTO tbl_usage (usage_id,usage_date,usage_water,usage_elec,usage_ref,usage_total,usage_status,year1) VALUES ('".$inv."','".date("Y-m")."','".$unitwaterroomold."','".$unitelecroomold."','".$contractid."','".$pricetotal."','1','".date("Y")."')";
  	$result5 = mysqli_query($conn,$sql5);


  	$sql6 = "UPDATE tbl_contract SET contract_status = '1' WHERE contract_id = '".$contractid."'";
  	$result6 = mysqli_query($conn,$sql6);

  	$endcontractnew=date("d-m-Y", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+($term-1) , date("d")+0, date("Y")+0));
	$n = explode("-",$endcontractnew);
	$nn = $n[2]."-".$n[1]."-".$n[0];
  	$sql7 = "INSERT INTO tbl_contract (contract_id,contract_name,contract_idcard,contract_address,contract_job,contract_room,contract_floor,contract_start,contract_end,contract_date,contract_term,contract_price,contract_status,contract_phone,contract_remark,contract_remark1,contract_remark2,servcer_check1,server_checkin1) VALUES ('".$contractnumber."','".$row1['contract_name']."','".$row1['contract_idcard']."','".$row1['contract_address']."','".$row1['contract_job']."','".$roomname."','".$row3['r_floor']."','".date("d-m-Y")."','".$endcontractnew."','".date("d-m-Y")."','".$term." เดือน"."','".$row3['r_price']."','0','".$row1['contract_phone']."','".$fg."','".$car."','".$pin."','".date("Y")."','".$nn."')";
	$result7 = mysqli_query($conn,$sql7);


	$sql8 = "UPDATE tbl_room SET r_status = '0' WHERE r_name = '".$row1['contract_room']."'";
	$result8 = mysqli_query($conn,$sql8);


	$sql9 = "UPDATE tbl_room SET r_status = '2' WHERE r_name = '".$roomname."'";
	$result9 = mysqli_query($conn,$sql9);

	$paymenttotal = $row3['r_price'] + $newmove;
    $sqlpay111 = "INSERT INTO tbl_payment (payment_id,payment_date,payment_ref,payment_total,month1,year1) VALUES ('".$paymentid."','".date("d-m-Y")."','".$contractnumber."','".$paymenttotal."','".date("m-Y")."','".date("Y")."')";
    $resultpay111 = mysqli_query($conn,$sqlpay111);


    $sqlpay11 = "SELECT * FROM tbl_payment ORDER BY id DESC LIMIT 1";
    $resultpay11 = mysqli_query($conn,$sqlpay11);
    if (mysqli_num_rows($resultpay11)!=1){
        $paymentid1 = "PAY1";
    } else {
        $rowpay11 = mysqli_fetch_array($resultpay11);
        $a = $rowpay11['payment_id'];
        $b = substr($a,3,150);
        $c = $b+1;
        $paymentid1 = "PAY".$c;
    }

    $sqlpay222 = "INSERT INTO tbl_payment (payment_id,payment_date,payment_ref,payment_total,month1,year1) VALUES ('".$paymentid1."','".date("d-m-Y")."','".$inv1."','".$pricetotal."','".date("m-Y")."','".date("Y")."')";
    $resultpay222 = mysqli_query($conn,$sqlpay222);

	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$dateday = date("d");
	$datemonth = $thaimonth[date("m")-1];
	$dateyear = date("Y")+543;
	$sumdate = $dateday." ".$datemonth." ".$dateyear;
	$sql21 = "INSERT INTO tbl_changes (contract_old,contract_new,move_date) VALUES ('".$contractid."','".$contractnumber."','".$sumdate."')";
	$result21 = mysqli_query($conn,$sql21); 

  	$smsGateway = new SmsGateway('thadpakorn.p@gmail.com', 'mon25march');

	if($_POST["contract_phone"]>10){
			$ph = explode("-",$_POST["contract_phone"]);
			$phonenumber = $ph[0].$ph[1].$ph[2];
		} else {
			$phonenumber = $_POST["contract_phone"];
		}
	$number = '+66'.substr($phonenumber,1,10);
  	$message = "ระบบได้ทำการเปลี่ยนห้องเรียบร้อยแล้ว จากเดิมห้อง ".$row1['contract_room']." เป็นห้อง ".$roomname;
  	$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
	$roommm = $row1['contract_room'];
  	echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
      window.location='move_success.php?id1=$inv&id2=$inv1&contract=$contractnumber&room=$roommm&roomnew=$roomname&pay=$paymentid&pay1=$paymentid1&waterold=$water&elecold=$elec&waternew=$unitwaterroomold&elecnew=$unitelecroomold&waterstart=$unitwaterroomnew&elecstart=$unitelecroomnew&total=$pricetotal&total1=$newmove&air=$air&clean=$clean&fg=$fg&car=$car&pin=$pin';
  </script>";
	  }
}

if ($_GET['action']=='createpro'){
    $topic = $_POST['topic'];
    $des = $_POST['des'];
    $time1 = $_POST['time1'];
    $link = $_POST['link'];
    $sql = "INSERT INTO tbl_promotion (pro_name,pro_des,pro_time,pro_link,pro_status) VALUES ('".$topic."','".$des."','".$time1."','".$link."','0')";
    $result = mysqli_query($conn,$sql);
     echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
      history.back();
				exit();
   </script>";
}
    
if ($_GET['action']=='activepro'){
    $sql = "UPDATE tbl_promotion SET pro_status = '0' WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
      history.back();
				exit();
   </script>";
}
if ($_GET['action']=='closepro'){
     $sql = "UPDATE tbl_promotion SET pro_status = '1' WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
      history.back();
				exit();
   </script>";
}
if ($_GET['action']=='deletepro'){
     $sql = "DELETE FROM tbl_promotion WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
      history.back();
				exit();
   </script>";
}
if ($_GET['action']=='duo'){
	$sql = "INSERT INTO tbl_members (contractid,cardid,flname,address,phone,a1,a2,a3) VALUES ('".$_POST['contract']."','".$_POST['a1']."','".$_POST['a2']."','".$_POST['a3']."','".$_POST['a4']."','".$_POST['a5']."','".$_POST['a6']."','".$_POST['a7']."')";
	$result = mysqli_query($conn,$sql);
	$idccon = $_POST['contract'];
	echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
     window.location='contract_duo.php?id=$idccon';
   </script>";
}
if ($_GET['action']=='deleteduo'){
     $sql = "DELETE FROM tbl_members WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    echo "<script>
    swal({
          title: \"success!\",
          type: \"success\"
      });
      history.back();
				exit();
   </script>";
}
if ($_GET['action']=='editcontract'){
	$sql = "UPDATE tbl_contract SET contract_address = '".$_POST['a3']."',contract_phone = '".$_POST['a4']."',contract_remark = '".$_POST['a5']."',contract_remark1 = '".$_POST['a6']."',contract_remark2 = '".$_POST['a7']."' WHERE contract_id = '".$_POST['contract']."'";
	$result = mysqli_query($conn,$sql);
	echo "<br/><br/><br/><center>ระบบได้ทำการบันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว</center>";
}
if ($_GET['action']=='duoedit'){
	$sql = "UPDATE tbl_members SET address = '".$_POST['a3']."',phone = '".$_POST['a4']."',a1 = '".$_POST['a5']."',a2 = '".$_POST['a6']."',a3 = '".$_POST['a7']."' WHERE id = '".$_POST['idnumber']."'";
	$result = mysqli_query($conn,$sql);
	echo "<br/><br/><br/><center>ระบบได้ทำการบันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว</center>";
}
?>
</body>

</html>
