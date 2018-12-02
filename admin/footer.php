               <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <div class="page-footer">
                        <div class="container"> 
                        <div class="row">
                            <div class="col-md-10">
                                 2017 &copy;THE PROUD RESIDENCE
                            </div>
                                 <div class="col-md-2">
                                 <?php //ส่วนนี้เอาไว้ส่วนที่เราจะให้แสดง

$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = number_format(($endtime - $starttime),2);
echo "หน้านี้ประมวลผล ".$totaltime." วินาที";

?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>