<?php 
session_start();
$_SESSION['captcha'] = rand();
include_once ("config.php");
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>LOGIN PAGE | THE PROUD RESIDENCE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="THEPROUDRESIDENCE" name="description" />
    <meta content="THEPROUDRESIDENCE" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/login-2.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <script type='text/javascript'>
        /***********************************************
         * Disable Text Selection script- ? Dynamic Drive DHTML code library (www.dynamicdrive.com)
         * This notice MUST stay intact for legal use
         * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
         ***********************************************/
        function disableSelection(target) {
            if (typeof target.onselectstart != 'undefined') //IE route
                target.onselectstart = function() {
                    return false;
                }
            else if (typeof target.style.MozUserSelect != 'undefined') //Firefox route
                target.style.MozUserSelect = 'none'
            else //All other route (ie: Opera)
                target.onmousedown = function() {
                    return false;
                }
            target.style.cursor = 'default';
        }
        /* Disable Right Click */
        var message = "You may not right mouse click this page.";
        if (navigator.appName == 'Microsoft Internet Explorer') {
            function NOclickIE(e) {
                if (event.button == 2 || event.button == 3) {
                    alert(message);
                    return false;
                }
                return true;
            }
            document.onmousedown = NOclickIE;
            document.onmouseup = NOclickIE;
            window.onmousedown = NOclickIE;
            window.onmouseup = NOclickIE;
        } else {
            function NOclickNN(e) {
                if (document.layers || document.getElementById && !document.all) {
                    if (e.which == 2 || e.which == 3) {
                        alert(message);
                        return false;
                    }
                }
            }
            if (document.layers) {
                document.captureEvents(Event.MOUSEDOWN);
                document.onmousedown = NOclickNN;
            }
            document.oncontextmenu = new Function("alert(message);return false")
        }

        function disableCtrlKeyCombination(e) {
            //list all CTRL + key combinations you want to disable
            var forbiddenKeys = new Array('a', 'c', 's', 'u', 'x');
            var key;
            var isCtrl;
            if (window.event) {
                key = window.event.keyCode; //IE
                if (window.event.ctrlKey) isCtrl = true;
                else isCtrl = false;
            } else {
                key = e.which; //firefox
                if (e.ctrlKey) isCtrl = true;
                else isCtrl = false;
            }
            //if ctrl is pressed check if other key is in forbidenKeys array
            if (isCtrl) {
                for (i = 0; i < forbiddenKeys.length; i++) {
                    //case-insensitive comparation
                    if (forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase()) {
                        alert('Key combination CTRL + ' + String.fromCharCode(key) + ' has been disabled.');
                        return false;
                    }
                }
            }
            return true;
        }

    </script>
    <script type="text/javascript" src="/a/script/textsizer.js">
        /***********************************************
         * Document Text Sizer- Copyright 2003 - Taewook Kang.  All rights reserved.
         * Coded by: Taewook Kang (http://www.txkang.com)
         * This notice must stay intact for use
         * Visit http://www.dynamicdrive.com/ for full source code
         ***********************************************/

    </script>
    <script language="JavaScript1.2">
        function disableselect(e) {
            return false
        }

        function reEnable() {
            return true
        }
        //if IE4+
        document.onselectstart = new Function("return false")
        //if NS6
        if (window.sidebar) {
            document.onmousedown = disableselect
            document.onclick = reEnable
        }

    </script>

</head>
<!-- END HEAD -->

<body class="login" onKeyPress="return disableCtrlKeyCombination(event);" onKeyDown="return disableCtrlKeyCombination(event);">
   <?php
    include 'test_browser.php';
