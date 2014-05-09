<?php
 
include '../koneksi.php';
$id=$_GET[id];
if (empty($_FILES["foto"]["name"])) {
    die("tidak bisa mengupload");
}

$data = $_FILES['foto'];
$foto = $data['name'];
$tmp = $data['tmp_name'];
$nama= $_POST['nama'];
$nip= $_POST['nip'];
$jabatan= $_POST['jabatan'];
$alamat= $_POST['alamat'];
$hp= $_POST['hp'];
$email= $_POST['email'];

if (!ereg("image", $_FILES["foto"]["type"])) {
    die("Foto harus berbentuk gambar");
}

if (!empty($tmp)){
move_uploaded_file($tmp, '../gambar/'.$foto);}
                
$simpan="update dosen set foto='$foto', nama='$nama', nip='$nip', hp='$hp', alamat='$alamat', jabatan='$jabatan', email='$email' where idDosen='$id'";

$res=  mysql_query($simpan);
header('location: index.php');
