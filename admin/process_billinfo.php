<?php include 'time.php'; ?>
<?php
if ($_POST['process']=='1'){
    $inv = $_POST['invoiceid'];
    $date1 = $_POST['date1'];
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=process_billinfo2.php?inv=$inv&d=$date1\">";
}
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

function convert($number){ 
$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
$number = str_replace(",","",$number); 
$number = str_replace(" ","",$number); 
$number = str_replace("บาท","",$number); 
$number = explode(".",$number); 
if(sizeof($number)>2){ 
return 'ทศนิยมหลายตัวนะจ๊ะ'; 
exit; 
} 
$strlen = strlen($number[0]); 
$convert = ''; 
for($i=0;$i<$strlen;$i++){ 
	$n = substr($number[0], $i,1); 
	if($n!=0){ 
		if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
		elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
		elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
		else{ $convert .= $txtnum1[$n]; } 
		$convert .= $txtnum2[$strlen-$i-1]; 
	} 
} 

$convert .= 'บาท'; 
if($number[1]=='0' OR $number[1]=='00' OR 
$number[1]==''){ 
$convert .= 'ถ้วน'; 
}else{ 
$strlen = strlen($number[1]); 
for($i=0;$i<$strlen;$i++){ 
$n = substr($number[1], $i,1); 
	if($n!=0){ 
	if($i==($strlen-1) AND $n==1){$convert 
	.= 'เอ็ด';} 
	elseif($i==($strlen-2) AND 
	$n==2){$convert .= 'ยี่';} 
	elseif($i==($strlen-2) AND 
	$n==1){$convert .= '';} 
	else{ $convert .= $txtnum1[$n];} 
	$convert .= $txtnum2[$strlen-$i-1]; 
	} 
} 
$convert .= 'สตางค์'; 
} 
return $convert; 
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
                                        <h1>ยืนยันข้อมูลผู้ทำสัญญา
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
                                    
                                                            <div class="portlet box purple">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-gift"></i>
                                                                         <?php if($_POST['processid']==2){echo "ระบบรับชำระและออกใบเสร็จรับเงินสำหรับการจอง/ทำสัญญา";} ?>
                                                                        </div>
                                                                </div>
                                                                <div class="portlet-body form">
                                                                    <!-- BEGIN FORM-->
                                                                     <form class="form-horizontal" role="form" action="cmd.php?action=payment1" method="post">
                                                                        <div class="form-body">
                                                                           <h3 class="form-section">Reserve Info</h3>
                                                                           <?php 
                                                                           if ($_POST['reserveid']=="-"){
                                                                            echo "<input type=\"hidden\" name=\"reserveid\" value=\"".$row['reserve_id']."\">";
                                                                           	echo "<center>ไม่มีการจอง</center>";
                                                                           } else {
                                                                           	$sql = "SELECT * FROM tbl_reserve WHERE (reserve_id = '".$_POST['reserveid']."' or reserve_idcard = '".$_POST['reserveid']."') AND reserve_status = '1'";
                                                                           	$result = mysqli_query($conn,$sql);
                                                                           	$row = mysqli_fetch_array($result);
                                                                           	echo "
                                                                           		<div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">เลขที่การจอง:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$row['reserve_id']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"reserveid\" value=\"".$row['reserve_id']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">หมายเลขบัตรประชาชน:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$row['reserve_idcard']."</strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ชื่อ-นามสกุล:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$row['reserve_name']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"reservename\" value=\"".$row['reserve_name']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">เบอร์ติดต่อ:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$row['reserve_phone']."</strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ที่อยู่:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$row['reserve_address']."</strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ห้อง:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$row['reserve_room']." / ".$row['reserve_size']." / ".$row['reserve_floor']." / ".$row['reserve_price']."</strong></p>
                                                                                        		<input type=\"hidden\" name=\"reservepayment\" value=\"".$row['reserve_price']."\">
                                                                                        		<input type=\"hidden\" name=\"reservesize\" value=\"".$row['reserve_size']."\">
                                                                                        		<input type=\"hidden\" name=\"reserveroom\" value=\"".$row['reserve_room']."\">
                                                                                        		<input type=\"hidden\" name=\"reservefloor\" value=\"".$row['reserve_floor']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                           	";
                                                                           };
                                                                           ?>
                                                                           
                                                                            <h3 class="form-section">Contract Info</h3>
                                                                            <?php 
                                                                            if ($_POST['contractid']!=""){
                                                                            	$sqlcontract = "SELECT * FROM tbl_contract WHERE contract_id = '".$_POST['contractid']."' AND contract_status = '0'";
                                                                            	$result1 = mysqli_query($conn,$sqlcontract);
                                                                            	$rowcontract = mysqli_fetch_array($result1);
																				
																				$sqlser = "SELECT * FROM tbl_service WHERE service_code = '2' AND service_room = '".$rowcontract['contract_room']."' AND service_status = '0'";
                                                                            	$resultser = mysqli_query($conn,$sqlser);
																				$rowser = mysqli_fetch_array($resultser);
																				echo "
                                                                            		<div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">เลขสัญญา:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$rowcontract['contract_id']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"contract_n\" value=\"".$rowcontract['contract_id']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">เลขบัตร:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$rowcontract['contract_idcard']."</strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ชื่อ-นามสกุล:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$rowcontract['contract_name']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"contractname\" value=\"".$rowcontract['contract_name']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ที่อยู่:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$rowcontract['contract_address']." </strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ห้อง:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$rowcontract['contract_room']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"contractroom\" value=\"".$rowcontract['contract_room']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ชั้น:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$rowcontract['contract_floor']." </strong></p>
                                                                                            <input type=\"hidden\" name=\"contractfloor\" value=\"".$rowcontract['contract_floor']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ราคา:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$rowcontract['contract_price']." </strong></p>
                                                                                            <input type=\"hidden\" name=\"contractpayment\" value=\"".$rowcontract['contract_price']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">อายุสัญญา:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong>".$rowcontract['contract_term']."</strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">วันเริ่มสัญญา:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$rowcontract['contract_start']." </strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">วันสิ้นสุดสัญญา:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$rowcontract['contract_end']."</strong></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                             <div class=\"row\">
                                                                             <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">หน่วยไฟเริ่มต้น:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$_POST['elec']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"elec\" value=\"".$_POST['elec']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">หน่วยน้ำเริ่มต้น:</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong> ".$_POST['water']."</strong></p>
                                                                                            <input type=\"hidden\" name=\"water\" value=\"".$_POST['water']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            	";
                                                                            } else {
                                                                            	echo "<center>ไม่พบข้อมูลสัญญา กรุณาตรวจสอบ</center>";
                                                                            }
                                                                            ?>
                                                                            <h3 class="form-section">Payment Info</h3>
                                                                            <div class="row">
                                                                            <?php 
                                                                            if ($_POST['reserveid']=='-'){
                                                                                echo "
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\"><font color=\"red\">ค่าจองห้องพัก:</font></label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong><font color=\"red\">".number_format($rowcontract['contract_price'],2)."   [ ".convert($rowcontract['contract_price'])." ]</font></strong></p>
																														
                                                                                        <input type=\"hidden\" class=\"form-control\" name=\"num1\" required value=\"".$rowcontract['contract_price']."\">                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-6\"><font color=\"red\">ยังไม่ได้ชำระ</font></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                ";
                                                                            } else {
                                                                                echo "
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\"><font color=\"green\">ค่าจองห้องพัก:</font></label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong><font color=\"green\">".number_format($row['reserve_price'],2)."   [ ".convert($row['reserve_price'])." ]</font></strong></p>
																														
                                                                                        <input type=\"hidden\" class=\"form-control\" name=\"num1\" required value=\"".$row['reserve_price']."\">                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-6\"><font color=\"green\">ชำระเรียบร้อย</font></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                ";
                                                                            }
                                                                            ?>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-3"><font color="red">ค่าทำสัญญา:</font></label>
                                                                                        <div class="col-md-9">
                                                                                            <p class="form-control-static"><strong><font color="red"><?php echo number_format($rowcontract['contract_price'],2) ?>   [ <?php echo convert($rowcontract['contract_price']) ?> ]</font></strong></p>
                                                                                        		<input type="hidden" class="form-control" name="num2" required value="<?php echo $rowcontract['contract_price'] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--/span-->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6"><font color="red">ยังไม่ได้ชำระ</font></label>
                                                                                    </div>
                                                                                </div>
                                                                                <!--/span-->
                                                                            </div>
																			<?php 
																			if($rowser['service_price'] != '0'){
																			echo "
																			<div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\"><font color=\"green\">ส่วนลด:</font></label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <p class=\"form-control-static\"><strong><font color=\"green\">".number_format($rowser['service_price'],2)."   [ ".convert($rowser['service_price'])." ]</font></strong></p>
                                                                                        		<input type=\"hidden\" class=\"form-control\" name=\"num3\" value=\"".$rowser['service_price']."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--/span-->
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-6\"><font color=\"green\">เงื่อนไขการทำสัญญา</font></label>
                                                                                    </div>
                                                                                </div>
                                                                                <!--/span-->
                                                                            </div>
																			";
																			} else {
																				echo "<input type=\"hidden\" class=\"form-control\" name=\"num3\" value=\"0\">";
																			}
																			?>
                                                                            <div class="row">
                                                                            <?php 
                                                                            if ($_POST['reserveid']=='-'){
                                                                                echo "<center>
                                                                                <div class=\"col-md-12\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-4\"><font color=\"red\" size=\"16\">ต้องชำระทั้งสิ้น:</font></label>
                                                                                        <div class=\"col-md-8\">
                                                                                            <p class=\"form-control-static\"><strong><font color=\"red\" size=\"14\">".number_format(($rowcontract['contract_price']+$rowser['service_price']+$rowcontract['contract_price']),2)." บาท</font></strong></p>
																														
                                                                                        <input type=\"hidden\" class=\"form-control\" name=\"num1\" required value=\"".($rowcontract['contract_price']+$rowser['service_price']+$rowcontract['contract_price'])."\">                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>/<center>
                                                                                ";
                                                                            } else {
                                                                                echo "<center>
                                                                                <div class=\"col-md-12\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-4\"><font color=\"red\" size=\"10\">ต้องชำระเพิ่ม:</font></label>
                                                                                        <div class=\"col-md-8\">
                                                                                            <p class=\"form-control-static\"><strong><font color=\"red\" size=\"10\">".number_format($rowcontract['contract_price']+$rowser['service_price'],2)." บาท</font></strong></p>                                                                               
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-12\">
                                                                                    <div class=\"form-group\"><h4>
                                                                                        <label class=\"control-label col-md-4\"><font color=\"red\" size=\"10\">ต้องชำระทั้งสิ้น:</font></label>
                                                                                        <div class=\"col-md-8\">
                                                                                            <p class=\"form-control-static\"><strong><font color=\"red\" size=\"10\">".number_format($rowcontract['contract_price']+$rowser['service_price'],2)." บาท </font></strong></p>                                         </h4>                                
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div></center>
                                                                                ";
                                                                            }
                                                                            ?>
                                                                            </div>
                                                                         <div class="form-actions">
                                                                            <div class="row">
                                                                                <div class="col-md-offset-6 col-md-12">
                                                                                    <input type="hidden" name="optionsRadios2" value="<?php echo $_POST['optionsRadios2'] ?>">
                                                                                    <button type="submit" class="btn btn-circle green">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <!-- END FORM-->
                                                                </div>
                                                            </div>
                                                            
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
        <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>