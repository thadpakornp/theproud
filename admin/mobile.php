<?php
header("Refresh:2");
date_default_timezone_set("Asia/Bangkok");
//check user = admin
session_start();
include_once ("config.php");
$sqlcheck1 = "SELECT * FROM tbl_up WHERE contract_id = '".$_GET['cid']."'";
$resultcheck1 = mysqli_query($conn,$sqlcheck1);
if (mysqli_num_rows($resultcheck1)!=1){
    $sql = "INSERT INTO tbl_up (contract_id,up_1,up_2,up_3,up_4,up_5) VALUES ('".$_GET['cid']."','0','0','0','0','0')";
    $result = mysqli_query($conn,$sql);
}
if ($_SESSION['role']!='A'){
	die("<script>
				alert('Access not allow');
				window.location='logout.php';
			 </script>");
}
    echo "<br/><center><h2><strong>Passkey:</strong></h2></center>";
    echo "<center><h3><strong><font color=\"red\">".base64_encode($_GET['cid'])."</font></strong></h3></center>";

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
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <title>Admin Dashboard | THEPROUDRESIDENCE</title>
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
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        </head>
    <!-- END HEAD -->

    <body>
    <form action="cmd.php?action=cuser" method="post">
        <input type="hidden" value="<?php echo $_GET['cid'] ?>" name="contract_id"/>
                                        <input type="hidden" value="<?php echo $_GET['name'] ?>" name="username"/>
                                        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="userid"/>
                                        <input type="hidden" value="<?php echo $_GET['phone'] ?>" name="userphone"/>
                                        <?php 
    $sqlcheck = "SELECT * FROM tbl_up WHERE contract_id = '".$_GET['cid']."'";
               $resultcheck = mysqli_query($conn,$sqlcheck);
               $rowcheck = mysqli_fetch_array($resultcheck);
               
               $sqlcheck9 = "SELECT * FROM tbl_contract WHERE contract_id = '".$_GET['cid']."'";
               $resultcheck9 = mysqli_query($conn,$sqlcheck9);
               $rowcheck9 = mysqli_fetch_array($resultcheck9); 
               if ($rowcheck['up_1']=='0'){
                   echo "<center><font color=\"red\">1. กรุณาเข้าสู่เว็บไซต์ theproudresidence.com/upload.php</font></center>";
               } else {
                   echo "<center><font color=\"green\">1. กรุณาเข้าสู่เว็บไซต์ theproudresidence.com/upload.php เสร็จสมบูรณ์</font></center>";
               }
               
               if ($rowcheck['up_2']=='0'){
                   echo "<center><font color=\"red\">2. กำลังรอการเชื่อมต่อผ่านมือถือ</font></center>";
               } else {
                   echo "<center><font color=\"green\">2. การเชื่อมต่อผ่านมือถือสมบูรณ์</font></center>";
               }
               
               if ($rowcheck['up_3']=='0'){
                   echo "<center><font color=\"red\">3. กำลังรอการอัพโหลดสัญญาหน้าที่ 1</font></center>";
               } else {
                   $img1 = $rowcheck9['img1'];
                   if ($img1 != ""){
                       echo "<center><font color=\"green\">3. การอัพโหลดสัญญาหน้าที่ 1 สมบูรณ์</font></center>";
                   }
               }
               
               if ($rowcheck['up_4']=='0'){
                   echo "<center><font color=\"red\">4. กำลังรอการอัพโหลดสัญญาหน้าที่ 2</font></center>";
               } else {
                   $img2 = $rowcheck9['img2'];
                   if ($img2 != ""){
                       echo "<center><font color=\"green\">4. การอัพโหลดสัญญาหน้าที่ 2 สมบูรณ์</font></center>";
                   }
               }
               
               if ($rowcheck['up_5']=='0'){
                   echo "<center><font color=\"red\">5. กำลังรอกระบวนการทำงาน</font></center>";
               } else {
                   echo "<p align=\"center\"><input type=\"submit\" value=\"5. อัพโหลดผ่านมือถือสำเร็จ\" /></p>";
               }
        ?>
    </form>
    
        
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>