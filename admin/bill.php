<?php
include 'time.php';
include_once 'test_online.php';
date_default_timezone_set("Asia/Bangkok");
//check user = admin
session_start();
if ($_SESSION['role']!='A'){
	die("<script>
				alert('Access not allow');
				window.location='logout.php';
			 </script>");
}
include_once ("config.php");
$paymentid = base64_decode($_GET['pid']);
$invoiceid = base64_decode($_GET['nid']);
$reservename = $_GET['rn'];
$reserveroom = $_GET['rr'];
$reservesize = $_GET['rs'];
$reservefloor = $_GET['rf'];
	
$contractname = $_GET['cn'];
$contractroom = $_GET['cr'];
$contractfloor = $_GET['cf'];
$sql = "SELECT * FROM tbl_payment WHERE payment_id = '".$paymentid."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM tbl_usage WHERE usage_id = '".$invoiceid."'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
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

    <body class="page-container-bg-solid" onload="window.print()">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                   <?php include 'header.php'; ?>
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>ระบบบิล
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
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
                                                    <p> ใบเสร็จรับเงินจอง/สัญญา
                                                    <br/><?php echo $paymentid ?>
                                                        <address class="pull-right">
                                                            <strong>The Proud Residence.</strong>
                                                            <br/> 153 หมู่ 4 ตำบลโพไร่หวาน
                                                            <br/> อำเภอเมือง จังหวัดเพชรบุรี 
                                                            <br/> 76000 , ประเทศไทย
                                                            <br/> 0959829415,0946463563
                                                            <br/> ต้นฉบับ
                                                        </address>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                <?php if ($_GET['u']!= ""){
                                                            echo "
                                                           <h4>ชื่อผู้จอง : ". $reservename ."</h4>
                                                            ";
                                                }
                                                        ?>
                                                    
                                                    <h4>ชื่อผู้ทำสัญญา : <?php echo $contractname ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th> รายการการทำสัญญา </th>
                                                                <th> เป็นเงิน </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if ($_GET['u']==""){
                                                            echo "
                                                            <tr>
                                                                <td> ไม่มีการจองห้องพักล้วงหน้า</td>
                                                                <td> ". number_format($row1['usage_total'],2) ."฿ </td>
                                                            </tr>
                                                            ";
                                                         } else {
                                                            echo "
                                                            <tr>
                                                                <td> ค่าจองห้อง ". $reserveroom ." | ชั้น ". $reservefloor ." | ขนาด ". $reservesize ."</td>
                                                                <td> ". number_format($row1['usage_total'],2) ."฿ </td>
                                                            </tr>
                                                            ";
                                                         }
                                                        ?>
                                                            <tr>
                                                                <td> ค่าทำสัญญา ห้อง <?php echo $contractroom ?> | ชั้น <?php echo $contractfloor ?> </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td> สัญญาเลขที่ <?php echo $row1['usage_ref'] ?> | น้ำเริ่มต้น <?php echo $row1['usage_water'] ?> | ไฟเริ่มต้น <?php echo $row1['usage_elec'] ?></td>
                                                                <td> <?php echo number_format($row1['usage_total'],2) ?>฿ </td>
                                                            </tr>
															 <tr>
                                                                <td> ส่วนลดการทำสัญญา</td>
                                                                <td> <?php echo number_format($_GET['discount'],2) ?>฿ </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                <div class="col-xs-12 invoice-block">
                                                    
                                                    <?php 
                                                    if ($_GET['u']==""){
                                                        echo "
                                                        <ul class=\"list-unstyled amounts\">
                                                        <li>
                                                            <strong>Amount:</strong> ".number_format(($row1['usage_total']+$row1['usage_total']),2)."฿ </li>
                                                        <li>
                                                            <strong>Discount:</strong> ".number_format($_GET['discount'],2)."฿</li>
                                                        <li>
                                                            <strong>Total:</strong> ".number_format(($row1['usage_total']+$_GET['discount']+$row1['usage_total']),2)."฿ </li>
                                                        </ul>
                                                        ";
                                                    } else {
                                                        echo "
                                                        <ul class=\"list-unstyled amounts\">
                                                        <li>
                                                            <strong>Amount:</strong> ".number_format($row1['usage_total'],2) ."฿ </li>
                                                        <li>
                                                            <strong>Discount:</strong> -".number_format($row1['usage_total']+$_GET['discount'],2) ."฿ </li>
                
                                                        <li>
                                                            <strong>Total:</strong> ".number_format($row1['usage_total']+$_GET['discount'],2) ."฿ </li>
                                                            
                                                    </ul>
                                                        ";
                                                    }
                                                    ?>
                                                    
                                                </div>
                                                <div class="row"><center>
                                                <div class="col-xs-6 pull-right">
                                                <p>ลงชื่อ .................................... ผู้รับเงิน</p>
                                                <p>(  นางปราณี  วรรณงาม   )</p>
                                            </div></center>
                                            </div>
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
            <?php include 'footer.php'; ?>
        </div>
        <!-- BEGIN QUICK NAV -->
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>
            <ul>
                <li>
                    <a href="changelog.php" target="_blank">
                        <span>Changelog</span>
                        <i class="icon-graph"></i>
                    </a>
                </li>
            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        
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