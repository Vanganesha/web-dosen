<?php
error_reporting();
 session_start();  
include '../koneksi.php';

$uname=$_POST[username];
$pwd=$_POST[password];

$ak=  mysql_query("select * from dosen where status='Tidak Aktif' and username='$uname'");
$qak=  mysql_num_rows($ak);

if($qak > 0){
    
    echo "<script>alert('Akun Anda belum aktif, hubungi admin untuk mengaktifkan');
                    window.location='index.php';
</script>";}

else{
    
    $us=  mysql_query("select * from dosen where username='$uname'");
    $lk=mysql_num_rows($us);
    
    if($lk > 0){    
        $get=mysql_query("select * from dosen where username='$uname' and password='$pwd' and status='Aktif'");
        $ketemu=mysql_num_rows($get);
        $r=mysql_fetch_array($get);   
            if ($ketemu > 0){
                $_SESSION[idDosen]=$r[idDosen];
                $_SESSION[username]=$r[username];
                $_SESSION[password]=$r[password];
                $_SESSION[nama]=$r[nama];
                $_SESSION[tipe]='Dosen';
                echo "<script>alert('Anda berhasil login.');
                    window.location='index.php';
                    </script>";
                
            } else {    
                echo "<script>alert('Password Anda salah.');
                    window.location='index.php';
                    </script>";
                
     
            }            
            } else {               
                echo "<script>alert('Userame Anda Salah.');
                    window.location='index.php';
                    </script>";
} 
     
}