<?php include 'time.php'; ?>
<?php
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorPNG.php');
include('src/BarcodeGeneratorSVG.php');
include('src/BarcodeGeneratorJPG.php');
include('src/BarcodeGeneratorHTML.php');
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

$sql = "SELECT * FROM tbl_contract WHERE contract_id = '".$_GET['cid']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

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
    tab1 { padding-left: 4em; }
    tab2 { padding-left: 2em; }
</style>
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
                                        <h1>ระบบทำสัญญา
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
                                   <center> <?php
                                                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                                                 echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['cid'], $generator::TYPE_CODE_39)) . '">';
                                                ?></center>
                                    <div class="page-content-inner">
                                        <div class="invoice">
                                            <div class="row invoice-logo">
                                            <center>
                                                <div class="col-xs-12 invoice-logo-space">
                                                    <img src="../assets/pages/media/invoice/14975889_1134711006604817_1463979142_o.png" class="img-responsive" alt="" Width="170" height="120"/> </div>
                                               </center>
                                                <div class="col-xs-12">
                                                    <address class="pull-right">
                                                        เลขที่ <?php echo $_GET['cid'] ?>
                                                    </address>
                                                </div>
                                            </div>
                                            <center><h4><strong>หนังสือสัญญาเช่าห้องพัก อาคารพักอาศัย เดอะพราว</strong></h4></center>
                                            <div class="col-xs-12">
                                                    <address class="pull-right">
                                                        วันที่ <?php echo $row['contract_date'] ?>
                                                    </address>
                                            </div>
                                            <tab1>
                                            ข้าพเจ้า    <strong><?php echo $row['contract_name'] ?></strong>   บัตรประจำตัวประชาชนเลขที่    <strong><?php echo $row['contract_idcard'] ?></strong>
                                            อยู่บ้านเลขที่   <strong><?php echo $row['contract_address'] ?></strong>    ประกอบอาชีพ  <strong><?php echo $row['contract_job'] ?></strong>   เบอร์โทรศัพท์ที่ติดต่อได้  <strong><?php echo $row['contract_phone'] ?></strong>  ซึ่ง ณ ที่นี้เรียกว่า “ผู้เช่า” ได้ทำสัญญาฉบับนี้ไว้กับ
                                            นางปราณี วรรณงาม ซึ่งมีตำแหน่ง ผู้จัดการ ที่นี้เรียกว่า “ผู้ให้เช่า”
                                            ดังมีรายละเอียด ต่อไปนี้
                                            </tab1>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                <ol>
                                                    <li>ผู้เช่าได้ตกลงเช่าห้องพักหมายเลข  <strong><?php echo $row['contract_room'] ?></strong> ชั้น <strong><?php echo $row['contract_floor'] ?></strong>  ของอาคารพักอาศัย เดอะพราวนับตั้งแต่ <strong><?php echo $row['contract_start'] ?></strong> ถึง  <strong><?php echo $row['contract_end'] ?></strong>  อัตราเช่าเดือนละ <strong><?php echo number_format($row['contract_price'],2) ?></strong> บาท(<strong><?php echo convert($row['contract_price']) ?></strong>) เป็นเวลา <strong><?php echo $row['contract_term'] ?></strong></li>
                                                    <li>ผู้เช่าได้จ่ายเงินมัดจำล่วงหน้าจำนวน  <strong><?php echo number_format($row['contract_price'],2) ?></strong> บาท(<strong><?php echo convert($row['contract_price']) ?></strong>) เท่ากับอัตราเช่า 1 เดือนของค่าเช่าในวันทำสัญญานี้ ให้ถือเป็นเงินประกันความเสียหายต่างๆ ที่อาจเกิดขึ้นในระหว่างอยู่อาศัยหรือเกิดจากสาเหตุในการผิดสัญญาต่างๆ ตามมูลค่าที่เสียหายของทรัพย์สินนั้นๆ</li>
                                                    <li>กรณีผู้เช่ายังวางเงินประกันตามสัญญาข้อที่ 2 ไม่ครบตามจำนวนและมีการบอกเลิกการเช่าเสียก่อน เงินจำนวนที่วางไว้แล้วนั้น ทางผู้เช่าจะยึดเป็นค่าเปิดห้องค่าเสียหายของห้องเต็มจำนวนที่ได้วางไว้ จะไม่นำมาหักกับค่าใช้จ่ายทั้งหมดที่เกิดขึ้นเมื่อผู้เช่าย้ายออก ให้ถือว่าการแจ้งย้ายออกในขณะนั้นเป็นอันสิ้นสุดแห่งสัญญาเช่า ผู้เช่าจะไม่มีสิทธิ์นำเงินส่วนที่ค้างประกันมาชำระให้เต็มจำนวนเพื่อใช้โอกาสในการนำเงินประกันที่วางไว้มาหักค่าใช้จ่ายที่เกิดขึ้นขณะที่ผู้เช่าย้ายออกได้อีก ถึงแม้ว่าผู้เช่าจะแจ้งล่วงหน้าก่อนย้ายออก เป็นเวลา 1 เดือนแล้วก็ตาม ท่านก็ยังคงจะต้องจ่ายค่าใช้จ่ายที่เกิดขึ้นทั้งหมดดังนี้ คือ ค่าเช่าห้อง ค่าไฟฟ้า ค่าน้ำประปา ค่าโทรศัพท์ และค่าเสียหายอื่นๆ ในกรณีทรัพย์สินภายในห้องเสียหายมากกว่าวงเงินที่ได้วางประกันไว้แล้ว</li>
                                                    <li>กรณีที่มีการย้ายออกกระทันหันโดยไม่มีการแจ้ง ทางผู้ให้เช่าจะคิดค่าห้องเพิ่มครึ่งเดือน</li>
                                                    <li>เมื่อผู้เช่าเข้าพักในห้องเช่าแล้ว หากภายในห้องพักมีสิ่งใดเสียหาย ต้องรีบแจ้งให้ผู้ให้เช่าทราบเพื่อทำการแก้ไขภายใน 5 วัน มิฉะนั้นจะถือเสมือนว่าอุปกรณ์ภายในห้องพักทั้งหมดเรียบร้อยทุกประการ</li>
                                                    <li>ผู้เช่าสัญญาว่าจะไม่ทำการเปลี่ยนแปลงสภาพห้องพักจากเดิมที่เป็นอยู่ หรือจะไม่ทำการใดๆ อันจะทำให้สภาพห้องพักชำรุดเสียหาย เช่น ติดตั้งอุปกรณ์ห้องพัก, ตอกตะปู, ติดรูปภาพ, ทาสี ฯลฯ ตลอดจนสัญญาว่าจะรักษาสภาพห้องพักให้มีสภาพคงเดิมเสมอไป (ตอกตะปู ปรับรูละ 100 บาท ติดกระดาษกาวจะดูตามความมากน้อยที่ติดและเหมารวมค่าเอาออก)</li>
                                                    <li>สิ่งติดตั้ง, ต่อเติม (ที่ได้รับอนุญาตแล้ว) เมื่อมีการบอกเลิกสัญญาเช่า ทางผู้เช่ามีสิทธิ์รื้อถอนได้ (นอกเสียจากสิ่งที่ติดตั้งบางอย่างที่ทางผู้ให้เช่าเห็นว่าหากรื้อถอนออกไปจะนำความเสียหายต่อสภาพอาคาร, ที่พัก ผู้ให้เช่าก็จะไม่อนุญาตให้รื้อออกไป) แต่ทั้งนี้หากการรื้อถอนก่อให้เกิดความชำรุดเสียหายต่อตัวอาคาร/สิ่งก่อสร้างเดิม ผู้ให้เช่ามีสิทธิ์เรียกร้องค่าเสียหายที่เกิดขึ้นกับผู้เช่า โดยจะหักจากเงินประกันตามสัญญาข้อที่ 2 ที่วางไว้ แต่ถ้าหากสิ่งติดตั้ง, ต่อเติมดังกล่าวไม่ว่าจะให้เอาออกได้หรือไม่ได้ ผู้เช่าไม่นำออกไป ทางผู้เช่าก็ไม่มีสิทธิ์มาเรียกร้องค่าทรัพย์สินนั้นๆ จากผู้ให้เช่า</li>
                                                    <li>สิทธิ์ในการเช่าพักตามสัญญานั้น เป็นสิทธิ์เฉพาะตัวผู้เช่า และไม่เป็นทรัพย์สินที่จะโอนกันโดยทางมรดกหรือทางใด ๆ เว้นแต่จะได้รับความยินยอมจากผู้ให้เช่าเป็นลายลักษณ์อักษร</li>
                                                    <li>ฝาท่อน้ำทิ้งได้มีการติดตั้งให้ติดไว้กับพื้นห้องน้ำ เพื่อป้องกันมิให้ผู้เช่าที่มักง่ายบางรายทิ้งเศษอาหาร ซึ่งจะมีผลทำให้ท่อน้ำอุดตัน หากวันที่ท่านย้ายออกได้ตรวจพบว่าฝาท่อน้ำนั้นหลุดออก หรือเสียหายอันเกิดจากการกระทำของผู้เช่า ถึงแม้ว่าผู้เช่าจะอ้างว่าหลุดอยู่ก่อนแล้วก็ตาม เพราะเมื่อท่านอ่านสัญญาและลงลายมือชื่อ ให้ถือว่าท่านยอมรับผิดชอบในสภาพห้องพักที่เกิดขึ้น นอกเสียจากมีการบอกกล่าวแก่ผู้เช่าตั้งแต่ก่อนลงลายมือชื่อ ดังนั้นหากเกิดชำรุดตามที่ได้กล่าวมาแล้ว วันที่ท่านย้ายออกทางผู้ให้เช่าจะหักเงินมัดจำตามสัญญาข้อที่ 2 เป็นจำนวน 500 บาท</li>
                                                    <li>กรณีมีเหตุจำเป็นในการผิดนัดการชำระค่าเช่า จะอนุญาตให้เพียง 7 วันเท่านั้น หากเกินกว่านี้จะคิดค่าปรับวันละ 100 บาท จนถึงวันที่ 15 ของเดือนหากท่านยังไม่นำค่าเช่าพักมาชำระ ให้ถือว่าสัญญาเช่าเป็นอันสิ้นสุดลง ให้ผู้เช่าย้ายทรัพย์สินออกจากสถานที่เช่าภายใน 7 วันและให้คิดค่าเช่าในเดือนที่อยู่ล่วงหน้ามาเต็มเดือนพร้อมกับค่าปรับตามจำนวนวันคือ ตั้งแต่วันที่ 7 จนถึงวันที่ย้ายออก</li>
                                                    <li>ในกรณีผู้เช่าทิ้งห้องในร้างไว้เกิน  1  เดือนโดยทางผู้ให้เช่าเอง  ก็ไม่ได้รับการติดต่อจากผู้เช่าเลยถึงการรับผิดชอบในค่าเช่าห้องพัก  (กรณีนี้รวมถึงเจ้าของห้องไม่รับผิดชอบในค่าเช่าด้วย คือไม่สามารถชำระค่าเช่าได้เมื่อถึงวันที่ 15) ผู้ให้เช่ามีสิทธิ์นำทรัพย์สินของผู้เช่าออกจากห้องเพื่อเปิดห้องให้บุคคลอื่นเช่าต่อไปได้โดยไม่มีความผิดตามกฎหมายแต่ประการใดเพราะให้ถือว่าลายมือชื่อของผู้เช่า ท้ายสัญญา คือการอนุญาตของผู้เช่าตามกฎหมาย และทางผู้เช่าก็ไม่มีสิทธิ์มาเรียกร้องค่าเสียหายในทรัพย์สินใด ๆ ที่นำออกมาหรือทรัพย์สินใด ๆ ที่ผู้เช่าพูดแต่เพียงฝ่ายเดียวว่าสูญหายไปและภายใน 15 วันหลังจากนำทรัพย์สินออกจากห้องทางผู้เช่าคงไม่ติดต่อกลับมาเพื่อชำระหนี้สินที่คงค้าง ผู้ให้เช่ามีสิทธิ์นำทรัพย์สินออกจำหน่าย หรือทิ้งได้โดยไม่มีความผิดแต่ประการใด ผู้เช่าไม่มีสิทธิ์ที่จะมาเรียกร้องค่าทรัพย์สินในภายหลัง</li>
                                                    <li>ในการบอกเลิกสัญญาเช่า ผู้เช่าจะต้องแจ้งให้ผู้เช่าทราบอย่างน้อยเป็นเวลา 1 เดือนหากน้อยกว่านี้ ทางผู้ให้เช่าจะไม่คืนเงินประกันส่วนที่เหลือให้ และเมื่อมีการบอกเลิกสัญญาเช่าแล้ว เมื่อถึงกำหนดผู้เช่าไม่ยอมออกจากสถานที่เช่า ผู้เช่าจะต้องจ่ายค่าเสียหายให้แก่ผู้ให้เช่าเป็นจำนวนเงิน 500 บาท เพื่อต่อสัญญา</li>
                                                    <li>และในวันที่ผู้เช่าย้ายออก ทางผู้ให้เช่าจะเข้าตรวจสภาพสีและอุปกรณ์ของห้องพักทั้งหมด โดยจะคิดสภาพความทรุดโทรมของสี ส่วนอุปกรณ์ห้องพักก็จะคิดตามความเสียหาย (โดยจะคิดตามจำนวนสีที่ต้องใช้ทา+ค่าแรงในการทา) ซึ่งราคาสีและอุปกรณ์ที่เสียหายจะคิดตามราคาปัจจุบัน โดยสิทธิ์ในการซ่อมแซมให้เป็นสิทธิ์ของผู้ให้เช่าเท่านั้น</li>
                                                    <li>หากผู้เช่าเข้าพักในสถานที่เช่าในวันที่ 1-3 ทางผู้เช่าจะคิดค่าเช่าเต็มเดือน หากตั้งแต่วันที่ 4 เป็นต้นไป ก็จะคิดตั้งแต่วันที่ท่านเข้าพักอาศัยจะถึงสิ้นเดือน เช่นเดียวกันเมื่อมีการย้ายออก หากท่านย้ายออกตั้งแต่วันที่ 1-2 ของเดือนจะคิดค่าเช่าเพิ่มอีก 2 วัน ตั้งแต่วันที่ 3 เป็นต้นไปจะคิดค่าเช่าเพิ่มเป็น 1 สัปดาห์ ย้ายออกในวันที่ 7 เป็นต้นไปจะคิดค่าเช่าเพิ่มเป็นครึ่งเดือน และย้ายออกในวันที่ 15 เป็นต้นไปจะคิดค่าเช่าเต็มเดือน ซึ่งกรณีเดียวกันหากมีการแจ้งย้ายออกในวันที่ 15 หรือวันใดที่ไม่ตรงกับสิ้นเดือน การย้ายออกจะต้องกระทำในวันสิ้นเดือนของเดือนถัดไป เพราะถึงท่านจะย้ายออกในวันซึ่งตรงกับที่ท่านแจ้งของเดือนถัดไป ท่านก็ต้องชำระค่าห้องของเดือนถัดไปที่ท่านย้ายออกเต็มเดือน</li>
                                                    <li>ผู้เช่าสัญญาว่าจะปฏิบัติตามกฎระเบียบของที่พักในท้ายสัญญานี้อย่างเคร่งครัด</li>
                                                    <li>ผู้เช่ายินดีให้ผู้ให้เช่าหักค่าเสียหายตามสัญญาข้อที่ 2 ได้โดยไม่มีข้อแม้แต่ประการใดและผู้ให้เช่ามีสิทธิ์ขอเข้าตรวจสภาพห้องพักและอุปกรณ์ห้องพักได้ทุกเวลา</li>
                                                    <li>ผู้ให้เช่ามีสิทธิ์บอกเลิกสัญญาเช่านี้ได้ทันที หากผู้เช่าผิดสัญญาข้อหนึ่งข้อใดในสัญญาฉบับนี้ ตลอดจนไม่ปฏิบัติตามกฎระเบียบในท้ายสัญญานี้ด้วย และเมื่อมีการบอกเลิกสัญญาเช่าแล้ว ผู้เช่าจะต้องย้ายออกจากสถานที่เช่าภายใน 7 วัน นับจากวันที่มีการบอกเลิกสัญญาเช่า</li>
                                                    <li>เมื่อผู้ให้เช่ามีเหตุจำเป็นจะต้องยกเลิกการเช่า ผู้ให้เช่าจะต้องแจ้งให้ผู้เช่าทราบล่วงหน้าเป็นเวลา 1 เดือน และผู้เช่าจะต้องย้ายออกจากสถานที่เช่าภายใน 7 วันนับจากที่มีการแจ้งโดยไม่มีข้อแม้แต่ประการใดสัญญาฉบับนี้ให้ถือเป็นหลักฐานการทำสัญญาระหว่าง “ผู้เช่า” และ “ผู้ให้เช่า” โดยให้ถือว่ามีผลบังคับใช้เป็นหลักฐานตามกฎหมายได้ในกรณีฝ่ายหนึ่งฝ่ายใดผิดสัญญา สัญญาฉบับนี้ได้ทำขึ้นจำนวน 2 ฉบับ โดยมีข้อความตรงกันและทั้งสองฝ่ายได้อ่านเป็นที่เข้าใจดีแล้ว จึงได้ลงลายมือชื่อไว้เป็นหลักฐาน</li>

                                                </ol>
                                                </div>
                                            </div>
                                            <div class="row"><center>
                                            <div class="col-xs-6">
                                                <p>ลงชื่อ ....................................... ผู้เช่า</p>
                                                <p>(  <?php echo $row['contract_name'] ?>  )</p>
                                            </div>
                                                <div class="col-xs-6">
                                                <p>ลงชื่อ ....................................... ผู้ให้เช่า</p>
                                                <p>(  นางปราณี  วรรณงาม   )</p>
                                            </div></center>
                                            </div>
                                            <div class="row"><center>
                                            <div class="col-xs-6">
                                                <p>ลงชื่อ ....................................... พยาน</p>
                                                <p>(.......................................................)</p>
                                            </div>
                                                <div class="col-xs-6">
                                                <p>ลงชื่อ ....................................... พยาน</p>
                                                <p>( นางสาวชลาทิพย์  วรรณงาม  )</p>
                                            </div></center>
                                            </div>
                                                <div class="col-xs-12 invoice-payment">
                                                    <h5 class="pull-right">พิมพ์โดย <?php echo $_SESSION['firstname'] ?> [<?php echo date("Y-m-d h:i:sa") ?>]</h5>
                                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> 1.Print
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                    <?php
   $username = $row['contract_name'];
$userid = $row['contract_idcard'];
$userphone = $row['contract_phone'];
    echo "<a class=\"btn btn-lg blue hidden-print margin-bottom-5\" onclick=\"window.open('upload.php?cid=$_GET[cid]&name=$username&id=$userid&phone=$userphone', '_blank', 'location=yes,height=300,width=500,scrollbars=yes,status=yes');\"> 2.อัปโหลด
                                                        <i class=\"fa fa-upload\"></i>
                                                    </a>"; ?>
                                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="window.open('service.php?id=<?php echo $row['contract_room'] ?>', '_blank', 'location=yes,height=500,width=1024,scrollbars=yes,status=yes');"> 3.Add Services
                                                        <i class="fa fa-payment"></i>
                                                    </a>
                                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" href="process_checkbill.php"> 4.Payment
                                                        <i class="fa fa-payment"></i>
                                                    </a>
                                                </div>
																								<?php if($row['contract_remark']!="")echo "หมายเหตุ :  ลายนิ้วมือ ".$row['contract_remark']; ?>    <?php if($row['contract_remark1']!="")echo "ทะเบียนรถ ".$row['contract_remark1']; ?>     <?php if($row['contract_remark2']!="")echo "รหัส ".$row['contract_remark2']; ?>
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
