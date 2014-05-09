<?php

include '../koneksi.php';

$matkul=$_POST['matkul'];

$simpan="insert into matkul(matkul) values('$matkul')";

$res = mysql_query($simpan);
header('location: matkul.php');
