<?php
 session_start();
 error_reporting(0);
include '../koneksi.php';
$id=$_GET[id];
if(empty($_FILES["foto"]["name"])) {
$nama= $_POST['nama'];
$nip= $_POST['nip'];
$jabatan= $_POST['jabatan'];
$alamat= $_POST['alamat'];
$hp= $_POST['hp'];
$email= $_POST['email'];
              
$simpan="update dosen set nama='$nama', nip='$nip', hp='$hp', alamat='$alamat', jabatan='$jabatan', email='$email' where idDosen='$id'";
$res=  mysql_query($simpan);
unset($_SESSION[nama]);
$_SESSION[nama]=$nama;
echo "<script>alert('Profil Anda Berhasil Diperbaharui');
				window.location='index.php';
			</script>";
    
}
 else {
$data = $_FILES['foto'];
$foto = $data['name'];
$tmp = $data['tmp_name'];
$nama= $_POST['nama'];
$nip= $_POST['nip'];
$jabatan= $_POST['jabatan'];
$alamat= $_POST['alamat'];
$hp= $_POST['hp'];
$email= $_POST['email'];

if(!ereg("image", $_FILES["foto"]["type"])) {
    echo "<script>alert('File harus berbentuk gambar.');
				window.location='profile.php?id=$id';
			</script>";
}

if(!empty($tmp)){
move_uploaded_file($tmp, '../gambar/'.$foto);}
                
$simpan="update dosen set foto='$foto', nama='$nama', nip='$nip', hp='$hp', alamat='$alamat', jabatan='$jabatan', email='$email' where idDosen='$id'";

$res=  mysql_query($simpan);
unset($_SESSION[nama]);
$_SESSION[nama]=$nama;
echo "<script>alert('Profil Anda Berhasil Diperbaharui');
				window.location='index.php';
			</script>";
    
}