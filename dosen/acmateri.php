<?php
session_start();
error_reporting(0);
include '../koneksi.php';
$id=$_GET[id];

if(isset($_REQUEST['id']) && $_REQUEST['act']=='edit'){
    if (empty($_FILES["materi"]["name"])) {
        $judul= $_POST['judul'];
        $matkul= $_POST['matkul'];
        $iddosen= $_SESSION['idDosen'];
        $simpan="update materi set judul='$judul', idmatkul='$matkul' where idmateri='$id' and idDosen='$iddosen'";
        $res=  mysql_query($simpan);
        header('location: index.php');
        
    } else {
        $data = $_FILES['materi'];
        $materi= $data['name'];
        $tmp = $data['tmp_name'];
        $judul= $_POST['judul'];
        $matkul= $_POST['matkul'];
        $iddosen= $_SESSION['idDosen'];
        
        if (!empty($tmp)){
            move_uploaded_file($tmp, '../dokumen/'.$materi);
            
        }
        $simpan="update materi set materi='$materi', judul='$judul', idmatkul='$matkul' where idmateri='$id' and idDosen='$iddosen'";
        $res=  mysql_query($simpan);
        header('location: index.php');    
        }
}

elseif(isset($_REQUEST['do']) && $_REQUEST['do']=='tambah'){
    if (empty($_FILES["materi"]["name"])) {
    die("tidak bisa mengupload");
    
    }
    $data = $_FILES[materi];
    $materi= $data[name];
    $tmp = $data[tmp_name];
    $judul= $_POST[judul];
    $matkul= $_POST[matkul];
    $iddosen= $_SESSION[idDosen];
    
    if (!empty($tmp)){
        move_uploaded_file($tmp, '../dokumen/'.$materi);
    }
    
    $simpans="insert into materi(materi,judul,idmatkul,idDosen,tangglUpload) values('$materi','$judul','$matkul','$iddosen',Curdate())";
    $res=  mysql_query($simpans);
    header('location: index.php'); 
    }

elseif($_REQUEST['act']=='hapus')
	{
		$del="DELETE FROM materi WHERE idmateri='$id'";
		mysql_query($del) or mysql_error();
		$msg="<strong>Materi Berhasil dihapus</strong>";
                header('location: materi.php');
	}

 else {
            echo 'Salah link';
 }