<?php
session_start();
error_reporting(0);
include '../koneksi.php';
$idp=$_GET['id'];

if($_REQUEST['do']=='tambah'){
    $judul=$_POST['judul'];
    $isi=$_POST['isi'];
    $dosen=$_SESSION['idDosen'];
    
    $simpan="insert into pengumuman(judul, isi, idDosen, tangglUpload) values('$judul','$isi','$dosen',curdate())";
    $res = mysql_query($simpan);
    echo "<script>alert('Data Pengumuman Berhasil Disimpan');
				window.location='pengumuman.php';
			</script>";
}

elseif($_REQUEST['act']=='edit'){
    $judul=$_POST['judul'];
    $isi=$_POST['isi'];
    $dosen=$_SESSION['idDosen'];
    
    $simpan="update pengumuman set judul='$judul', isi='$isi' where idDosen='$dosen' AND idpengumuman='$idp'";
    $res = mysql_query($simpan);
    echo "<script>alert('Data Pengumuman Berhasil Diubah');
				window.location='pengumuman.php';
			</script>";
}

elseif($_REQUEST['act']=='hapus')
	{
		$del="DELETE FROM pengumuman WHERE idpengumuman='$idp'";
		mysql_query($del) or mysql_error();
		echo "<script>alert('Data Pengumuman Berhasil Dihapus');
				window.location='pengumuman.php';
			</script>";
	}

 else {
            echo 'Salah link';
 }