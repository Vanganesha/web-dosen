<?php
error_reporting(0);
 session_start();  
include '../koneksi.php';
$uname=$_POST[username];
$pwd=$_POST[password];

$get=mysql_query("select * from admin where username='$uname' and password='$pwd'");
$ketemu=mysql_num_rows($get);
$r=mysql_fetch_array($get);

if ($ketemu > 0){
    $_SESSION[username]=$r[username];
    $_SESSION[password]=$r[password];
    $_SESSION[tipe]='Admin';
    
    header('location:index.php');

} else {
	include 'masuk.php';   
        	echo "<center><br>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>";
}
    
   