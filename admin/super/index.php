<?php 
include '../time.php';
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
if (isset($_SESSION['user'])){
	$newpw = rand();
		echo "
<!DOCTYPE html>
<html lang=\"en\">

    <head>
        <meta charset=\"utf-8\" />
        <title>SUPER ADMIN PAGE | Managed Users</title>
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta content=\"width=device-width, initial-scale=1\" name=\"viewport\" />
        <meta content=\"\" name=\"author\" />
        <link href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/plugins/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/plugins/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/plugins/datatables/datatables.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/global/css/components.min.css\" rel=\"stylesheet\" id=\"style_components\" type=\"text/css\" />
        <link href=\"../../assets/global/css/plugins.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/layouts/layout3/css/layout.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"../../assets/layouts/layout3/css/themes/default.min.css\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\" />
        <link href=\"../../assets/layouts/layout3/css/custom.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <script type=\"text/javascript\" src=\"../dist/sweetalert.min.js\"></script>
		<link rel=\"stylesheet\" href=\"../dist/sweetalert.css\" type=\"text/css\"  media=\"all\" />
		<script type=\"text/javascript\">
	function ck_frm(){
		var ck = document.getElementById('ckk');
		if(ck.checked == true){
		document.getElementById('frm_txt').style.display = \"\";
		}else{
		document.getElementById('frm_txt').style.display = \"none\";
		}

	}
</script>
	<script type=\"text/javascript\">
	function ck_frm1(){
		var ck = document.getElementById('ckk1');
		if(ck.checked == true){
		document.getElementById('frm_txt1').style.display = \"\";
		}else{
		document.getElementById('frm_txt1').style.display = \"none\";
		}

	}
</script>
		</head>
		<body class=\"page-container-bg-solid\">
		<div class=\"page-wrapper\">
            <div class=\"page-wrapper-row full-height\">
                <div class=\"page-wrapper-middle\">
                    <div class=\"page-container\">
                        <div class=\"page-content-wrapper\">
                            <div class\"page-head\">
                                <div class=\"container\">
                                    <div class=\"page-title\">
                                        <h1>
										<a href=\"index.php\" style=\"text-decoration:none\">Managed users</a>
										 | 
										<a href=\"log.php\" style=\"text-decoration:none\">Logs</a>
                                        | 
                                         <a href=\"logout.php\" style=\"text-decoration:none\">LogOut</a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class=\"page-content\">
                                <div class=\"container\">
                                    <div class=\"page-content-inner\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"portlet light\">
                                                    <div class=\"portlet-body\">
													<center><input type=\"checkbox\" name=\"ckk\" id=\"ckk\" onClick=\"ck_frm();\" />ต้องการเปลี่ยนรหัสผ่าน
													<input type=\"checkbox\" name=\"ckk1\" id=\"ckk1\" onClick=\"ck_frm1();\" />เพิ่มผู้ใช้งานระดับแอดมิน
													</center>
                                                        
														<table class=\"table table-striped table-bordered table-hover table-checkable order-column\" id=\"sample_1\">
                                                            <thead>
                                                                <tr>
                                                                    <th> Username </th>
                                                                    <th> Name </th>
                                                                    <th> Phone </th>
																	<th> Status </th>
                                                                    <th> Actions </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>";
                                                                $sql1 = "SELECT * FROM tbl_user WHERE role != 'SPA' ORDER BY id ASC";
															$result1 = mysqli_query($conn,$sql1) or die ("ERROR : ".mysqli_error($sql1));
															while($row = mysqli_fetch_array($result1)){
															echo "
                                                                <tr class=\"odd gradeX\">
                                                                    <td class=\"center\" width=\"20%\"> ".$row['username']." </td>
                                                                    <td class=\"center\" width=\"30%\"> ".$row['firstname']." ".$row['lastname']." </td>
                                                                    <td class=\"center\" width=\"20%\"> ".$row['phone']." </td>
																	<td class=\"center\" width=\"10%\"> ";
																	if($row['sta']==0){echo"<span class=\"label label-sm label-info\">Active</span>";}else{echo"<span class=\"label label-sm label-danger\">Block</span>";}
																	echo " </td>
                                                                    <td class=\"center\" width=\"20%\">
																	<form action=\"\" method=\"post\">
																	<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\">
																	<input type=\"hidden\" name=\"phone\" value=\"".$row['phone']."\">
																	<input type=\"hidden\" name=\"newpw\" value=\"".$newpw."\">
																	<input class=\"btn blue\" type=\"submit\" value=\"Reset\" id=\"submit\" name=\"submit\">";
																	if($row['sta']==0){echo"<input class=\"btn red\" type=\"submit\" value=\"Block\" id=\"submit\" name=\"submit\">";}else{echo"<input class=\"btn blue\" type=\"submit\" value=\"Active\" id=\"submit\" name=\"submit\">";}
																	echo "
																	</form>
																	</td>
                                                                </tr>";
                                                                }
															echo "
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
							<div id=\"frm_txt2\" style=\"display:none;\">
							<div class=\"page-content\">
                                <div class=\"container\">
                                    <div class=\"page-content-inner\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"portlet light\">
                                                    <div class=\"portlet-body\">
															<label><h2>Log</h2></label>
															<table class=\"table table-striped table-bordered table-hover table-checkable order-column\" id=\"sample_2\">
                                                            <thead>
                                                                <tr>
                                                                    <th> ID </th>
                                                                    <th> Username </th>
                                                                    <th> msg </th>
																	<th> Date </th>
                                                                </tr>
                                                            </thead>";
															$sql2 = "SELECT * FROM tbl_log";
															$result2 = mysqli_query($conn,$sql2) or die ("ERROR : ".mysqli_error($sql2));
															while($row1 = mysqli_fetch_array($result2)){
															echo "
                                                            <tbody>
                                                                <tr class=\"odd gradeX\">
                                                                    <td class=\"center\" width=\"5%\"> ".$row1['id']." </td>
                                                                    <td class=\"center\" width=\"10%\"> ".$row1['ref']." </td>
                                                                    <td class=\"center\" width=\"75%\"> ".$row1['msg']." </td>
																	<td class=\"center\" width=\"10%\"> ".$row1['log_date']." </td>
                                                                </tr>
                                                            </tbody>";
															}
															echo "
                                                        </table>
														 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
														</div>
										 "; ?>
      <?php //ส่วนนี้เอาไว้ส่วนที่เราจะให้แสดง

$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = number_format(($endtime - $starttime),2);
echo "<center>หน้านี้ประมวลผล ".$totaltime." วินาที</center>";
echo
    "
								<div id=\"frm_txt1\" style=\"display:none;\">
							<div class=\"page-content\">
                                <div class=\"container\">
                                    <div class=\"page-content-inner\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"portlet light\">
                                                    <div class=\"portlet-body\">
													<form action=\"\" method=\"post\">
																<div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Username</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Username\" name=\"username1\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																 <div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Password</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Password\" name=\"password3\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																 <div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Confirm Password</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Contirm Password\" name=\"password4\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Secret Code</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Secret Code\" name=\"secret\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Confirm Secret Code</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Confirm Secret Code\" name=\"secret1\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">First Name</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"First Name\" name=\"firstname\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Last Name</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Last Name\" name=\"lastname\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Phone</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"phone\" name=\"phone\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<center><input class=\"btn blue\" type=\"submit\" value=\"Create\" id=\"submit\" name=\"submit\"></center>
															</form>
													
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
														</div>

								<div id=\"frm_txt\" style=\"display:none;\">
							<div class=\"page-content\">
                                <div class=\"container\">
                                    <div class=\"page-content-inner\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"portlet light\">
                                                    <div class=\"portlet-body\">
													
													<form action=\"\" method=\"post\">
																 <div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">New Password</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"New Password\" name=\"password1\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																 <div class=\"form-group\">
                                                                    <label for=\"exampleInputPassword1\">Confirm New Password</label>
                                                                    <div class=\"input-group\">
                                                                        <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Contirm New Password\" name=\"password2\">
                                                                        <span class=\"input-group-addon\">
                                                                        </span>
                                                                    </div>
                                                                </div>
																<center><input class=\"btn blue\" type=\"submit\" value=\"Go\" id=\"submit\" name=\"submit\"></center>
															</form>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
														</div>
										
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<script src=\"../assets/global/plugins/respond.min.js\"></script>
<script src=\"../assets/global/plugins/excanvas.min.js\"></script> 
<script src=\"../assets/global/plugins/ie8.fix.min.js\"></script> 
        <script src=\"../../assets/global/plugins/jquery.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/js.cookie.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/jquery.blockui.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/scripts/datatable.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/datatables/datatables.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/global/scripts/app.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/pages/scripts/table-datatables-managed.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/layouts/layout3/scripts/layout.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/layouts/layout3/scripts/demo.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/layouts/global/scripts/quick-sidebar.min.js\" type=\"text/javascript\"></script>
        <script src=\"../../assets/layouts/global/scripts/quick-nav.min.js\" type=\"text/javascript\"></script>
    </body>

</html>
";
}
if ($_POST){
	$submit = $_POST['submit'];
	if ($submit == 'Reset'){
		$phone = $_POST['phone'];
		$phonesent = substr($phone ,1,10);
		$id = $_POST['id'];
		$new = $_POST['newpw'];
		$newsc = md5($new);
		$deviceID = 50372;
	
		include "smsGateway.php";
		$smsGateway = new SmsGateway('thadpakorn.p@gmail.com', 'mon25march');

		$number = '+66'.$phonesent;
		$message = "รหัสลับของคุณคือ : ".$new;
	
		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

		if($result) {
			$sql = "UPDATE tbl_user SET code = '$newsc' WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','รีเซ็ตรหัสลับ','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			echo "<script>
				swal({
  					title: \"success!\",
  					type: \"success\",
					text: \"ระบบได้ทำการออกรหัสลับใหม่แล้ว\"
				});
			</script>";
		} else {
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','รีเซ็ตรหัสลับไม่สำเร็จ','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			echo "<script>
				swal({
  					title: \"error!\",
  					type: \"error\",
					text: \"ระบบทำงานผิดพลาด กรุณาลองใหม่ภายหลัง\"
				});
			</script>";
		}
	}
	if ($submit == 'Block'){
		$id = $_POST['id'];
		$sql = "UPDATE tbl_user SET sta = '1' WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','บล็อคยูซเซอร์','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
		echo "<script>
				swal({
  					title: \"success!\",
  					type: \"success\",
					text: \"ระบบได้ทำการบล็อคผู้ใช้งานเรียบร้อยแล้ว\"
				});
			</script>";
	}
	if ($submit == 'Active'){
		$id = $_POST['id'];
		$sql = "UPDATE tbl_user SET sta = '0' WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','เปิดใช้งานยูซเซอร์','".date("Y-m-d h:m:sa")."')";
		$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			echo "<script>
				swal({
  					title: \"success!\",
  					type: \"success\",
					text: \"ระบบได้ทำการปลดบล็อคผู้ใช้งานเรียบร้อยแล้ว\"
				});
			</script>";
	}
	if ($submit == 'Go'){
		$userid = $_SESSION['user'];
		$passwd1 = $_POST['password1'];
		$passwd2 = $_POST['password2'];
		if ($passwd2 != $passwd1){
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','รหัสผ่านไม่ตรงกัน','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			echo "<script>
				swal({
  					title: \"error!\",
  					type: \"error\",
					text: \"รหัสผ่านไม่ตรงกัน\"
				});
			</script>";
		} else {
			$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','เปลี่ยนรหัสผ่าน','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
			$passmd = md5($passwd2);
			$sql = "UPDATE tbl_user SET password = '$passmd' WHERE username = '$userid'";
			$result = mysqli_query($conn,$sql);
			echo "<script>
				swal({
  					title: \"success!\",
  					type: \"success\",
					text: \"ระบบได้ทำการปลดบล็อคผู้ใช้งานเรียบร้อยแล้ว\"
				});
			</script>";
		}
	}
	if ($submit == 'Create'){
		$username = $_POST['username1'];
		$pwd3 = $_POST['password3'];
		$pwd4 = $_POST['password4'];
		$sc1 = $_POST['secret1'];
		$sc2 = $_POST['secret'];
		$fn = $_POST['firstname'];
		$ln = $_POST['lastname'];
        $namename = $fn." ".$ln;
		$ph = $_POST['phone'];
		if ($passwd4 != $passwd3){
			echo "<script>
				swal({
  					title: \"error!\",
  					type: \"error\",
					text: \"รหัสผ่านไม่ตรงกัน\"
				});
				exit();
			</script>";
		} 
		elseif ($sc1 != $sc2){
			echo "<script>
				swal({
  					title: \"error!\",
  					type: \"error\",
					text: \"รหัสลับไม่ตรงกัน\"
				});
				exit();
			</script>";
		} else { 
			$sql1 = "SELECT username FROM tbl_user WHERE username = '".$username."'";
			$result1 = mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result1)==1){
				echo "<script>
					swal({
						title: \"error!\",
						type: \"error\",
						text: \"ชื่อผู้ใช้งานนี้มีอยู่ในระบบแล้ว\"
					});
					exit();
				</script>";
			} else {
				$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SERVER['PHP_AUTH_USER']."','สร้างผู้ใช้งานใหม่','".date("Y-m-d h:m:sa")."')";
				$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
				$scmd = md5($sc1);
				$pwmd = md5($pwd3);
				$sql = "INSERT INTO tbl_user (username,password,firstname,phone,role,sta,code) VALUES ('".$username."','".$pwmd."','".$namename."','".$ph."','A','0','".$scmd."')";
				$result = mysqli_query($conn,$sql);
					echo "<script>
						swal({
							title: \"success!\",
							type: \"success\",
							text: \"สร้างผู้ใช้งานสำเร็จ\"
						});
					</script>";
			}
		}
	}
}
?>