if(get_browser_name($_SERVER['HTTP_USER_AGENT']) != 'Chrome'){
			die("<script>
				swal({
  					title: \"Error!\",
                    text: \"ระบบรองรับการทำงานบน Google Chrome เท่านั้น\",
  					type: \"error\"
				});
				exit();
			 </script>");
}
    ?>
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="">
            <h1>THE PROUD RESIDENCE</h1>
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="" method="post">
            <div class="form-title">
                <span class="form-title">กรุณาเข้าสู่ระบบ.</span>
                <span class="form-subtitle">โปรดระบุชื่อผู้ใช้งานและรหัสผ่านของท่าน.</span>
            </div>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> ห้ามมีช่องว่าง โปรดระบุข้อมูล </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">ชื่อผู้ใช้งาน</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="USERNAME" name="username" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">รหัสผ่าน</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="PASSWORD" name="password" /> </div>
            <div class="form-actions">
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Please confirm number below" name="captcha" required/>
                <input type="hidden" name="captcha1" value="<?php echo $_SESSION['captcha'] ?>">
                <center><label class="control-label"><?php echo $_SESSION['captcha'] ?></label></center>
            </div>
            <div class="form-actions">
                <input class="btn red btn-block uppercase" name="submit" value="เข้าสู่ระบบ" type="submit">
            </div>
            <div class="form-actions">
                <div class="pull-right forget-password-block">
                    <a href="javascript:;" id="forget-password" class="forget-password">ลืมรหัสผ่าน/ชื่อผู้ใช้งานโดนบล็อค ?</a>
                </div>
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="" method="post">
            <div class="form-title">
                <span class="form-title">ลืมรหัสผ่าน/ชื่อผู้ใช้งานโดนบล็อค ?</span>
                <span class="form-subtitle">กรุณาระบุชื่อผู้ใช้งานและรหัสรักษาความปลอดภัยของท่าน.</span>
            </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="USERNAME" name="username" /> </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="SECRET CODE" name="code" /> </div>
            <div class="form-group">
                <select class="form-control placeholder-no-fix" name="select1" />
                <option value="1">ปลดล็อคชื่อผู้ใช้งาน</option>
                <option value="2">ต้องการรีเซ็ตรหัสผ่าน</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">ย้อนกลับ</button>
                <input class="btn btn-primary uppercase pull-right" name="submit" value="ปลดล็อค/รีเซ็ต" type="submit">
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright"> 2017 THE PROUD RESIDENCE. Admin Dashboard Template. <a onclick="window.open('securityandprivacy.php', '_blank', 'location=yes,height=400,width=700,scrollbars=yes,status=yes');">นโยบายความปลอดภัยและความเป็นส่วนตัว.</a></div>
    <!-- END LOGIN -->
    <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/pages/scripts/login.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
<?php
if ($_POST){
    session_start();
    $submit = $_POST['submit'];
    $select1 = $_POST['select1'];
    if ($submit == 'เข้าสู่ระบบ'){
	$captcha = $_POST['captcha'];
        $captcha1 = $_POST['captcha1'];
	if ($captcha != $captcha1){
        session_destroy();
		die("<script>
			swal({
  			title: \"Error!\",
            text: \"รหัสยืนยันไม่ถูกต้อง\",
  			type: \"error\"
		});
        exit();
		</script>");
	} else {
        session_start();
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM tbl_user WHERE username = '".$username."' AND password = '".$password."'";
		$result = mysqli_query($conn,$sql) or die ("ERROR : ".mysqli_error($sql));

		if (mysqli_num_rows($result)!=1){
            session_start();
            session_destroy();
			die("<script>
				swal({
  					title: \"Error!\",
                    text: \"ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง\",
  					type: \"error\"
				});
				exit();
			 </script>");
		} else {
			$row = mysqli_fetch_array($result);
			if ($row['status']==1){
				die("<script>
				swal({
  					title: \"Error!\",
                    text: \"ระบบไม่อนุญาตให้เข้าสู่ระบบมากกว่าหนึ่งอุปกรณ์\",
  					type: \"error\"
				});
				exit();
			 </script>");
            } elseif ($row['sta']==1){
				die("<script>
				swal({
  					title: \"Error!\",
                    text: \"ผู้ใช้งานดังกล่าวถูกระงับการใช้งานชั่วคราว กรุณาติดต่อผู้ดูแลระบบ\",
  					type: \"error\"
				});
				exit();
			 </script>");
			} else {

				if ($row['login']==""){
					$_SESSION['login'] = "ยังไม่เคยใช้งานระบบมาก่อน";
				} else {
					$_SESSION['login'] = $row['login'];
				}

				//login

				session_start();
				$_SESSION['id'] = $row['id'];
				$_SESSION['ids'] = $row['username'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['phone'] = $row['phone'];
                $abcdef = rand();
                $ffgth = $abcdef."/".gethostname();
                $_SESSION['machine_name'] = $ffgth;
				$logindate = date('d-m-Y h:i:sa');
				$sqllogin = "UPDATE tbl_user SET login = '".$logindate."', status = '1',machine_name = '".$ffgth."' WHERE username = '".$username."'";
				$result = mysqli_query($conn,$sqllogin);
				$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','เข้าใช้งานระบบ','".date("Y-m-d h:m:sa")."')";
				$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
				echo "<script>
					swal({
  					title: \"success!\",
                    text: \"เข้าสู่ระบบสำเร็จ\",
  					type: \"success\"
					});
                    window.location='index.php';
		  		</script>";
			}
		}
	}
    }
  if ($submit == 'ปลดล็อค/รีเซ็ต'){
    if ($select1 == '1'){
        $username = $_POST['username'];
	$code = md5($_POST['code']);
	$sql = "SELECT username FROM tbl_user WHERE username = '".$username."' AND code = '".$code."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)!=1){
		die("<script>
				swal({
  					title: \"Error!\",
                    text: \"ข้อมูลไม่ถูกต้อง\",
  					type: \"error\"
				});
				exit();
			 </script>");
	} else {
	$sqlupdate = "UPDATE tbl_user SET status = '0' WHERE username = '".$username."'";
	$update = mysqli_query($conn,$sqlupdate) or die("Err : $sqlupdate");
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$username."','ปลดล็อคผู้ใช้งาน','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	echo "<script>
			swal({
  					title: \"success!\",
                    text: \"ปลดล็อคผู้ใช้งานสำเร็จ\",
  					type: \"success\"
				});
		  </script>";
	}
    } else {
    $username = $_POST['username'];
	$code = md5($_POST['code']);
	$sql = "SELECT username FROM tbl_user WHERE username = '".$username."' AND code = '".$code."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)!=1){
		die("<script>
				swal({
  					title: \"Error!\",
                    text: \"ข้อมูลไม่ถูกต้อง\",
  					type: \"error\"
				});
				exit();
			 </script>");
	} else {
    $pw = rand();
	$newpassword = md5($pw);
	$sqlupdate = "UPDATE tbl_user SET password = '".$newpassword."' WHERE username = '".$username."'";
	$update = mysqli_query($conn,$sqlupdate) or die("Err : $sqlupdate");
	$sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$username."','เปลี่ยนรหัสผ่าน','".date("Y-m-d h:m:sa")."')";
	$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
	echo "<script>
			swal({
  					title: \"success!\",
					text: \"รหัสผ่านใหม่ : $pw\",
  					type: \"success\"
				});
		  </script>";
	}
    }
}
}
?>
