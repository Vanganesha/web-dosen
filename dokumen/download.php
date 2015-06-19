<?php
include '../koneksi.php';
session_start();
error_reporting(0);
echo "Tunggu.. Loading";
$lol=$_GET[idm];
$gmat="SELECT materi from materi where idmateri='$lol'";
$exmat=mysql_query($gmat);
$ko=mysql_fetch_array($exmat);
if($_GET[download]==idm){
$namafile=$ko[materi];
header("Location:$namafile");
} else {


$download_rate=40000;

$file = $ko[materi];
$nama = time().$file;
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$nama);
    header('Expires: 0');
    header('Cache-Control: private');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
	ob_clean();
    flush();
	 $xx = fopen($file, "r");
     while(!feof($xx))
     {
         // send the current file part to the browser
         print fread($xx, round($download_rate * 1024));
         // flush the content to the browser
         flush();
         // sleep one second
         sleep(1);
     }
     fclose($xx);
	header('Location:../materi.php');
    exit;
}
}
?>