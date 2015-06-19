<?php
error_reporting(0);
 session_start();  
include '../koneksi.php';
$uname=$_POST[username];
$pwd=$_POST[password];

$pk=  mysql_query("select * from admin where username='$uname'");
$ck= mysql_num_rows($pk);

if ($ck > 0){
$get=mysql_query("select * from admin where username='$uname' and password='$pwd'");
$ketemu=mysql_num_rows($get);
$r=mysql_fetch_array($get);

if ($ketemu > 0){
    $_SESSION[username]=$r[username];
    $_SESSION[password]=$r[password];
    $_SESSION[tipe]='Admin';
    echo "<script>alert('Anda berhasil login');
				window.location='index.php';
			</script>";

} else {
	echo "<script>alert('Password Salah!!  Ulangi lagi');
				window.location='index.php';
			</script>";
}}  else {
echo "<script>alert('Username salah.');
				window.location='index.php';
			</script>";    
}
    
   