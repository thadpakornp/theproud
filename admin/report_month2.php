<?php include 'time.php'; ?>
<?php
date_default_timezone_set("Asia/Bangkok");
//check user = admin
session_start();
include_once 'test_online.php';
if ($_SESSION['role'] != 'A') {
    die("<script>
				alert('Access not allow');
				window.location='logout.php';
			 </script>");
}
include_once ("config.php");
$n = explode("-",$_POST['m']);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$datemonth = $thaimonth[$n[0]-1];
$dateyear = $n[1]+543;
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
    <!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>รายรับประจำเดือน <?php echo $datemonth." ".$dateyear ?> | THE PROUD RESIDENCE</title>
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
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        </script>
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
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
                        <div class="container">


                        <div class="row">
                        <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption font-dark">
                                                            <i class="font-dark"></i>
                                                            <span class="caption-subject bold uppercase">รายรับประจำเดือน <?php echo $datemonth." ".$dateyear ?></span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                            <thead>
                                                                <tr>
                                                                    <th>ห้อง</th>
                                                                    <th>ชื่อ-นามสกุล</th>
                                                                    <th>แบบ</th>
                                                                    <th>ค่าเช่า</th>
                                                                    <th>หน่วยไฟ</th>
                                                                    <th>ราคาไฟ</th>
                                                                    <th>หน่วยน้ำ</th>
                                                                    <th>ราคาน้ำ</th>
                                                                    <th>อื่นๆ</th>
                                                                    <th>รวม</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>ห้อง</th>
                                                                    <th>ชื่อ-นามสกุล</th>
                                                                    <th>แบบ</th>
                                                                    <th>ค่าเช่า</th>
                                                                    <th>หน่วยไฟ</th>
                                                                    <th>ราคาไฟ</th>
                                                                    <th>หน่วยน้ำ</th>
                                                                    <th>ราคาน้ำ</th>
                                                                    <th>อื่นๆ</th>
                                                                    <th>รวม</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                             <?php
                                                             $sumallsum1 = 0;
                                                             $sumallsum2 = 0;
                                                             $sumallsum3 = 0;
                                                             $sumallsum4 = 0;
                                                             $sumallsum5 = 0;
                                                             $sumallsum6 = 0;
                                                             $sumallsum7 = 0;
                                                            $sqlsetting = "SELECT * FROM tbl_setting ORDER BY id LIMIT 1";
                                                            $resultwetting = mysqli_query($conn,$sqlsetting);
                                                            $rowsetting = mysqli_fetch_array($resultwetting); 
                                                            $priceelec = $rowsetting['unit_elec'];
                                                            $pricewater = $rowsetting['unit_water'];

                                                            $sqlreport = "SELECT * FROM tbl_payment WHERE month1 = '".$_POST['m']."'";
                                                            $resultreport = mysqli_query($conn,$sqlreport);
                                                            while($rowreport = mysqli_fetch_array($resultreport)){
                                                                $lenref = strlen($rowreport['payment_ref']);
                                                                if($lenref > 10){
                                                                    //ใหม่
                                                                    $sql1 = "SELECT * FROM tbl_usage WHERE usage_id = '".$rowreport['payment_ref']."'";
                                                                    $result1 = mysqli_query($conn,$sql1);
                                                                    $row1 = mysqli_fetch_array($result1);
                                                                
                                                                    $sql2 = "SELECT * FROM tbl_contract WHERE contract_id = '".$row1['usage_ref']."'";
                                                                    $result2 = mysqli_query($conn,$sql2);
                                                                    $row2 = mysqli_fetch_array($result2);

                                                                    $sqlroom = "SELECT * FROM tbl_room WHERE r_name = '".$row2['contract_room']."'";
                                                                    $resultroom = mysqli_query($conn,$sqlroom);
                                                                    $rowroom = mysqli_fetch_array($resultroom);

                                                                    $sqlservice = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '1' AND service_room = '".$row2['contract_room']."'";
                                                                    $resultservice = mysqli_query($conn,$sqlservice);
                                                                    $rowservice = mysqli_fetch_array($resultservice);
    
                                                                    $sqlservice1 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '2' AND service_room = '".$row2['contract_room']."'";
                                                                    $resultservice1 = mysqli_query($conn,$sqlservice1);
                                                                    $rowservice1 = mysqli_fetch_array($resultservice1);
                                            
                                                                    $sqlservice2 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '3' AND service_room = '".$row2['contract_room']."'";
                                                                    $resultservice2 = mysqli_query($conn,$sqlservice2);
                                                                    $rowservice2 = mysqli_fetch_array($resultservice2);

                                                                    $roomprice = $row2['contract_price'];

                                                                    //เก่า
                                                                    $r = explode("-",$row1['usage_date']);
                                                                    $r1 = $r[1]-1;
                                                                    if(strlen($r1) == 1){
                                                                        $r2 = "0".$r1;
                                                                    } else {
                                                                        $r2 = $r1;
                                                                    }
                                                                    $r3 = $r[0]."-".$r2;
                                                                    $sql3 = "SELECT * FROM tbl_usage WHERE usage_ref = '".$row1['usage_ref']."' AND usage_date = '".$r3."'";
                                                                    $result3 = mysqli_query($conn,$sql3);
                                                                    if(mysqli_num_rows($result3)<1){
                                                                        $unitwater = 0;
                                                                        $unitelec = 0;
                                                                        $waterprice = 0;
                                                                        $elecprice = 0;
                                                                    } else {
                                                                        $row3 = mysqli_fetch_array($result3);
                                                                        $unitwater = $row1['usage_water']-$row3['usage_water'];
                                                                        $unitelec = $row1['usage_elec']-$row3['usage_elec'];
                                                                        $waterprice = $unitwater*$pricewater;
                                                                        $elecprice = $unitelec*$priceelec;
                                                                    }
                                                                    $other = $rowservice['service_price']+$rowservice1['service_price']+$rowservice2['service_price'];
                                                                    $sumall = $waterprice+$elecprice+$other;
                                                                    
                                                                } else {
                                                                    $sql2 = "SELECT * FROM tbl_contract WHERE contract_id = '".$rowreport['payment_ref']."'";
                                                                    $result2 = mysqli_query($conn,$sql2);
                                                                    $row2 = mysqli_fetch_array($result2);

                                                                    $sqlroom = "SELECT * FROM tbl_room WHERE r_name = '".$row2['contract_room']."'";
                                                                    $resultroom = mysqli_query($conn,$sqlroom);
                                                                    $rowroom = mysqli_fetch_array($resultroom);

                                                                     $sqlservice = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '1' AND service_room = '".$row2['contract_room']."'";
                                                                    $resultservice = mysqli_query($conn,$sqlservice);
                                                                    $rowservice = mysqli_fetch_array($resultservice);
    
                                                                    $sqlservice1 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '2' AND service_room = '".$row2['contract_room']."'";
                                                                    $resultservice1 = mysqli_query($conn,$sqlservice1);
                                                                    $rowservice1 = mysqli_fetch_array($resultservice1);
                                            
                                                                    $sqlservice2 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '3' AND service_room = '".$row2['contract_room']."'";
                                                                    $resultservice2 = mysqli_query($conn,$sqlservice2);
                                                                    $rowservice2 = mysqli_fetch_array($resultservice2);

                                                                    $roomprice = $row2['contract_price'];
                                                                    $unitwater = 0;
                                                                    $unitelec = 0;
                                                                    $waterprice = 0;
                                                                    $elecprice = 0;
                                                                    $other = $rowservice['service_price']+$rowservice2['service_price'];
                                                                    $sumall = $waterprice+$elecprice+$other;
                                                                }
                                                                 
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row2['contract_room'] ?></td>
                                                                    <td><?php echo $row2['contract_name'] ?></td>
                                                                    <td><?php echo $rowroom['r_size'] ?></td>
                                                                    <td><?php echo $roomprice ?></td>
                                                                    <td><?php echo $unitelec ?></td>
                                                                    <td><?php echo $elecprice ?></td>
                                                                    <td><?php echo $unitwater ?></td>
                                                                    <td><?php echo $waterprice ?></td>
                                                                    <td><?php echo $other ?></td>
                                                                    <td><?php echo $sumall+$roomprice ?></td>
                                                                </tr>
                                                            <?php 
                                                            $sumallsum1 += $sumall+$roomprice;
                                                            $sumallsum2 += $roomprice;
                                                            $sumallsum3 += $elecprice;
                                                            $sumallsum4 += $waterprice;
                                                            $sumallsum5 += $other;
                                                            $sumallsum6 += $unitelec;
                                                            $sumallsum7 += $unitwater;
                                                            } 
                                                            ?>
                                                            <tr>
                                                            <td></td>
                                                            <td>รวม</td>
                                                            <td></td>
                                                            <td><?php echo $sumallsum2 ?></td>
                                                            <td><?php echo $sumallsum6 ?></td>
                                                            <td><?php echo $sumallsum3 ?></td>
                                                            <td><?php echo $sumallsum7 ?></td>
                                                            <td><?php echo $sumallsum4 ?></td>
                                                            <td><?php echo $sumallsum5 ?></td>
                                                            <td><?php echo $sumallsum1 ?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->
                                            </div>
                    </div>

                            </div>


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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    </html>
