<?php include 'time.php'; ?>
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
if ($_POST['select3']=='no'){
	die("<script>
				window.back();
			 </script>");
} else {
    if ($_POST['select3']=='1'){
        $msg3 = "ล้วงหน้ามากกว่า 30 วัน";
    } elseif ($_POST['select3']=='2'){
        $msg3 = "ล้วงหน้าน้อยกว่า 30 วัน แต่ไม่เกินวันที่ 15";
    } else {
        $msg3 = "ล้วงหน้าเกินวันที่ 15";
    }
}
if ($_POST['select2']=='no'){
	die("<script>
				window.back();
			 </script>");
}
if ($_POST['select1']=='no'){
	die("<script>
				window.back();
			 </script>");
} else {
    if ($_POST['select1']==1){
	   $msg1 = 'บอกเลิกสัญญาโดยผู้ให้เช่า';
    } else {
	   $msg1 = 'บอกเลิกสัญญาโดยผู้เช่า';
    }
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
        <style type="text/css">
            tab1 {
                padding-left: 4em;
            }
            
            tab2 {
                padding-left: 2em;
            }

        </style>
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
                                        <h1>ยืนยันการยกเลิกสัญญา

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
                                        <form action="cmd.php?action=payment3" method="post">
                                            <div class="invoice">
                                                <?php
                                                    $sql = "SELECT * FROM tbl_contract WHERE id = '".$_POST['select2']."'";
                                                    $result = mysqli_query($conn,$sql);
                                                    $row = mysqli_fetch_array($result);

                                                     $todday = date("Y-m-d");
                                                    $sql1 = "SELECT * FROM tbl_contract WHERE DATEDIFF(contract_end,'$todday') < 0 AND contract_status = '0' AND id = '".$_POST['select2']."'";
                                                    $result1 = mysqli_query($conn,$sql1);

                                                        $sqlsetting = "SELECT * FROM tbl_setting ORDER BY id LIMIT 1";
                                                        $resultwetting = mysqli_query($conn,$sqlsetting);
                                                        $rowsetting = mysqli_fetch_array($resultwetting);
                                                        $priceelec = $rowsetting['unit_elec'];
                                                        $pricewater = $rowsetting['unit_water'];

																												$sqlusage = "SELECT * FROM tbl_usage WHERE usage_ref = '".$row['contract_id']."' ORDER BY id DESC LIMIT 1";
                                                        $resultusage = mysqli_query($conn,$sqlusage);
                                                        $rowusage = mysqli_fetch_array($resultusage);
																												?>
                                                    <center>
                                                        <h4>ดำเนินการยกเลิกสัญญาเลขที่ <strong><?php echo $row['contract_id'] ?></strong> ห้อง <strong><?php echo $row['contract_room'] ?></strong> เช่าโดย <strong><?php echo $row['contract_name'] ?></strong> วันที่ <strong><?php echo date("Y-m-d") ?></strong></h4>
                                                    </center>
                                                    <?php
                                                        if ($_POST['unitwater']<$rowusage['usage_water']){
                                                            die("<script>
				                                                alert('กรุณาตรวจสอบหน่วยน้ำที่บันทึก');
				                                                window.back();
                                                                exit();
			                                                     </script>");
                                                        }
                                                        if ($_POST['unitelec']<$rowusage['usage_elec']){
                                                            die("<script>
				                                                alert('กรุณาตรวจสอบหน่อยไฟที่บันทึก');
				                                                window.back();
                                                                exit();
			                                                     </script>");
                                                        }

																												$sql11 = "SELECT * FROM tbl_room WHERE r_name = '".$row['contract_room']."'";
																												$result11 = mysqli_query($conn,$sql11);
																												$row11 = mysqli_fetch_array($result11);

                                                    if (mysqli_num_rows($result1)==1){
																											//ครบสัญญา
                                                        $msg = $msg1." ".$msg3." คืนเงินประกันเต็มจำนวน เนื่องจากครบอายุสัญญา";
                                                        $price = number_format($row11['r_price'],2);
                                                        ?>
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td width="85%" align="center"><strong>รายการ</strong></td>
                                                                <td width="15%" align="center"><strong>เป็นเงิน</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="85%">
                                                                    <?php echo $msg ?>
                                                                </td>
                                                                <td width="15%" align="right">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="85%">ค่าไฟฟ้า <strong>มิเตอร์ <?php echo $rowusage['usage_elec'] ?> ถึง <?php echo $_POST['unitelec'] ?> จำนวน <?php echo $_POST['unitelec']-$rowusage['usage_elec'] ?> หน่วย</strong></td>
                                                                <td width="15%" align="right">
                                                                    <?php echo number_format(($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec,2)?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="85%">ค่าประปา <strong>มิเตอร์ <?php echo $rowusage['usage_water'] ?> ถึง <?php echo $_POST['unitwater'] ?> จำนวน <?php echo $_POST['unitwater']-$rowusage['usage_water'] ?> หน่วย</strong></td>
                                                                <td width="15%" align="right">
                                                                    <?php echo number_format(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater,2)?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="85%">ค่าทำความสะอาด</td>
                                                                <td width="15%" align="right">
                                                                    <?php echo number_format($_POST['clean'],2) ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="85%">ค่าล้างแอร์</td>
                                                                <td width="15%" align="right">
                                                                    <?php echo number_format($_POST['air'],2) ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            if ($_POST['description'] != ""){
                                                                $description = $_POST['description'];
                                                                $priceother = $_POST['priceother'];
                                                                echo "
                                                                <tr>
                                                        <td width=\"85%\">อื่นๆ ระบุ : <strong>".$_POST['description']."</strong></td>
                                                        <td width=\"15%\" align=\"right\">".number_format($_POST['priceother'],2)."</td>
                                                    </tr>
                                                                ";
                                                            } else {
                                                                $description = $_POST['description'];
                                                                $priceother = '0';
                                                            }
                                                            ?>
                                                                <tr>
                                                                    <td width="85%">
                                                                        <center><strong><?php echo convert((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother-$row11['r_price']) ?></strong></center>
                                                                    </td>
                                                                    <td width="15%" align="right"><strong><?php echo number_format(((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother-$row11['r_price']),2) ?></strong></td>
                                                                </tr>
                                                                <input type="hidden" name="total" value="<?php echo ((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother-$row11['r_price']) ?>">
                                                        </table>
                                                        <?php
                                                    } else {
																											//ไม่ครบสัญญา
																											$sqlservice3 = "SELECT * FROM tbl_service WHERE service_room = '".$row11['r_name']."' AND service_code = '4' AND service_status = '0'";
																											$resultservice3 = mysqli_query($conn,$sqlservice3);
																											$rowservice3 = mysqli_fetch_array($resultservice3);
																											$msg = $msg1." ".$msg3." ไม่สามารถคืนได้ประกันได้ เนื่องจากไม่ครบอายุสัญญา";
																											$price = "0";
                                                        $hafttime = date("Y-m")."-15";
																												$today = date("Y-m-d");
																												$arrDate1 = explode("-",$hafttime);
																												$arrDate2 = explode("-",$today);
																												$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]);
																												$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[2],$arrDate2[0]);
																												if ($timStmp2 < $timStmp1){
																													//ก่อนวันที่ 15
																													?>
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <tr>
                                                                    <td width="85%" align="center"><strong>รายการ</strong></td>
                                                                    <td width="15%" align="center"><strong>เป็นเงิน</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">
                                                                        <?php echo $msg ?>
                                                                    </td>
                                                                    <td width="15%" align="right">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">ได้รับการยกเว้นค่าธรรมเนียมการยกเลิกสัญญาก่อนสิ้นอายุสัญญา</td>
                                                                    <td width="15%" align="right">
                                                                    </td>
                                                                    <input type="hidden" name="seevice3" value="<?php echo $rowservice3['service_price'] ?>">
                                                                    <input type="hidden" name="msgservice" value="ได้รับการยกเว้นค่าธรรมเนียมการยกเลิกสัญญาก่อนสิ้นอายุสัญญา">
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">ค่าห้องพัก ครึ่งเดือน</td>
                                                                    <td width="15%" align="right">
                                                                        <?php echo number_format($row11['r_price']/2,2) ?>
                                                                    </td>
                                                                    <input type="hidden" name="roomprice" value="<?php echo ($row11['r_price']/2) ?>">
                                                                    <input type="hidden" name="roommsg" value="ค่าห้องพัก ครึ่งเดือน">
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">ค่าไฟฟ้า <strong>มิเตอร์ <?php echo $rowusage['usage_elec'] ?> ถึง <?php echo $_POST['unitelec'] ?> จำนวน <?php echo $_POST['unitelec']-$rowusage['usage_elec'] ?> หน่วย</strong></td>
                                                                    <td width="15%" align="right">
                                                                        <?php echo number_format(($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec,2)?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">ค่าประปา <strong>มิเตอร์ <?php echo $rowusage['usage_water'] ?> ถึง <?php echo $_POST['unitwater'] ?> จำนวน <?php echo $_POST['unitwater']-$rowusage['usage_water'] ?> หน่วย</strong></td>
                                                                    <td width="15%" align="right">
                                                                        <?php echo number_format(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater,2)?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">ค่าทำความสะอาด</td>
                                                                    <td width="15%" align="right">
                                                                        <?php echo number_format($_POST['clean'],2) ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="85%">ค่าล้างแอร์</td>
                                                                    <td width="15%" align="right">
                                                                        <?php echo number_format($_POST['air'],2) ?>
                                                                    </td>
                                                                </tr>
                                                                </tr>
                                                                <?php
																																		if ($_POST['description'] != ""){
																																				$description = $_POST['description'];
																																				$priceother = $_POST['priceother'];
																																				echo "
																																				<tr>
																																<td width=\"85%\">อื่นๆ ระบุ : <strong>".$_POST['description']."</strong></td>
																																<td width=\"15%\" align=\"right\">".number_format($_POST['priceother'],2)."</td>
																														</tr>
																																				";
																																		} else {
																																				$description = $_POST['description'];
																																				$priceother = '0';
																																		}
																																		?>
                                                                    <tr>
                                                                        <tr>
                                                                            <td width="85%">
                                                                                <center><strong><?php echo convert((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother+($row11['r_price']/2)+$rowservice3['service_price']) ?></strong></center>
                                                                            </td>
                                                                            <td width="15%" align="right"><strong><?php echo number_format(((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother+($row11['r_price']/2)+$rowservice3['service_price']),2) ?></strong></td>
                                                                        </tr>
                                                                        <input type="hidden" name="total" value="<?php echo ((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother+($row11['r_price']/2)+$rowservice3['service_price']) ?>">
                                                            </table>
                                                            <?php
																												} else {
																													//หลังวันที่15
																													?>
                                                                <table class="table table-striped table-bordered table-hover">
                                                                    <tr>
                                                                        <td width="85%" align="center"><strong>รายการ</strong></td>
                                                                        <td width="15%" align="center"><strong>เป็นเงิน</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">
                                                                            <?php echo $msg ?>
                                                                        </td>
                                                                        <td width="15%" align="right">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">ได้รับการยกเว้นค่าธรรมเนียมการยกเลิกสัญญาก่อนสิ้นอายุสัญญา</td>
                                                                        <td width="15%" align="right">
                                                                         
                                                                        </td>
                                                                        <input type="hidden" name="seevice3" value="<?php echo $rowservice3['service_price'] ?>">
                                                                        <input type="hidden" name="msgservice" value="ได้รับการยกเว้นค่าธรรมเนียมการยกเลิกสัญญาก่อนสิ้นอายุสัญญา">
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">ค่าห้องพัก</td>
                                                                        <td width="15%" align="right">
                                                                            <?php echo number_format($row11['r_price'],2) ?>
                                                                        </td>
                                                                        <input type="hidden" name="roomprice" value="<?php echo $row11['r_price'] ?>">
                                                                        <input type="hidden" name="roommsg" value="ค่าห้องพัก">
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">ค่าไฟฟ้า <strong>มิเตอร์ <?php echo $rowusage['usage_elec'] ?> ถึง <?php echo $_POST['unitelec'] ?> จำนวน <?php echo $_POST['unitelec']-$rowusage['usage_elec'] ?> หน่วย</strong></td>
                                                                        <td width="15%" align="right">
                                                                            <?php echo number_format(($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec,2)?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">ค่าประปา <strong>มิเตอร์ <?php echo $rowusage['usage_water'] ?> ถึง <?php echo $_POST['unitwater'] ?> จำนวน <?php echo $_POST['unitwater']-$rowusage['usage_water'] ?> หน่วย</strong></td>
                                                                        <td width="15%" align="right">
                                                                            <?php echo number_format(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater,2)?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">ค่าทำความสะอาด</td>
                                                                        <td width="15%" align="right">
                                                                            <?php echo number_format($_POST['clean'],2) ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="85%">ค่าล้างแอร์</td>
                                                                        <td width="15%" align="right">
                                                                            <?php echo number_format($_POST['air'],2) ?>
                                                                        </td>
                                                                    </tr>
                                                                    </tr>
                                                                    <?php
																																		if ($_POST['description'] != ""){
																																				$description = $_POST['description'];
																																				$priceother = $_POST['priceother'];
																																				echo "
																																				<tr>
																																<td width=\"85%\">อื่นๆ ระบุ : <strong>".$_POST['description']."</strong></td>
																																<td width=\"15%\" align=\"right\">".number_format($_POST['priceother'],2)."</td>
																														</tr>
																																				";
																																		} else {
																																				$description = $_POST['description'];
																																				$priceother = '0';
																																		}
																																		?>
                                                                        <tr>
                                                                            <tr>
                                                                                <td width="85%">
                                                                                    <center><strong><?php echo convert((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother+$row11['r_price']+$rowservice3['service_price']) ?></strong></center>
                                                                                </td>
                                                                                <td width="15%" align="right"><strong><?php echo number_format(((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother+$row11['r_price']+$rowservice3['service_price']),2) ?></strong></td>
                                                                            </tr>
                                                                            <input type="hidden" name="total" value="<?php echo ((($_POST['unitelec']-$rowusage['usage_elec'])* $priceelec)+(($_POST['unitwater']-$rowusage['usage_water'])* $pricewater)+$_POST['clean']+$_POST['air']+$priceother+$row11['r_price']+$rowservice3['service_price']) ?>">
                                                                </table>
                                                                <?php
																												}
                                                    }
                                                ?>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="btn btn-lg pull-right">
                                                        <input type="hidden" name="description" value="<?php echo $description ?>">
                                                        <input type="hidden" name="priceother" value="<?php echo $priceother ?>">
                                                        <input type="hidden" name="msg" value="<?php echo $msg ?>">
                                                        <input type="hidden" name="air" value="<?php echo $_POST['air'] ?>">
                                                        <input type="hidden" name="clean" value="<?php echo $_POST['clean'] ?>">
                                                        <input type="hidden" name="msgprice" value="<?php echo $price ?>">
                                                        <input type="hidden" name="newwater" value="<?php echo $_POST['unitwater'] ?>">
                                                        <input type="hidden" name="oldwater" value="<?php echo $rowusage['usage_water'] ?>">
                                                        <input type="hidden" name="newelec" value="<?php echo $_POST['unitelec'] ?>">
                                                        <input type="hidden" name="oldelec" value="<?php echo $rowusage['usage_elec'] ?>">
                                                        <input type="hidden" name="ref" value="<?php echo $row['contract_id'] ?>">
                                                        <input type="hidden" name="optionsRadios2" value="<?php echo $_POST['optionsRadios2'] ?>">
                                                        <button type="submit" class="btn btn-circle blue" onclick="return confirm('ต้องการดำเนินการยกเลิก?');">ดำเนินการยกเลิกและชำระเงินเรียบร้อยแล้ว</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
