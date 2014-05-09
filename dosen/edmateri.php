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
        $idm=$_GET[imat];
        
        $kueri="select judul, idmatkul, materi from materi where idmateri='$idm'";
        $exe=  mysql_query($kueri);
        $fd=  mysql_fetch_array($exe);
        ?>
    <materi>
        <div class="container">
            <div id="tam">
                <div style="padding-top: 2px;"><h2 class="text-center">Tambahkan Materi</h2></div>
                
                <form class="form-horizontal" method="post" role="form" action="acmateri.php?id=<?php echo $idm;?>&act=edit" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="judul">Judul Materi</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $fd[judul];?>" class="form-control" id="judul" name="judul"> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="matkul">Mata Kuliah</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="matkul">
                            <option value="<?php echo $fd[matkul];?>">Pilih Salah satu matakuliah</option>
                            <?php 
						$gmatkul="SELECT * FROM matkul ORDER BY matkul";
						$fets=mysql_query($gmatkul);
						while($fet=mysql_fetch_array($fets))
						{ 
						?>
          <option value="<?php echo $fet[idmatkul];?>"><?php echo $fet[matkul];?></option>
          <?php
						}
					 ?>
        </select> 
                    </div>
                </div>
                

                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="materi">File Materi</label>
                    <input class="col-sm-6" value="<?php echo $fd[materi];?>" type="file" name="materi">
                </div>
                
                <div class="form-group">
                  
                        <button type="submit" class="btn btn-default center-block">Simpan</button>
         
                </div>
                
            </form>   
            </div></div>
    </materi>
 <?php include 'js.php'; include 'footer.php'; ?>
        
    </body>
</html>
<?php } ?>