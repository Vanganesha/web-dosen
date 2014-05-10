<?php
error_reporting();
 session_start();  
include '../koneksi.php';
$uname=$_POST[username];
$pwd=$_POST[password];

$get=mysql_query("select * from dosen where username='$uname' and password='$pwd' and status='Aktif'");
$ketemu=mysql_num_rows($get);
$r=mysql_fetch_array($get);

if ($ketemu > 0){
    $_SESSION[idDosen]=$r[idDosen];
    $_SESSION[username]=$r[username];
    $_SESSION[password]=$r[password];
    $_SESSION[nama]=$r[nama];
    $_SESSION[tipe]='Dosen';
    
    header('location:index.php');

} else {
	include 'masuk.php';   
        	echo "<center><br>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau Akun anda belum diaktifkan, hubungi admin untuk mengaktifkan";
}
    
   