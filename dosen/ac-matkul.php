<?php

include '../koneksi.php';
$id=$_GET[imat];

if($_GET[act]=='tambah'){
$matkul=$_POST['matkul'];

$simpan="insert into matkul(matkul) values('$matkul')";

$res = mysql_query($simpan);
echo "<script>alert('Mata Kuliah $matkul berhasil ditambahkan.');
				window.location='matkul.php';
			</script>";
}

elseif ($_GET[imat] && $_GET[act]=='edit') {
$matkul=$_POST['matkul'];

$simpan="update matkul set matkul='$matkul' where idmatkul='$id'";

$res = mysql_query($simpan);
echo "<script>alert('Nama mata kuliah berhasil diubah menjadi $matkul');
				window.location='matkul.php';
			</script>";
}
