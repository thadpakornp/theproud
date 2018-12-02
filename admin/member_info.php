<?php
date_default_timezone_set("Asia/Bangkok");
//check user = admin
session_start();
include_once 'test_online.php';
if ($_SESSION['role']!='A'){
	die("<script>
				alert('Access not allow');
				window.location='logout.php';
			 </script>");
}
include_once ("config.php");

$sql = "SELECT * FROM tbl_member WHERE id = '".$_GET['id']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin Dashboard | THE PROUD RESIDENCE</title>
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

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                    <!-- END PAGE BREADCRUMBS -->



                                    <div class="page-content-inner">
                                        <div class="invoice">
                                            <div class="row invoice-logo">
                                                <div class="col-xs-6 invoice-logo-space">
                                                    <img src="../assets/pages/media/invoice/14975889_1134711006604817_1463979142_o.png" class="img-responsive" alt="" Width="300" height="83"/> </div>
                                                <div class="col-xs-6">
                                                    <p> ประวัติส่วนบุคคล 
                                                       <br/> รหัส <?php echo $row['id'] ?>
                                                        <address class="pull-right">
                                                            <strong>The Proud Residence.</strong>
                                                            <br/> 153 หมู่ 4 ตำบลโพไร่หวาน
                                                            <br/> อำเภอเมือง จังหวัดเพชรบุรี 
                                                            <br/> 76000 , ประเทศไทย
                                                            <br/> 0959829415,0946463563
                                                        </address>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="col-xs-12">
                                                <h4>ข้อมูลส่วนตัว</h4>
                                                <hr/>
                                                <table border="0" width="100%">
                                                    <tr>
                                                        <td width="50%">ชื่อ-นามสกุล : <strong><?php echo $row['member_name'] ?></strong></td>
                                                        <td width="50%">เลขที่บัตรประชาชน : <strong><?php echo $row['member_idcard'] ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">ที่อยู่ : <strong><?php echo $row['member_address'] ?></strong></td>
                                                        <td width="50%">เบอร์โทรติดต่อ : <strong><?php echo $row['member_phone'] ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">วัน/เดือน/ปี เกิด : <strong><?php echo $row['member_hbd'] ?></strong></td>
                                                        <td width="50%">สถานะภาพ : <strong><?php echo $row['member_single'] ?></strong></td>
                                                    </tr>
                                                </table>
                                                <hr/>
                                                <h4>ข้อมูลทางการแพทย์</h4>
                                                <hr/>
                                                <table border="0" width="100%">
                                                    <tr>
                                                        <td width="50%">โรคประจำตัว : <strong><?php echo $row['member_sick'] ?></strong></td>
                                                        <td width="50%">แพ้ยา : <strong><?php echo $row['member_medical'] ?></strong></td>
                                                    </tr>
                                                </table>
                                                <h4>ข้อมูลผู้ติดต่อ</h4>
                                                <hr/>
                                                 <table border="0" width="100%">
                                                    <tr>
                                                        <td width="50%"><strong>บุคคลที่ 1</strong></td>
                                                        <td width="50%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">ชื่อ-นามสกุล : <strong><?php echo $row['members_name'] ?></strong></td>
                                                        <td width="50%">ความสัมพันธ์ : <strong><?php echo $row['members_relationship'] ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">เบอร์โทรติดต่อ : <strong><?php echo $row['members_phone'] ?></strong></td>
                                                        <td width="50%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%"><strong>บุคคลที่ 2</strong></td>
                                                        <td width="50%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">ชื่อ-นามสกุล : <strong><?php echo $row['members_name1'] ?></strong></td>
                                                        <td width="50%">ความสัมพันธ์ : <strong><?php echo $row['members_relationship1'] ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">เบอร์โทรติดต่อ : <strong><?php echo $row['members_phone1'] ?></strong></td>
                                                        <td width="50%"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                               <div class="col-xs-12 invoice-payment">
                                                    <h5>ลงชื่อ ......................................... ผู้รับรอง</h5>
                                                </div>
                                                <br/>
                                                <br/>
                                                <br/>
                                                <div class="col-xs-12 invoice-payment">
                                                    <h5 class="pull-right">พิมพ์โดย <?php echo $_SESSION['firstname'] ?>  <?php echo $_SESSION['lastname'] ?> [<?php echo date("Y-m-d h:i:sa") ?>]</h5>
                                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                                            
</div>
</div>

                            <!-- END PAGE CONTENT BODY -->
                            
                            
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
        </div>
        
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