<?php include '../koneksi.php'; include 'logic.php';

session_start();
error_reporting(0);
$nama=$_SESSION[username];
$kul=mysql_query("select * from admin where username='$nama'");
$ddd=mysql_fetch_array($kul);
//Edit admin
if($_GET[act]=='edit'){
    $nama=$_SESSION[username];
    $uname=$_POST[username];
    $pass=$_POST[password];
    
  
        mysql_query("update admin set username='$uname', password='$pass' where username='$nama'");    
        echo "<script>alert('Akun dengan username $nama berhasil diubah menjadi $uname');
                    window.location='admin.php';</script>";
    }

if($_SESSION[tipe]=='Dosen'){
    session_destroy();
     include 'masuk.php';
    echo "<br><center>Silahkan login menggunakan akun Admin,<a href='masuk.php'> klik disini</a> untuk login ke Akun Admin"; 
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
                <title>Kelola Admin || Website Dosen Teknik Informatika</title>
       <?php include 'css.php'; ?>
    </head>

    <body>
    <?php include 'nav.php'; ?>
         <div class="container">
             <div class="row">
                 <h2 class="text-center">Kelola Admin</h2><hr>
             </div>
             <div id="kolom2" class="col-lg-6" style="width: 550px;">
                 <div class="col-lg-8" style="padding: 20px 10px 35px 41px">
                 <form class="form-horizontal" method="post" action="eadmin.php?act=edit">
                     <div class="form-group">
                         <label for="username">Username</label>
                         <input value="<?php echo $ddd[username]?>" class="form-control" type="text" name="username" required >
                     </div>
                     <div class="form-group">
                         <label for="password">Password</label>
                         <input value="<?php echo $ddd[password]?>" type="text" class="form-control" name="password" required>
                     </div>
                     <button type="submit" class="btn btn-default col-lg-4 col-lg-offset-3">Simpan</button>
                    </form>
             </div></div>
             
             <div id="kolom2" class="col-lg-6" style="margin-left: 20px;">
                  <div class="row">
                 <h2 class="text-center">Registered Admin</h2><hr>
             </div>
                 
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Username</th>
                             <th>Password</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                         $getadmin=  mysql_query("select * from admin");
                         $no=1;
                         while ($data=  mysql_fetch_array($getadmin)){
                         ?>
                         <tr>
                             <td><?php echo $no ?></td>
                             <td><?php echo $data[username]?></td>
                             <td><?php echo base64_encode($data[password])?></td>
                         </tr>
                         <?php $no++; } ?>
                     </tbody>
                 </table>
                 
                 <div class="row">
                 <h2 class="text-center">Akun Anda</h2><hr>
             </div>
                 
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Username</th>
                             <th>Password</th>
                             <th class="text-center">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                         $name=$_SESSION[username];
                         $getadmin=  mysql_query("select * from admin where username='$name'");

                         while ($data=  mysql_fetch_array($getadmin)){
                         ?>
                         <tr>
                             <td><?php echo $data[username]?></td>
                             <td><?php echo $data[password]?></td>
                             <td class="text-center"><a href="admin.php?act=edit" class="btn btn-primary"><span class="fa fa-edit">Edit</span></a></td>
                         </tr>
                         <?php } ?>
                     </tbody>
                 </table>
                 
             </div>
         </div><?php include 'footer.php';?>
    </body>
</html>



            <?php }