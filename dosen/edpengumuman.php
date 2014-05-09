<?php include '../koneksi.php';

session_start();
error_reporting(0);

if($_SESSION[tipe]=='Admin'){
    session_destroy();
    echo "Silahkan login menggunakan akun dosen,<a href='masuk.php'> klik disini</a> untuk login ke Akun Dosen"; 
}
 elseif ($_SESSION[tipe]=='') {
    session_destroy();
    header('location:masuk.php');
}
elseif(empty($_SESSION[username]) AND empty($_SESSION[password])){ 
    include 'masuk.php';
}
else{
?>
<html>
    <head>
                <title>Website Dosen Teknik Informatika</title>
       <?php include 'css.php'; ?>
    </head>

    <body>
       <?php        include 'nav.php';
        include 'tombol.php';?>
        <?php 
        $idm=$_GET[ipeng];
        $dos=$_SESSION['idDosen'];
        
        $kueri="select judul, isi from pengumuman where idpengumuman='$idm'";
        $exe=  mysql_query($kueri);
        $fd=mysql_fetch_array($exe);
        ?>
        
    <materi>
        <div class="container">
            <div id="tam">
                <div style="padding-top: 2px;"><h2 class="text-center">Edit Pengumuman</h2></div>
                
                <form class="form-horizontal" method="post" action="acpengumuman.php?id=<?php echo $idm ;?>&act=edit">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="judul">Judul Pengumuman</label>
                    <div class="col-sm-6">
                        <input class="form-control" value="<?php echo $fd['judul'];?>" id="judul" name="judul"> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="isi">Isi Pengumuman</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="isi" placeholder="Isi Pengumuman"><?php echo $fd[isi];?></textarea>
                    </div>
                </div>
                               
                <div class="form-group">
                  
                        <button type="submit" class="btn btn-default center-block">Simpan</button>
         
                </div>
                
            </form>   
            </div></div>
    </materi><br>
        <?php include 'js.php'; include 'footer.php'; ?>
 
        
    </body>
</html>
<?php } ?>