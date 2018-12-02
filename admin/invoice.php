<?php include 'time.php'; ?>
<?php
date_default_timezone_set("Asia/Bangkok");
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorPNG.php');
include('src/BarcodeGeneratorSVG.php');
include('src/BarcodeGeneratorJPG.php');
include('src/BarcodeGeneratorHTML.php');

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
                                        <h1>บิลค่าใช้บริการ <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                                                        <i class="fa fa-print"></i>
                                                    </a>
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
                                        <?php
    $sql = "SELECT * FROM tbl_usage WHERE usage_date = '".$_GET['m']."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    ?>
                                            <div class="invoice">
                                                <div class="row invoice-logo">

                                                    <div class="col-xs-4 invoice-logo-space">
                                                        <img src="../assets/pages/media/invoice/14975889_1134711006604817_1463979142_o.png" class="img-responsive" alt="" Width="170" height="120" /> </div>
                                                    <div class="col-xs-4">
                                                    </div>
                                                    <div class="col-xs-8 pull-right" align="right">
                                                        <address>
                                                            <strong>The Proud Residence.</strong>
                                                            <br/> 153 หมู่ 4 ตำบลโพไร่หวาน อำเภอเมือง จังหวัดเพชรบุรี 76000 , ประเทศไทย 0959829415,0946463563
                                                            <?php 
                                            $sqlname = "SELECT * FROM tbl_contract WHERE contract_id = '".$row['usage_ref']."' ORDER BY contract_room ASC";
                                            $resultname = mysqli_query($conn,$sqlname);
                                            $rowname = mysqli_fetch_array($resultname);
    
                                            $sqlroom = "SELECT * FROM tbl_room WHERE r_name = '".$rowname['contract_room']."'";
                                            $resultroom = mysqli_query($conn,$sqlroom);
                                            $rowroom = mysqli_fetch_array($resultroom);
    
                                            $sqlservice = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '1' AND service_room = '".$rowname['contract_room']."'";
                                            $resultservice = mysqli_query($conn,$sqlservice);
                                            $rowservice = mysqli_fetch_array($resultservice);
    
                                            $sqlservice1 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '2' AND service_room = '".$rowname['contract_room']."'";
                                            $resultservice1 = mysqli_query($conn,$sqlservice1);
                                            $rowservice1 = mysqli_fetch_array($resultservice1);
                                            
                                            $sqlservice2 = "SELECT * FROM tbl_service WHERE service_status = '0' AND service_code = '3' AND service_room = '".$rowname['contract_room']."'";
                                            $resultservice2 = mysqli_query($conn,$sqlservice2);
                                            $rowservice2 = mysqli_fetch_array($resultservice2);
    
                                            $oldusage = date('Y-m',strtotime('-1 month'));
                                            $sqlusage = "SELECT * FROM tbl_usage WHERE usage_date = '".$oldusage."' AND usage_ref = '".$rowname['contract_id']."'";
                                            $resultoldusage = mysqli_query($conn,$sqlusage);
                                            $rowoldusage = mysqli_fetch_array($resultoldusage); 
    
                                            $sqlsetting = "SELECT * FROM tbl_setting ORDER BY id LIMIT 1";
                                            $resultwetting = mysqli_query($conn,$sqlsetting);
                                            $rowsetting = mysqli_fetch_array($resultwetting); 
                                            $priceelec = $rowsetting['unit_elec'];
                                            $pricewater = $rowsetting['unit_water'];
                                            ?> 
                                                            <br/>
                                                            ใบแจ้งค่าห้องของ <strong><?php echo $rowname['contract_name']  ?></strong> ผู้เช่าห้องพักหมายเลข <strong><?php echo $rowname['contract_room'] ?></strong> ประเภทห้อง <strong><?php echo $rowroom['r_size'] ?></strong> <strong>ต้นฉบับ</strong>
                                                            <?php
                                                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                                                 echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row['usage_id'], $generator::TYPE_CODE_39)) . '">';
                                                ?>
                                                        </address>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td width="85%" align="center"><strong>รายการ</strong></td>
                                                        <td width="15%" align="center"><strong>เป็นเงิน</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="85%">ค่าเช่าห้องพัก ประจำเดือน <strong><?php echo $row['usage_date'] ?></strong></td>
                                                        <td width="15%" align="right">
                                                            <?php echo number_format($rowroom['r_price'],2) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="85%">ค่าไฟฟ้า <strong>มิเตอร์ <?php echo $rowoldusage['usage_elec'] ?> ถึง <?php echo $row['usage_elec'] ?> จำนวน <?php echo $row['usage_elec']-$rowoldusage['usage_elec'] ?> หน่วย</strong></td>
                                                        <td width="15%" align="right">
                                                            <?php echo number_format(($row['usage_elec']-$rowoldusage['usage_elec'])* $priceelec,2)?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="85%">ค่าประปา <strong>มิเตอร์ <?php echo $rowoldusage['usage_water'] ?> ถึง <?php echo $row['usage_water'] ?> จำนวน <?php echo $row['usage_water']-$rowoldusage['usage_water'] ?> หน่วย</strong></td>
                                                        <td width="15%" align="right">
                                                            <?php echo number_format(($row['usage_water']-$rowoldusage['usage_water'])*$pricewater,2) ?>
                                                        </td>
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
                                                    if(mysqli_num_rows($resultservice)==1){
                                                        $internet = $rowservice['service_price'];
                                                        echo "
                                                        <tr>
                                                        <td width=\"85%\">ค่าบริการเสริมอินเทอร์เน็ต
                                                        </td>
                                                        <td width=\"15%\" align=\"right\">
                                                            ".number_format($rowservice['service_price'],2)."
                                                        </td>
                                                    </tr>
                                                        ";
                                                    } else {
                                                        $internet = '0';
                                                    }
                                                    ?>
                                                     <?php 
                                                    if(mysqli_num_rows($resultservice2)==1){
                                                        $rent = $rowservice2['service_price'];
                                                        echo "
                                                        <tr>
                                                        <td width=\"85%\">ค่าบริการให้เช่าตู้เย็น
                                                        </td>
                                                        <td width=\"15%\" align=\"right\">
                                                            ".number_format($rowservice2['service_price'],2)."
                                                        </td>
                                                    </tr>
                                                        ";
                                                    } else {
                                                        $rent = '0';
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td width="85%" align="center"><strong><?php echo convert(($rowroom['r_price']+($row['usage_elec']-$rowoldusage['usage_elec'])* $priceelec)+$discount+$internet+$rent+($row['usage_water']-$rowoldusage['usage_water'])*$pricewater) ?></strong></td>
                                                        <td width="15%" align="right"><strong><?php echo number_format(($rowroom['r_price']+($row['usage_elec']-$rowoldusage['usage_elec'])* $priceelec)+$discount+$internet+$rent+($row['usage_water']-$rowoldusage['usage_water'])*$pricewater,2) ?></strong></td>
                                                    </tr>
                                                </table>
                                                สามารถชำระเงินผ่านบัญชีธนาคารในนาม <strong>นางสาวชลาทิพย์ วรรณงาม</strong><br/>
                                                กรุงไทย <strong>731-0-125126</strong>,ไทยพาณิชย์ <strong>884-221315-0</strong>,ทหารไทย <strong>521-2-12910-9</strong><br>กสิกรไทย <strong>020-3-41777-2</strong>
                                            </div>
                                            <?php } ?>
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
