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
    $pass1 = $_GET['p'];
    $name1 = $_GET['name'];
    $phone = $_GET['phone'];

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
        $result1531 = $link->query("UPDATE ac_day_regis SET pass = '".$pass1."' WHERE no = '".$row999['no']."'");
        $result1532 = $link->query("UPDATE radcheck SET Value = '".$pass1."' WHERE Attribute = 'User-Password' AND UserName = '".$row999['user']."'");
        $result153 = $link->query("UPDATE account SET status = '1',password = '".$pass1."' WHERE username = '".$row999['user']."'");
        if($result153 == 1){
            echo "<br>";
            echo "<center><font color=\"green\">เนื่องจากผู้ใช้งานนี้มีอยู่ในระบบแล้ว ระบบได้ทำการเปิดการใช้งานอินเทอร์เน็ตเรียบร้อยแล้ว สามารถปิดหน้านี้ได้</font></center>";                                        
         } else {
            echo "<br>";
            echo "<center><font color=\"red\">ระบบไม่สามารถเปิดการใช้งานอินเทอร์เน็ตได้</font></center>";
            exit();
        }
  } else {
    $result1 = $link->query("INSERT INTO ac_day_regis (name,sur,user,pass,day,exp,sim,die,price,download,upload,uses) VALUES ('".$name1."','".$user1."','".$user1."','".$pass1."','".$date_current."','".$adddate."','2','10','0','8192','4096','1')");
    if($result1 == 1){
        echo "<br>";
        echo "<center><font color=\"green\">เพิ่มข้อมูลผู้ใช้งานสำเร็จ</font></center>";
        $result000 = $link->query("SELECT * FROM all_id ORDER BY id DESC LIMIT 1");
        $row000 = mysql_fetch_array($result000);
        $idrow = $row000['id'] + 1;
         $result2 = $link->query("INSERT INTO all_id VALUES ('".$idrow."','".$user1."','72','2')");
         if($result2 == 1){
            echo "<br>";
            echo "<center><font color=\"green\">กำหนดกลุ่มการใช้งานสำเร็จ</font></center>";
            $result3 = $link->query("INSERT INTO radreply (UserName,Attribute,op,Value) VALUES ('".$user1."','Idle-Timeout',':=','600')");
           if($result3 == 1){
                echo "<br>";
                echo "<center><font color=\"green\">การกำหนดอายุการนิ่งสำเร็จ</font></center>";
                $result4 = $link->query("INSERT INTO radreply (UserName,Attribute,op,Value) VALUES ('".$user1."','WISPr-Bandwidth-Max-Down',':=','8192000')");
                if($result4 == 1){
                    echo "<br>";
                    echo "<center><font color=\"green\">กำหนดการดาวน์โหลดสำเร็จ</font></center>";
                    $result5 = $link->query("INSERT INTO radreply (UserName,Attribute,op,Value) VALUES ('".$user1."','WISPr-Bandwidth-Max-Up',':=','4096000')");
                    if($result5 == 1){
                        echo "<br>";
                        echo "<center><font color=\"green\">กำหนดการอัปโหลดสำเร็จ</font></center>";
                         $result6 = $link->query("INSERT INTO radreply (UserName,Attribute,op,Value) VALUES ('".$user1."','WISPr-Session-Terminate-Time',':=','c')");
                         if($result6 == 1){
                            echo "<br>";
                            echo "<center><font color=\"green\">การกำหนดคุณสมบัติสำเร็จ</font></center>";
                             $result7 = $link->query("INSERT INTO radreply (UserName,Attribute,op,Value) VALUES ('".$user1."','Acct-Interim-Interval',':=','60')");
                             if($result7 == 1){
                                 echo "<br>";
                                echo "<center><font color=\"green\">การกำหนดเวลาอยู่ในระบบสำเร็จ</font></center>";
                                $result8 = $link->query("INSERT INTO radreply (UserName,Attribute,op,Value) VALUES ('".$user1."','Mikrotik-Rate-Limit',':=','4096k/8192k')");
                                if($result8 == 1){
                                    echo "<br>";
                                    echo "<center><font color=\"green\">การกำหนดเรทการใช้งานสำเร็จ</font></center>";
                                    $result9 = $link->query("INSERT INTO radcheck (UserName,Attribute,op,Value) VALUES ('".$user1."','Expiration',':=','".$adddate."')");
                                    if($result9 == 1){
                                        echo "<br>";
                                        echo "<center><font color=\"green\">การกำหนดวันหมดอายุสำเร็จ</font></center>";
                                        $result10 = $link->query("INSERT INTO radcheck (UserName,Attribute,op,Value) VALUES ('".$user1."','Simultaneous-Use',':=','2')");
                                        if($result10 == 1){
                                            echo "<br>";
                                            echo "<center><font color=\"green\">การกำหนดจำนวนเครื่องสำเร็จ</font></center>";
                                            $result11 = $link->query("INSERT INTO radcheck (UserName,Attribute,op,Value) VALUES ('".$user1."','User-Password',':=','".$pass1."')");
                                            if($result11 == 1){
                                                $result12 = $link->query("INSERT INTO account VALUES ('".$user1."','".$pass1."','','','','".$phone."','clear','1','dayr','1','','admin')");
                                                if($result12 == 1){
                                                    echo "<br>";
                                                    echo "<center><font color=\"green\">การบันทึกข้อมูลสำเร็จ</font></center>";
                                                    echo "<br>";
                                                    echo "<center><font color=\"green\">เปิดการใช้งานอินเทอร์เน็ตสำเร็จ สามารถปิดหน้านี้ได้</font></center>";
                                                } 
                                            } else {
                                                echo "<br>";
                                                echo "<center><font color=\"red\">ไม่สามารถบันทึกข้อมูลได้</font></center>";
                                                exit();
                                            }
                                        } else {
                                            echo "<br>";
                                            echo "<center><font color=\"red\">การกำหนดจำนวนเครื่องไม่สำเร็จ</font></center>";
                                            exit();
                                        }
                                    } else {
                                        echo "<br>";
                                        echo "<center><font color=\"red\">การกำหนดหมดอายุไม่สำเร็จ</font></center>";
                                        exit();
                                    }
                                } else {
                                    echo "<br>";
                                echo "<center><font color=\"red\">ไม่สามารถกำหนดเรทการใช้งานได้</font></center>";
                                exit();
                                }
                             } else {
                                  echo "<br>";
                                echo "<center><font color=\"red\">ไม่สามารถกำหนดเวลาอยุ่ในระบบได้</font></center>";
                                exit();
                             }
                         } else {
                             echo "<br>";
                            echo "<center><font color=\"red\">ไม่สามารถกำหนดคุณสมบัติได้</font></center>";
                            exit();
                         }
                    } else {
                        echo "<br>";
                        echo "<center><font color=\"red\">ไม่สามารถกำหนดการอัปโหลดได้</font></center>";
                        exit();
                    }
                } else {
                    echo "<br>";
                    echo "<center><font color=\"red\">ไม่สามารถกำหนดการดาวน์โหลดได้</font></center>";
                    exit();
                }
            } else {
                echo "<br>";
                echo "<center><font color=\"red\">ไม่สามารถกำหนดอายุการนิ่งได้</font></center>";
                exit();
            }
         } else {
            echo "<br>";
            echo "<center><font color=\"red\">ไม่กำหนดกลุ่มการใช้งานได้</font></center>";
            exit();
         }
    } else {
        echo "<br>";
        echo "<center><font color=\"red\">ไม่สามารถเพิ่มข้อมูลผู้ใช้งานได้</font></center>";
        exit();
    }
    }
} else {
    echo "Can not connect to MySQL";
    exit();
}
?>
</body>
</html>