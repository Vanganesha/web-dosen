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
                <title>Edit Profil | Website Dosen Teknik Informatika</title>
       <?php include 'css.php'; ?>
    </head>

    <body>
       <?php        include 'nav.php' ; include 'tombol.php'; ?>
        <?php 
              $id=  $_SESSION[idDosen];
		$sel_user="SELECT * FROM dosen WHERE iddosen='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);
        ?>
        <div class="container" style="box-shadow: 0px 3px 1px; padding: 0px 20px 20px 20px; background: #fff;">
    <h1 class="text-center">Edit Profile Dosen</h1>
            <hr>
          
            <form class="form-control-static" enctype="multipart/form-data" action="ac-dosen.php?id=<?php echo $_SESSION[idDosen];?>" method="post">
                <div class="form-group">
                    <label for="Foto">Foto Dosen :</label>
                    <input type="file" name="foto">
                </div>
                
                <div class="form-group">
                    <label for="name">Nama :</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $fet['nama'];?>">
                </div>
                
                <div class="form-group">
                    <label for="nip">NIP :</label>
                    <input class="form-control" type="text" name="nip" value="<?php echo $fet['nip'];?>">
                </div>
                
                <div class="form-group">
                    <label for="jabatan">Jabatan :</label>
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $fet['jabatan'];?>">
                    <p class="label label-info"><small>E.x Jabatan : Tenaga Ahli, Lektor</small></p>
                </div>
                         
                <div class="form-group">
                    <label for="Alamat">Alamat :</label>
                    <textarea class="form-control" type="text" name="alamat" placeholder="Alamat Dosen"><?php echo $fet['alamat'];?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="nomor HP">Nomor HP :</label>
                    <input class="form-control" type="text" value="<?php echo $fet['hp'];?>" name="hp" placeholder="Nomor Handphone Dosen">
                </div>
                
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $fet['email'];?>" placeholder="email Dosen">
                </div>

                <div class="form-group">
                  
                        <button type="submit" class="btn btn-default center-block">Simpan</button>
         
                </div>
                
            </form></div>
        <?php include 'js.php'; include 'footer.php'; ?>
    </body>
</html> <?php }