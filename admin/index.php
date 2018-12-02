<?php
session_start();
include 'time.php';
include_once ("config.php");
include_once 'test_online.php';

date_default_timezone_set("Asia/Bangkok");
if ($_SESSION['role'] != 'A') {
    die("<script>
				alert('Access not allow');
				window.location='logout.php';
			 </script>");
}

$numaviable = 0;
$numservers = 0;
$numunaviable = 0;
$numroom = 0;
$numsetting = 0;
$sqlroom = "SELECT * FROM tbl_room";
$resultromm = mysqli_query($conn, $sqlroom);
while ($rss = mysqli_fetch_array($resultromm)) {
    $numroom++;
}

$sqlsetting1 = "SELECT * FROM tbl_setting";
$resultsetting1 = mysqli_query($conn, $sqlsetting1);
while ($rssss = mysqli_fetch_array($resultsetting1)) {
    $numsetting++;
}


$sqlaviable = "SELECT * FROM tbl_room WHERE r_status = '0'";
$resultaviable = mysqli_query($conn, $sqlaviable);
while ($rs = mysqli_fetch_array($resultaviable)) {
    $numaviable++;
}

$sqlreserve = "SELECT * FROM tbl_room WHERE r_status = '1'";
$resultaviabl1e = mysqli_query($conn, $sqlreserve);
while ($rs1 = mysqli_fetch_array($resultaviabl1e)) {
    $numservers++;
}

$sqlunaviable = "SELECT * FROM tbl_room WHERE r_status = '2'";
$resultunaviable = mysqli_query($conn, $sqlunaviable);
while ($rs2 = mysqli_fetch_array($resultunaviable)) {
    $numunaviable++;
}

$numfloor1 = 0;
$numfloor2 = 0;
$numfloor3 = 0;
$sqlfloorfrist = "SELECT * FROM tbl_room WHERE r_floor = '1'";
$resultfloorfrist = mysqli_query($conn,$sqlfloorfrist);
while($floorfrist = mysqli_fetch_array($resultfloorfrist)){
    $numfloor1++;
}
$sqlfloorsenout = "SELECT * FROM tbl_room WHERE r_floor = '2'";
$resultfloorsenoud = mysqli_query($conn,$sqlfloorsenout);
while($floorsenoud = mysqli_fetch_array($resultfloorsenoud)){
    $numfloor2++;
}
$sqlfloorth = "SELECT * FROM tbl_room WHERE r_floor = '3'";
$resultfloorth = mysqli_query($conn,$sqlfloorth);
while($floorth = mysqli_fetch_array($resultfloorth)){
    $numfloor3++;
}

if ($numroom == 0){
	die("<script>
                alert('กรุณาเพิ่มข้อมูลห้องพัก');
                window.location='setting_system.php';
             </script>");
}

if ($numsetting == 0){
	die("<script>
                alert('กรุณาตั้งค่าระบบ');
                window.location='setting_system.php';
             </script>");
}
$todday = date("Y-m-d");

$sqlagereserve = "SELECT * FROM tbl_reserve WHERE DATEDIFF(server_checkin1,'$todday') < 0 AND reserve_status = '0'";
$resultagereserve = mysqli_query($conn,$sqlagereserve);
while ($agereserve = mysqli_fetch_array($resultagereserve)){
    $cancelreserve = "UPDATE tbl_reserve SET reserve_status = '2' WHERE reserve_id = '".$agereserve['reserve_id']."'";
    $resultcancel = mysqli_query($conn,$cancelreserve);
    $concelroom = "UPDATE tbl_room SET r_status = '0' WHERE r_name = '".$agereserve['reserve_room']."'";
    $concelroomresult = mysqli_query($conn,$concelroom);
    $sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ระบบได้ทำการยกเลิกการจอง','".date("Y-m-d h:m:sa")."')";
    $resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
    echo "<center><font color=\"red\"><h4>ระบบได้ทำการยกเลิกหมายเลขการจอง <a onclick=\"window.open('reserve_info.php?rid=".$agereserve['reserve_id']."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\">".$agereserve['reserve_id']."</a> ห้อง ".$agereserve['reserve_room']." เนื่องจากหมดอายุการจองหรือหมดอายุการเข้าพักแล้ว</h4></font></center>";
}

$sqlagecontract = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')< -60 AND contract_status = '0'";
$resultagecontract = mysqli_query($conn,$sqlagecontract);
while ($agecontract = mysqli_fetch_array($resultagecontract)){
   $sqlupdatecontract = "UPDATE tbl_contract SET contract_status = '2' WHERE contract_id = '".$agecontract['contract_id']."'";
    $resultsqlupdate = mysqli_query($conn,$sqlupdatecontract);
    $sqlupdateroom = "UPDATE tbl_room SET r_status = '0' WHERE r_name = '".$agecontract['contract_room']."'";
    $resultsqlupdateroom = mysqli_query($conn,$sqlupdateroom);
    $sqllog = "INSERT INTO tbl_log (ref,msg,log_date) VALUES ('".$_SESSION['ids']."','ระบบได้ทำการยกเลิกสัญญา','".date("Y-m-d h:m:sa")."')";
			$resultlog = mysqli_query($conn,$sqllog) or die ("ERROR : ".mysqli_error($sqllog));
    echo "<center><font color=\"red\"><h4>ระบบได้ทำการยกเลิกสัญญาเลขที่ ".$agecontract['contract_id']." ห้อง ".$agecontract['contract_room']." เป็นที่เรียบร้อยแล้ว</h4></font></center>";
}

$sqlagecontract1 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 30 AND contract_status = '0'";
$resultagecontract1 = mysqli_query($conn,$sqlagecontract1);
while ($agecontract1 = mysqli_fetch_array($resultagecontract1)){
    echo "<center><font color=\"red\"><h4>เลขที่สัญญา ".$agecontract1['contract_id']." ห้อง ".$agecontract1['contract_room']." กำลังจะสิ้นสุดลง กรุณาดำเนินการต่อสัญญา หากละเลยระบบจะยกเลิกสัญญาภายใน 60 วันโดยอัตโนมัติ</h4></font></center>";
}
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
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
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>
                                            สถานะห้องพักทั้งหมด
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                                <span data-counter="counterup" data-value="<?php echo $numaviable ?>"></span>
                                                            </h3>
                                                            <small>Avialable</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-red-haze">
                                                                <span data-counter="counterup" data-value="<?php echo $numunaviable ?>"></span>
                                                            </h3>
                                                            <small>Contract</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-blue-sharp">
                                                                <span data-counter="counterup" data-value="<?php echo $numservers ?>"></span>
                                                            </h3>
                                                            <small>Reserve</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-purple-soft">
                                                                <span data-counter="counterup" data-value="<?php echo $numroom ?>"></span>
                                                            </h3>
                                                            <small>Total</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xs-12 col-sm-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <!-- Get data room -->
                                                            <!-- Get data room floor 1 -->
                                                            <?php
$floor1 = '0';
$sqlfloor1 = "SELECT * FROM tbl_room WHERE r_floor = '1' AND r_status = '0'";
$resultfloor1 = mysqli_query($conn, $sqlfloor1);
while ($rowfloor1 = mysqli_fetch_array($resultfloor1)) {
    $floor1++;
}
                                                            ?>
                                                                <div class="col-lg-12">
                                                                    <div class="portlet light portlet-fit ">
                                                                        <div class="portlet-body">
                                                                            <div class="mt-element-list">
                                                                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                                    <div class="list-head-title-container">
                                                                                        <h3 class="list-title">ห้องพักชั้น 1 (จำนวน <?php echo $numfloor1 ?> ห้อง)</h3>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-list-container list-simple ext-1 group">
                                                                                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple1" aria-expanded="false">
                                                                                       <?php
                                                                                        if ($floor1 != '0'){
                                                                                            echo "
                                                                                            <div class=\"list-toggle done uppercase\"> ยังคงมีห้องว่าง
                                                                                            <span class=\"badge badge-default pull-right bg-white font-green bold\">".$floor1." ห้อง</span>
                                                                                        </div>
                                                                                            ";
                                                                                        } else {
                                                                                            echo "
                                                                                        <div class=\"list-toggle uppercase\"> ไม่พบห้องว่าง
                                                                                        </div>
                                                                                            ";
                                                                                        }
                                                                                        ?>
                                                                                    </a>
                                                                                    <div class="panel-collapse collapse" id="completed-simple1">
                                                                                       <ul>
                                                                                        <?php
                                                    $sqlroom1 = "SELECT * FROM tbl_room WHERE r_floor = '1' ORDER BY r_name ASC";
                                                    $resultroom1 = mysqli_query($conn, $sqlroom1);
                                                    while ($rowroom1 = mysqli_fetch_array($resultroom1)) {
                                                        $sqlct = "SELECT * FROM tbl_contract WHERE contract_room = '".$rowroom1['r_name']."' AND contract_status = '0'";
                                                            $resultct = mysqli_query($conn,$sqlct);
                                                        $rowct = mysqli_fetch_array($resultct);
                                                        $sqlrs = "SELECT * FROM tbl_reserve WHERE reserve_room = '".$rowroom1['r_name']."' AND reserve_status = '0'";
                                                            $resultrs = mysqli_query($conn,$sqlrs);
                                                        $rowrs = mysqli_fetch_array($resultrs);
                                                        if ($rowroom1['r_status'] == 0) { 
                                                            echo "
                                                            <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                                <i class=\"icon-check\"></i>
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                    ห้อง ".$rowroom1['r_name']." |  ขนาด: ".$rowroom1['r_size']." |
                                                                            ชั้น:  ".$rowroom1['r_floor']." | ".$rowroom1['r_price']." ฿ 
                                                                            <div class=\"pull-right\">
                                                                                <a class=\"btn btn-circle btn-outline btn-sm\" href=\"reserve.php?rid=".$rowroom1[id]."\"> ทำการจอง </a> <a class=\"btn btn-circle btn-outline btn-sm\" href=\"contract.php?rid=".$rowroom1[id]."\"> ทำสัญญา </a></div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        } elseif ($rowroom1['r_status'] == 1) {
                                                             echo "
                                                              <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom1['r_name']." |  ขนาด: ".$rowroom1['r_size']." |
                                                                            ชั้น:  ".$rowroom1['r_floor']." | ".$rowroom1['r_price']." ฿ | วันเข้าพัก ".$rowrs['reserve_checkin']."
                                                                            <div class=\"pull-right\">
                                                                                <a onclick=\"window.open('reserve_info.php?rid=".$rowroom1[r_name]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลการจอง </a> <a class=\"btn btn-circle btn-outline btn-sm\" href=\"cmd.php?action=cancelroom&rid=".$rowroom1[r_name]."\" onclick=\"return confirm('ต้องการดำเนินการยกเลิก?');\"> ยกเลิกการจอง </a>
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        } else {
                                                            echo "
                                                            <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                                <a onclick=\"window.open('contract_edit.php?id=".$rowct[contract_id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\"><i class=\"icon-pencil\"></i></a>
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom1['r_name']." |  ขนาด: ".$rowroom1['r_size']." |
                                                                            ชั้น:  ".$rowroom1['r_floor']." | ".$rowroom1['r_price']." ฿ | สิ้นสุดสัญญา ".$rowct['contract_end']."
                                                                            <div class=\"pull-right\">
                                                                                <a onclick=\"window.open('contract_info.php?id=".$rowroom1[r_name]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลสัญญา </a> "; ?>
                                                                            <?php  echo "<a onclick=\"window.open('contract_duo.php?id=".$rowct[contract_id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> คู่สัญญา </a> "; ?>
                                                                                <?php
                                                            $sqlrenewfloor1 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 30 AND contract_status = '0' AND contract_room = '".$rowroom1['r_name']."'";
                                                            $resultrenewfloor1 = mysqli_query($conn,$sqlrenewfloor1);
                                                            if (mysqli_num_rows($resultrenewfloor1)==1){
                                                                                echo "
                                                                            <a onclick=\"window.open('contract_renew.php?id=".$rowct['contract_id']."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ต่อสัญญา </a>";
                                                            }
                                                            echo "
                                                                            <a onclick=\"window.open('service.php?id=".$rowroom1[r_name]."', '_blank', 'location=yes,height=500,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลบริการ </a>
                                                                            "; ?><?php 
                                                            $sqlagecontract11 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 120 AND contract_status = '0' AND contract_room = '".$rowroom1['r_name']."'";
                                                            $resultagecontract1 = mysqli_query($conn,$sqlagecontract11);
                                                            if (mysqli_num_rows($resultagecontract1)==1){
                                                                echo "
                                                                <a onclick=\"window.open('reserve.php?rid=".$rowroom1[id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> จองห้องพัก </a>
                                                                ";
                                                            }
                                                            echo "
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        }
                                                    }
                                                        ?>
                                                                                   </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END GET DATA ROOM FLOOR 1 -->
                                                                
                                                                <!-- Get data room floor 2 -->
                                                            <?php
$floor2 = '0';
$sqlfloor2 = "SELECT * FROM tbl_room WHERE r_floor = '2' AND r_status = '0'";
$resultfloor2 = mysqli_query($conn, $sqlfloor2);
while ($rowfloor2 = mysqli_fetch_array($resultfloor2)) {
    $floor2++;
}
                                                            ?>
                                                                <div class="col-lg-12">
                                                                    <div class="portlet light portlet-fit ">
                                                                        <div class="portlet-body">
                                                                            <div class="mt-element-list">
                                                                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                                    <div class="list-head-title-container">
                                                                                        <h3 class="list-title">ห้องพักชั้น 2 (จำนวน <?php echo $numfloor2 ?> ห้อง)</h3>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-list-container list-simple ext-1 group">
                                                                                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple2" aria-expanded="false">
                                                                                       <?php
                                                                                        if ($floor2 != '0'){
                                                                                            echo "
                                                                                            <div class=\"list-toggle done uppercase\"> ยังคงมีห้องว่าง
                                                                                            <span class=\"badge badge-default pull-right bg-white font-green bold\">".$floor2." ห้อง</span>
                                                                                        </div>
                                                                                            ";
                                                                                        } else {
                                                                                            echo "
                                                                                        <div class=\"list-toggle uppercase\"> ไม่พบห้องว่าง
                                                                                        </div>
                                                                                            ";
                                                                                        }
                                                                                        ?>
                                                                                    </a>
                                                                                    <div class="panel-collapse collapse" id="completed-simple2">
                                                                                       <ul>
                                                                                        <?php
                                                    $sqlroom2 = "SELECT * FROM tbl_room WHERE r_floor = '2' ORDER BY r_name ASC";
                                                    $resultroom2 = mysqli_query($conn, $sqlroom2);
                                                    while ($rowroom2 = mysqli_fetch_array($resultroom2)) {
                                                        $sqlct2 = "SELECT * FROM tbl_contract WHERE contract_room = '".$rowroom2['r_name']."' AND contract_status = '0'";
                                                            $resultct2 = mysqli_query($conn,$sqlct2);
                                                        $rowct2 = mysqli_fetch_array($resultct2);
                                                        $sqlrs2 = "SELECT * FROM tbl_reserve WHERE reserve_room = '".$rowroom2['r_name']."' AND reserve_status = '0'";
                                                            $resultrs2 = mysqli_query($conn,$sqlrs2);
                                                        $rowrs2 = mysqli_fetch_array($resultrs2);
                                                        if ($rowroom2['r_status'] == 0) { 
                                                            echo "
                                                            <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                                <i class=\"icon-check\"></i>
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom2['r_name']." |  ขนาด: ".$rowroom2['r_size']." |
                                                                            ชั้น:  ".$rowroom2['r_floor']." | ".$rowroom2['r_price']." ฿ 
                                                                            <div class=\"pull-right\">
                                                                               <a class=\"btn btn-circle btn-outline btn-sm\" href=\"reserve.php?rid=".$rowroom2[id]."\"> ทำการจอง </a> <a class=\"btn btn-circle btn-outline btn-sm\" href=\"contract.php?rid=".$rowroom2[id]."\"> ทำสัญญา </a>
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        } elseif ($rowroom2['r_status'] == 1) {
                                                             echo "
                                                             <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom2['r_name']." |  ขนาด: ".$rowroom2['r_size']." |
                                                                            ชั้น:  ".$rowroom2['r_floor']." | ".$rowroom2['r_price']." ฿ | วันเข้าพัก ".$rowrs2['reserve_checkin']."
                                                                            <div class=\"pull-right\">
                                                                              <a onclick=\"window.open('reserve_info.php?rid=".$rowroom2[r_name]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลการจอง </a> <a class=\"btn btn-circle btn-outline btn-sm\" href=\"cmd.php?action=cancelroom&rid=".$rowroom2[r_name]."\"> ยกเลิกการจอง </a>
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        } else {
                                                            echo "
                                                             <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                             <a onclick=\"window.open('contract_edit.php?id=".$rowct2[contract_id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\"><i class=\"icon-pencil\"></i></a>
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom2['r_name']." |  ขนาด: ".$rowroom2['r_size']." |
                                                                            ชั้น:  ".$rowroom2['r_floor']." | ".$rowroom2['r_price']." ฿ |  สิ้นสุดสัญญา ".$rowct2['contract_end']."
                                                                            <div class=\"pull-right\">
                                                                             <a onclick=\"window.open('contract_info.php?id=".$rowroom2[r_name]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลสัญญา </a> 
                                                                           "; ?>
                                                                            <?php  echo "<a onclick=\"window.open('contract_duo.php?id=".$rowct2[contract_id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> คู่สัญญา </a> "; ?>
                                                                                <?php
                                                            $sqlrenewfloor2 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 30 AND contract_status = '0' AND contract_room = '".$rowroom2['r_name']."'";
                                                            $resultrenewfloor2 = mysqli_query($conn,$sqlrenewfloor2);
                                                            if (mysqli_num_rows($resultrenewfloor1)==2){
                                                                                echo "
                                                                            <a onclick=\"window.open('contract_renew.php?id=".$rowct['contract_id']."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ต่อสัญญา </a>";
                                                            }
                                                            echo "
                                                                            <a onclick=\"window.open('service.php?id=".$rowroom2[r_name]."', '_blank', 'location=yes,height=500,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลบริการ </a>
                                                                             "; ?><?php 
                                                            $sqlagecontract111 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 120 AND contract_status = '0' AND contract_room = '".$rowroom2['r_name']."'";
                                                            $resultagecontract11 = mysqli_query($conn,$sqlagecontract111);
                                                            if (mysqli_num_rows($resultagecontract11)==1){
                                                                echo "
                                                                <a onclick=\"window.open('reserve.php?rid=".$rowroom2[id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> จองห้องพัก </a>
                                                                ";
                                                            }
                                                            echo "
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        }
                                                    }
                                                        ?>
                                                                                    </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END GET DATA ROOM FLOOR 2 -->
                                                                
                                                                <!-- Get data room floor 3 -->
                                                            <?php
$floor3 = '0';
$sqlfloor3 = "SELECT * FROM tbl_room WHERE r_floor = '3' AND r_status = '0'";
$resultfloor3 = mysqli_query($conn, $sqlfloor3);
while ($rowfloor3 = mysqli_fetch_array($resultfloor3)) {
    $floor3++;
}
                                                            ?>
                                                                <div class="col-lg-12">
                                                                    <div class="portlet light portlet-fit ">
                                                                        <div class="portlet-body">
                                                                            <div class="mt-element-list">
                                                                                <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                                    <div class="list-head-title-container">
                                                                                        <h3 class="list-title">ห้องพักชั้น 3 (จำนวน <?php echo $numfloor3 ?> ห้อง)</h3>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-list-container list-simple ext-1 group">
                                                                                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple3" aria-expanded="false">
                                                                                       <?php
                                                                                        if ($floor3 != '0'){
                                                                                            echo "
                                                                                            <div class=\"list-toggle done uppercase\"> ยังคงมีห้องว่าง
                                                                                            <span class=\"badge badge-default pull-right bg-white font-green bold\">".$floor3." ห้อง</span>
                                                                                        </div>
                                                                                            ";
                                                                                        } else {
                                                                                            echo "
                                                                                        <div class=\"list-toggle uppercase\"> ไม่พบห้องว่าง
                                                                                        </div>
                                                                                            ";
                                                                                        }
                                                                                        ?>
                                                                                    </a>
                                                                                    <div class="panel-collapse collapse" id="completed-simple3">
                                                                                       <ul>
                                                                                        <?php
                                                    $sqlroom3 = "SELECT * FROM tbl_room WHERE r_floor = '3' ORDER BY r_name ASC";
                                                    $resultroom3 = mysqli_query($conn, $sqlroom3);
                                                    while ($rowroom3 = mysqli_fetch_array($resultroom3)) {
                                                        $sqlct3 = "SELECT * FROM tbl_contract WHERE contract_room = '".$rowroom3['r_name']."' AND contract_status = '0'";
                                                            $resultct3 = mysqli_query($conn,$sqlct3);
                                                        $rowct3 = mysqli_fetch_array($resultct3);
                                                        $sqlrs3 = "SELECT * FROM tbl_reserve WHERE reserve_room = '".$rowroom3['r_name']."' AND reserve_status = '0'";
                                                            $resultrs3 = mysqli_query($conn,$sqlrs3);
                                                        $rowrs3 = mysqli_fetch_array($resultrs3);
                                                        if ($rowroom3['r_status'] == 0) { 
                                                            echo "
                                                             <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                                <i class=\"icon-check\"></i>
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom3['r_name']." |  ขนาด: ".$rowroom3['r_size']." |
                                                                            ชั้น:  ".$rowroom3['r_floor']." | ".$rowroom3['r_price']." ฿ 
                                                                            <div class=\"pull-right\">
                                                                             <a class=\"btn btn-circle btn-outline btn-sm\" href=\"reserve.php?rid=".$rowroom3[id]."\"> ทำการจอง </a> <a class=\"btn btn-circle btn-outline btn-sm\" href=\"contract.php?rid=".$rowroom3[id]."\"> ทำสัญญา </a>
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        } elseif ($rowroom3['r_status'] == 1) {
                                                             echo "
                                                             <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom3['r_name']." |  ขนาด: ".$rowroom3['r_size']." |
                                                                            ชั้น:  ".$rowroom3['r_floor']." | ".$rowroom3['r_price']." ฿ | วันเข้าพัก ".$rowrs3['reserve_checkin']."
                                                                            <div class=\"pull-right\">
                                                                             <a onclick=\"window.open('reserve_info.php?rid=".$rowroom3[r_name]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลการจอง </a> <a class=\"btn btn-circle btn-outline btn-sm\" href=\"cmd.php?action=cancelroom&rid=".$rowroom3[r_name]."\"> ยกเลิกการจอง </a>
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        } else {
                                                            echo "
                                                            <li class=\"mt-list-item done\">
                                                                            <div class=\"list-icon-container\">
                                                                             <a onclick=\"window.open('contract_edit.php?id=".$rowct3[contract_id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\"><i class=\"icon-pencil\"></i></a>
                                                                            </div>
                                                                            <div class=\"list-item-content\">
                                                                                <h3 class=\"uppercase\">
                                                                                   ห้อง ".$rowroom3['r_name']." |  ขนาด: ".$rowroom3['r_size']." |
                                                                            ชั้น:  ".$rowroom3['r_floor']." | ".$rowroom3['r_price']." ฿ | สิ้นสุดสัญญา ".$rowct3['contract_end']."
                                                                            <div class=\"pull-right\">
                                                                             <a onclick=\"window.open('contract_info.php?id=".$rowroom3[r_name]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลสัญญา </a> 
                                                                            "; ?>
                                                                             <?php  echo "<a onclick=\"window.open('contract_duo.php?id=".$rowct3[contract_id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> คู่สัญญา </a> "; ?>
                                                                                <?php
                                                            $sqlrenewfloor3 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 30 AND contract_status = '0' AND contract_room = '".$rowroom3['r_name']."'";
                                                            $resultrenewfloor3 = mysqli_query($conn,$sqlrenewfloor3);
                                                            if (mysqli_num_rows($resultrenewfloor3)==1){
                                                                                echo "
                                                                            <a onclick=\"window.open('contract_renew.php?id=".$rowct['contract_id']."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ต่อสัญญา </a>";
                                                            }
                                                            echo "
                                                                            <a onclick=\"window.open('service.php?id=".$rowroom3[r_name]."', '_blank', 'location=yes,height=500,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> ข้อมูลบริการ </a>
                                                                             "; ?><?php 
                                                            $sqlagecontract1111 = "SELECT * FROM tbl_contract WHERE DATEDIFF(server_checkin1,'$todday')<= 120 AND contract_status = '0' AND contract_room = '".$rowroom3['r_name']."'";
                                                            $resultagecontract111 = mysqli_query($conn,$sqlagecontract1111);
                                                            if (mysqli_num_rows($resultagecontract111)==1){
                                                                echo "
                                                                <a onclick=\"window.open('reserve.php?rid=".$rowroom3[id]."', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');\" class=\"btn btn-circle btn-outline btn-sm\"> จองห้องพัก </a>
                                                                ";
                                                            }
                                                            echo "
                                                                                </div>
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                            ";
                                                        }
                                                    }
                                                        ?>
                                                                                        </ul>
                                                                                     </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END GET DATA ROOM FLOOR 3 -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->


                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                        <!-- BEGIN QUICK SIDEBAR -->
                        <a href="javascript:;" class="page-quick-sidebar-toggler">
                            <i class="icon-login"></i>
                        </a>
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
                    <a onclick="window.open('website_promotion.php', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');">
                        <span>เพิ่ม/แก้ไข โปรโมชั่นบนเว็บไซต์</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a onclick="window.open('website_contact.php', '_blank', 'location=yes,height=700,width=1024,scrollbars=yes,status=yes');">
                        <span>ระบบติดต่อจากผู้สนใจ</span>
                        <i class="icon-basket"></i>
                    </a>
                </li>
                <li>
                    <a href="changelog.php" target="_blank">
                        <span>รายการอัพเดท</span>
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
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    </html>
