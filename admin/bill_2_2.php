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

$sql = "SELECT * FROM tbl_usage WHERE usage_id = '".$_GET['id']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$sql9 = "SELECT * FROM tbl_contract WHERE contract_id = '".$row['usage_ref']."'";
$result9 = mysqli_query($conn,$sql9);
$row9 = mysqli_fetch_array($result9);

$sql2 = "SELECT * FROM tbl_room WHERE r_name = '".$row9['contract_room']."'";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($result2);

$sqlsetting = "SELECT * FROM tbl_setting ORDER BY id LIMIT 1";
$resultwetting = mysqli_query($conn,$sqlsetting);
$rowsetting = mysqli_fetch_array($resultwetting);
$priceelec = $rowsetting['unit_elec'];
$pricewater = $rowsetting['unit_water'];

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
                                                    <p> ใบแจ้งค่าบริการ
                                                    <?php echo $_GET['id'] ?>
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
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h5>ใบแจ้งค่าบริการของ : <strong><?php echo $row9['contract_name'] ?></strong> ผู้เช่าห้องพักหมายเลข <strong><?php echo $row9['contract_room'] ?></strong> ห้องประเภท <strong><?php echo $row2['r_size'] ?></strong></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th> รายการ </th>
                                                                <th> เป็นเงิน </th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $today1 = date('Y-m',strtotime('+1 month'));
                                                        $sqlservice1 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '2' AND service_room = '".$row2['r_name']."'";
                                                        $resultservice1 = mysqli_query($conn,$sqlservice1);
                                                        $rowservice1 = mysqli_fetch_array($resultservice1);
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td width="90%">ค่าเช่าห้องพัก ประจำเดือน <strong><?php echo $today1 ?></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format($row2['r_price'],2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="90%">ค่าไฟฟ้า <strong>มิเตอร์เริ่มต้น <?php echo $_GET['elec'] ?></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format("0",2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="90%">ค่าประปา <strong>มิเตอร์เริ่มต้น <?php echo $_GET['water'] ?></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format("0",2) ?></td>
                                                            </tr>		
                                                           <?php 
                                                    if(mysqli_num_rows($resultservice1)==1){
                                                        $discount = $rowservice1['service_price'];
                                                        echo "
                                                        <tr>
                                                        <td width=\"85%\">ค่าส่วนลดระหว่างรอบบิล
                                                        </td>
                                                        <td width=\"15%\" align=\"right\">
                                                            ".number_format($rowservice1['service_price'],2)."
                                                        </td>
                                                    </tr>
                                                        ";
                                                    } else {
                                                        $discount = '0';
                                                    }
                                                    ?>																	<?php
																														$sql0 = "SELECT * FROM tbl_room WHERE r_name = '".$_GET['room']."'";
																														$result0 = mysqli_query($conn,$sql0);
																														$row0 = mysqli_fetch_array($result0);

																														$sql1 = "SELECT * FROM tbl_room WHERE r_name = '".$_GET['newroom']."'";
																													 $result1 = mysqli_query($conn,$sql1);
																													 $row1 = mysqli_fetch_array($result1);

																													 if ($row1['r_price'] != $row0['r_price']){
																														 $newpriceroom = $row1['r_price'] - $row0['r_price'];
																														 ?>
																														 <tr>
																																 <td width="90%">ส่วนต่างค่ามัดจำ</td>
																																 <td width="10%" align="right"><?php echo number_format($newpriceroom,2) ?></td>
																														 </tr>
																														 <?php
																													 } else {
																													 		$newpriceroom = "0";
																													 }
																														 ?>
                                                            <tr>
                                                                <td><strong><center><?php echo convert($newpriceroom+$row2['r_price']+$discount) ?></center></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format($newpriceroom+$row2['r_price']+$discount,2) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </div>


																						<div class="invoice">
																								<div class="row invoice-logo">
																										<div class="col-xs-6 invoice-logo-space">
																												<img src="../assets/pages/media/invoice/14975889_1134711006604817_1463979142_o.png" class="img-responsive" alt="" Width="300" height="83"/> </div>
																										<div class="col-xs-6">
																												<p> ใบเสร็จรับเงิน
																												<?php echo $_GET['idpay'] ?>
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
																								<div class="row">
																										<div class="col-xs-12">
																												<table class="table table-striped table-hover">
																														<thead>
																																<tr>
																																		<th> รายการ </th>
																																		<th> เป็นเงิน </th>
																																</tr>
																														</thead>
																														<tbody>
                                                                                                                        <tr>
                                                                                                                            <td>ได้รับเงินจาก <strong><?php echo $row9['contract_name']; ?></strong> ผู้เช่าห้องพักหมายเลข <strong><?php echo $row9['contract_room'] ?></strong> ห้องประเภท <strong><?php echo $row2['r_size'] ?></strong></td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                <td width="90%">ค่าเช่าห้องพัก ประจำเดือน <strong><?php echo $today1 ?></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format($row2['r_price'],2) ?></td>
                                                            </tr>
																																 <tr>
                                                                <td width="90%">ค่าไฟฟ้า <strong>มิเตอร์เริ่มต้น <?php echo $_GET['elec'] ?></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format("0",2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="90%">ค่าประปา <strong>มิเตอร์เริ่มต้น <?php echo $_GET['water'] ?></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format("0",2) ?></td>
                                                            </tr>
                                                            <?php 
                                                    if(mysqli_num_rows($resultservice1)==1){
                                                        $discount = $rowservice1['service_price'];
                                                        echo "
                                                        <tr>
                                                        <td width=\"85%\">ค่าส่วนลดระหว่างรอบบิล
                                                        </td>
                                                        <td width=\"15%\" align=\"right\">
                                                            ".number_format($rowservice1['service_price'],2)."
                                                        </td>
                                                    </tr>
                                                        ";
                                                    } else {
                                                        $discount = '0';
                                                    }
                                                    ?>			
																														<?php
																														$sql0 = "SELECT * FROM tbl_room WHERE r_name = '".$_GET['room']."'";
																														$result0 = mysqli_query($conn,$sql0);
																														$row0 = mysqli_fetch_array($result0);

																														$sql1 = "SELECT * FROM tbl_room WHERE r_name = '".$_GET['newroom']."'";
																													 $result1 = mysqli_query($conn,$sql1);
																													 $row1 = mysqli_fetch_array($result1);

																													 if ($row1['r_price'] != $row0['r_price']){
																														 $newpriceroom = $row1['r_price'] - $row0['r_price'];
																														 ?>
																														 <tr>
																																 <td width="90%">ส่วนต่างค่ามัดจำ</td>
																																 <td width="10%" align="right"><?php echo number_format($newpriceroom,2) ?></td>
																														 </tr>
																														 <?php
																													 } else {
																													 		$newpriceroom = "0";
																													 }
																														 ?>
                                                            <tr>
                                                                <td><strong><center><?php echo convert($newpriceroom+$row2['r_price']+$discount) ?></center></strong></td>
                                                                <td width="10%" align="right"><?php echo number_format($newpriceroom+$row2['r_price']+$discount,2) ?></td>
                                                            </tr>
																														</tbody>
																												</table>
																										</div>
																								</div>
                                                                                                <div class="col-xs-12 invoice-payment">
																												<h5 class="pull-right">ลงชื่อ...........................................ผู้รับเงิน
                                        <br/>
                                                                                                                <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(  นางปราณี วรรณงาม  )</h5>
																												
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
        </div>
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
