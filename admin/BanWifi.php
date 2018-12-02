<!DOCTYPE>
<HTML>
<HEAD>
<meta charset="utf-8" />
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="thadpakorn" >
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
</HEAD>
<BODY>
<?php
date_default_timezone_set("Asia/Bangkok");
class mysqldb {
			var $link;
			var $result;
		function connect($config) {
			$this->link = mysql_connect($config['hostname'], $config['username'], $config['password']);
			if($this->link) {
				mysql_query("SET NAMES 'utf-8'");
				return true;
			}
			$this->show_error(mysql_error($this->link), "connect()");
			return false;
		}
		function selectdb($database) {
			if($this->link) {
				mysql_select_db($database, $this->link);
				return true;
			}
			$this->show_error("Not connect the database before", "selectdb($database)");
			return false;
		}
		function query($sql) {
			$this->result = mysql_query($sql);
			return $this->result;
		}
		function getnext() {
			return mysql_fetch_object($this->result);
		}
		function num_rows() {
			return mysql_num_rows($this->result); 
		}
		function show_error($errmsg, $func) {
			echo "<b><font color=red>" . $func . "</font></b> : " . $errmsg . "<BR>\n";
			exit(1);
		} 
	}
$_config['database']['hostname'] = "localhost";
$_config['database']['username'] = "root";
$_config['database']['password'] = "160930cm";
$_config['database']['database'] = "wifi_db";
	
# connect the database server
$link = new mysqldb();
$link->connect($_config['database']);
$link->selectdb($_config['database']['database']);
$link->query("SET NAMES 'utf8'");

if($link){
    $user1 = $_GET['id'];

    $adddate = "05 ".date('M Y',strtotime('+1 month'))." 23:59:59"; //วันหมดอายุ
    $adddate1 = "05-".date('m-Y',strtotime('+1 month')); //จำนวนวันที่เพิ่มเข้าไป
    // Variables Date
    $expire_date = $adddate1;
    $today_date = date("d-m-Y");
    /* Expire Date */
    $expire_explode = explode("-", $expire_date);
    $expire_day = $expire_explode[0];
    $expire_month = $expire_explode[1];
    $expire_year = $expire_explode[2];

    /* Today Date */
    $today_explode = explode("-", $today_date);
    $today_day = $today_explode[0];
    $today_month = $today_explode[1];
    $today_year = $today_explode[2];

    $expire = gregoriantojd($expire_month,$expire_day,$expire_year);
    $today = gregoriantojd($today_month,$today_day,$today_year);
    $date_current = $expire-$today; //หาวันที่ยังเหลืออยู่

    $result9999 = $link->query("SELECT * FROM ac_day_regis WHERE sur = '".$user1."'");
    $row999 = mysql_fetch_array($result9999);
     if(mysql_num_rows($result9999) == 1){
        $result153 = $link->query("UPDATE account SET status = '0' WHERE username = '".$row999['user']."'");
        if($result153 == 1){
            echo "<br>";
            echo "<center><font color=\"green\">ระบบได้ทำการระบบการให้บริการอินเทอร์เน็ตเรียบร้อยแล้ว</font></center>";                                        
         } else {
            echo "<br>";
            echo "<center><font color=\"red\">ระบบไม่สามารถระงับการใช้งานอินเทอร์เน็ตได้</font></center>";
            exit();
        }
     }
}
?>
</body>
</html>