<?php include 'time.php'; ?>
<?php
date_default_timezone_set("Asia/Bangkok");
//check user = admin
session_start();
include_once 'test_online.php';
include_once ("config.php");
if ($_SESSION['role']!='A'){
	die("<script>
				alert('Access not allow');
				window.location='logout.php';
			 </script>");
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
                                        <h1>ดำเนินการชำระค่าบริการรายเดือน
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
                                                                         	<?php if($_POST['select1']==2){echo "ระบบรับชำระและออกใบเสร็จรับเงินสำหรับการจอง/ทำสัญญา";} ?>    
                                                                        <?php if($_POST['select1']==1){echo "ระบบรับชำระและออกใบเสร็จรับเงินสำหรับค่าบริการรายเดือน";} ?>                                                                      
                                                                        </div>
                                                                </div>
                                                                <div class="portlet-body form">
                                                                    <!-- BEGIN FORM-->
                                                                    <form action="process_billinfo.php" class="form-horizontal" method="post">
                                                                    
                                                                    <?php
                                                                    $processid = $_POST['select1'];
                                                                        $sql1 = "SELECT * FROM tbl_usage ORDER BY id DESC LIMIT 1";
                                                                        $result1 = mysqli_query($conn,$sql1);
                                                                        $row1 = mysqli_fetch_array($result1); 
                                                                    if ($processid == 1){
																								echo "
																								<div class=\"form-body\">
                                                                                <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ห้องที่ต้องการชำระ</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <input type=\"text\" class=\"form-control\" placeholder=\"Room Name\" name=\"invoiceid\" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">ประจำเดือน</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <input type=\"text\" class=\"form-control\" placeholder=\"Date\" name=\"date1\" required value=\"".$row1['usage_date']."\">
                                                                                            <input type=\"hidden\" name=\"process\" value=\"".$processid."\">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          </div>
																								";                                                                    
                                                                    }
                                                                    if ($processid == 2){
																								echo "
																										<div class=\"form-body\">
                                                                                <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">เลขอ้างอิงที่ 1</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <input type=\"text\" class=\"form-control\" placeholder=\"มีการจองให้ใส่เลขที่การจองหรือประชาชน ไม่มีใส่เครื่องหมาย -\" name=\"reserveid\" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">เลขอ้างอิงที่ 2</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <input type=\"text\" class=\"form-control\" placeholder=\"เลขที่สัญญา\" name=\"contractid\" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"row\">
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">หน่วยไฟเริ่มต้น</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <input type=\"text\" class=\"form-control\" name=\"elec\" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=\"col-md-6\">
                                                                                    <div class=\"form-group\">
                                                                                        <label class=\"control-label col-md-3\">หน่วยน้ำเริ่มต้น</label>
                                                                                        <div class=\"col-md-9\">
                                                                                            <input type=\"text\" class=\"form-control\" name=\"water\" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                             <div class=\"row\">
                                                                                <div class=\"col-md-12\">
                                                                                    <div class=\"form-group\">
                                                                                        <div class=\"col-md-12\">
                                                                                            <center><input type=\"checkbox\" name=\"optionsRadios2\" value=\"1\" /> มีการบันทึกหน่วยไฟฟ้า-น้ำประปาจำนวน 2 ครั้งในเดือนเดียวกัน </label></center>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>

																							";                                                                    
                                                                    }
                                                                    if ($processid == "no"){
																								die("<script>
																									alert('Please select choice');
																									history.back();
			 																						</script>");
                                                                    }
                                                                    ?>
                                                                        <div class="form-actions">
                                                                            <div class="row">
                                                                                <div class="col-md-offset-6 col-md-12">
                                                                                	  <input type="hidden" name="processid" value="<?php echo $processid ?>">
                                                                                    <button type="submit" class="btn btn-circle green">Next</button>
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
                        
                           <center> <div id=dplay ></div> </center>
                           <br>
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