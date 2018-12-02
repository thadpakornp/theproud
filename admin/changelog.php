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
        <meta charset="utf-8" />
        <title>Change log | THE PROUD RESIDENCE</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for custom bootstrap list elements to be used within any layout" name="description" />
        <meta content="" name="author" />
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
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
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
                                        <h1>Change log
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


                                            <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">21 July 2017</div>
                                                                    <h3 class="list-title">Updated 12</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple12" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">3</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple12">
                                                                    <ul>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    สามารถเปลี่ยนแปลงข้อมูลการทำสัญญา
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    สามารถเปลี่ยนแปลงข้อมูลผู้เช่าร่วม
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับปรุงข้อผิดพลาด
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">16 July 2017</div>
                                                                    <h3 class="list-title">Updated 11</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple11" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple11">
                                                                    <ul>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    สามารถเพิ่มคู่สัญญาได้
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ป้องกันการใช้เครื่องหมาย(-)ในเบอร์มือถือ
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">14 July 2017</div>
                                                                    <h3 class="list-title">Updated 10</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple10" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">7</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple10">
                                                                    <ul>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับเปลี่ยนระบบค้นหาให้ค้นหาได้ง่ายขึ้น
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับเปลี่ยนให้สามารถบันทึกน้ำไฟได้เท่ากับหน่วยเดิม
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                         <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    แก้ปัญหาสำเนาใบเสร็จรับเงินผิด
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                         <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    แก้ปัญหาสำเนาใบแจ้งค่าบริการผิด
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    แก้ไขปัญหาการเปิดใช้งานระบบอินเทอร์เน็ตไร้สาย
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    แก้ปัญหาการย้ายห้องผิดพลาด
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับปรุงและเพิ่มประสิทธิภาพ
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                             <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">12 July 2017</div>
                                                                    <h3 class="list-title">Updated 9</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple9" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">3</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple9">
                                                                    <ul>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    เปลี่ยนระบบการค้นหาให้ง่ายต่อการใช้งาน
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                         <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    แก้ไขสถานะสัญญา
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                         <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับปรุงและแก้ไขข้อผิดพลาดอื่นๆ
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">10 July 2017</div>
                                                                    <h3 class="list-title">Updated 8</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple8" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple8">
                                                                    <ul>
                                                                    <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    เปิดการใช้งานอินเทอร์เน็ตอัตโนมัติเมื่ออัปโหลดสัญญาสำเร็จ
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    เพิ่มวันใช้งานอินเทอร์เน็ตให้แก่สมาชิกโดยอัตโนมัติ
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                         <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">09 July 2017</div>
                                                                    <h3 class="list-title">Updated 7</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple7" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">1</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple7">
                                                                    <ul>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับปรุงการรับพ้อยของของสมาชิก
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                         <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">08 July 2017</div>
                                                                    <h3 class="list-title">Updated 6</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple6" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">4</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple6">
                                                                    <ul>
                                                                     <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับปรุง/แก้ไข ใบแจ้งค่าบริการ
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                         <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ปรับปรุง/แก้ไข ใบเสร็จรับเงิน
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                         <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    สามารถแก้ไขอุปกรณ์ที่ใช้ส่ง SMS
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    อัพเดตเพื่อปรับปรุงแก้ไขจุดบกพร่อง
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">24 May 2017</div>
                                                                    <h3 class="list-title">Updated 5</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple5" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">1</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple5">
                                                                    <ul>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    อัพเดตเพื่อปรับปรุงแก้ไขจุดบกพร่อง
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">30 Mar 2017</div>
                                                                    <h3 class="list-title">Updated 4</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple4" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">1</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple4">
                                                                    <ul>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    เพิ่มระบบแอดมินระดับสูงเพื่อใช้ในการจัดการ User
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">25 Mar 2017</div>
                                                                    <h3 class="list-title">Updated 3</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple3" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple3">
                                                                    <ul>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    แก้ปัญหาการอัพโหลดรูปภาพสัญญา
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                   เปลี่ยนการใช้งาน Google API Map เป็น Embed map Google
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">9 Mar 2017</div>
                                                                    <h3 class="list-title">Updated 2</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple2" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">1</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple2">
                                                                    <ul>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    เพิ่มความปลอดภัยด้วย Captcha
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-body">
                                                        <div class="mt-element-list">
                                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                                <div class="list-head-title-container">
                                                                    <div class="list-date">1 Mar 2017</div>
                                                                    <h3 class="list-title">Updated 1</h3>
                                                                </div>
                                                            </div>
                                                            <div class="mt-list-container list-simple ext-1 group">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple1" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase"> ดำเนินการสำเร็จ
                                                                        <span class="badge badge-default pull-right bg-white font-green bold">2</span>
                                                                    </div>
                                                                </a>
                                                                <div class="panel-collapse collapse" id="completed-simple1">
                                                                    <ul>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    อัพเดทหน้า index.php ให้สังเกตห้องง่ายขึ้น
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                        <li class="mt-list-item done">
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-check"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <h3 class="uppercase">
                                                                                    ลบการเพิ่มรูปห้องในหน้า process_setting.php
                                                                                </h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END : LISTS -->
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