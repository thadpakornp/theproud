<!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a href="index.php">
                                        <p class="logo-default">
                                            <h4><strong>THE PROUD RESIDENCE</strong></h4>
                                        </p>
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">

                                        <li class="droddown dropdown-separator">
                                            <span class="separator"></span>
                                        </li>
                                        <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <span class="username username-hide-mobile">[เข้าใช้งานล่าสุด: <?php echo $_SESSION['login'] ?>
                                            ] <?php echo $_SESSION['firstname'] ?>  <?php echo $_SESSION['lastname'] ?></span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="profile.php">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="logout.php?id=<?php echo $_SESSION['id'] ?>">
                                                        <i class="icon-key"></i> Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="index.php"> สถานะห้องพัก
                                        <span class="arrow"></span>
                                    </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                            <a href="javascript:;"> เลือกรายการ
                                        <span class="arrow"></span>
                                    </a>
                                            <ul class="dropdown-menu" style="min-width: ">
                                                <li>
                                                    <div class="mega-menu-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>
                                                                        <h3>การทำสัญญา</h3>
                                                                    </li>
                                                                    <li>
                                                                        <a href="contract_have_reserve.php">
                                                                    ผู้เช่ามีหมายเลขการจอง </a>
                                                                    </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>
                                                                        <h3>ค้นหา</h3>
                                                                    </li>
                                                                    <li>
                                                                        <a href="search_bill.php"> ใบแจ้งค่าใช้บริการ </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="search_receipt.php"> ใบเสร็จรับเงิน </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="search_contract.php"> ข้อมูลสัญญา </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="search_reserve.php"> ข้อมูลการจอง </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="search_customer.php"> ประวัติผู้เช่า </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>
                                                                        <h3>รายงาน</h3>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_checkin.php"> ระเบียนผู้เข้าพัก </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_fingerprint.php"> ทะเบียนลายนิ้วมือ </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_bike.php"> ทะเบียนยานพาหนะ </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_checkout.php"> ผู้ออกจากหอพัก </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_change.php"> ผู้ย้ายห้องพัก </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_month.php"> รายรับประจำเดือน</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="report_year.php"> รายรับประจำปี </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>
                                                                        <h3>การทำรายการ</h3>
                                                                    </li>
                                                                    <li>
                                                                        <a href="process_usage.php"> บันทึกค่าใช้จ่าย </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="process_checkbill.php"> ชำระค่าบริการ </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="process_cancel_contract.php"> บอกเลิกสัญญา </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="process_move_room.php"> เปลี่ยน/ย้าย ห้อง </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="setting_system.php"> ตั้งค่าระบบ </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                </ul>
                                        </li>
                                        </ul>
                                </div>
                                <!-- END MEGA MENU -->
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->