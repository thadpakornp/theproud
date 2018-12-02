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
        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                                        <h1>เปลี่ยน/ย้าย ห้องพัก
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">

                                                    <div class="portlet-body form">
                                                        <form class="form-horizontal" action="cmd.php?action=moveroom"  method="POST">

                                                                <div class="form-body">
                                                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                                                        <div class="progress-bar progress-bar-success"> </div>
                                                                    </div>
                                                                    <div class="tab-content">
                                                                        <div class="alert alert-danger display-none">
                                                                            <button class="close" data-dismiss="alert"></button> กรุณากรอกข้อมูลให้ครบถ้วน. </div>
                                                                        <div class="tab-pane active" id="tab1">
                                                                           <div class="form-group">
																																							<label class="control-label col-md-3">ห้องเดิม <span class="required"> * </span></label>

																																							<div class="col-md-6">
																																									<select name="roomold" class="form-control" required>
																																											<option value="" selected></option>
																																											<?php
																																																				$sql = "SELECT * FROM tbl_contract WHERE contract_status = '0' ORDER BY contract_room ASC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) { ?>
<option value="<?php echo $row['contract_id'] ?>"> ห้อง  <?php echo $row['contract_room'] ?> เช่าโดย <?php echo $row['contract_name'] ?></option>
<?php
}
																																																		 ?>
																																									</select>
																																							</div>
																																					</div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">หน่วยไฟฟ้าห้องเดิม
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="unitelec" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">หน่วยน้ำประปาห้องเดิม
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="unitwater" required/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                           <div class="form-group">
																																							<label class="control-label col-md-3">ห้องใหม่ <span class="required"> * </span></label>

																																							<div class="col-md-6">
																																									<select name="roomnew" class="form-control" required>
																																											<option value="" selected></option>
																																											<?php
																																																				$sql1 = "SELECT * FROM tbl_room WHERE r_status = '0' ORDER BY r_name ASC";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_array($result1)) { ?>
<option value="<?php echo $row1['r_name'] ?>"> ห้อง  <?php echo $row1['r_name'] ?></option>
<?php
}
																																																		 ?>
																																									</select>
																																							</div>
																																					</div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">หน่วยไฟฟ้าห้องใหม่
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="usageelec" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">หน่วยน้ำประปาห้องใหม่
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="usagewater" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">ค่าทำความสะอาด
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="clean" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">ค่าล้างแอร์
                                                                                    <span class="required"> * </span>
                                                                                </label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="air" required/>
                                                                                </div>
                                                                            </div>
																                <div class="form-group">
					                                                                    <label class="control-label col-md-3">อายุสัญญา
					                                                                        <span class="required"> * </span>
					                                                                    </label>
					                                                                    <div class="col-md-6">
					                                                                        <select class="form-control" name="select1" required>
					                                                                            <option value="" selected></option>
					                                                                            <option value="6">6 เดือน</option>
					                                                                            <option value="12">12 เดือน</option>
					                                                                            <option value="24">24 เดือน</option>
					                                                                            <option value="48">48 เดือน</option>
					                                                                        </select>
					                                                                    </div>
					                                                                </div>								
                                                                    </div>
                                                                </div>
                                                                    <div class="row">
                                                                        <div class="col-md-offset-6 col-md-12">
																																					<button type="submit" class="btn btn-circle green" onclick="return confirm('ต้องการดำเนินการเปลี่ยนหรือย้ายห้อง?');">Submit <i class="fa fa-check"></i></button>

                                                                        </div>
                                                                    </div>
                                                        </form>
                                                    </div>

																	</div>
														</div>
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
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
