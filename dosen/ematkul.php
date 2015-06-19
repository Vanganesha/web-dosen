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
                <title>Mata Kuliah | Website Dosen Teknik Informatika</title>
       <?php include 'css.php'; ?>
    </head>

    <body>
       <?php 
       include '../koneksi.php';
       $id=$_GET[imat];
       $matkul=  mysql_query("select * from matkul where idmatkul='$id'");
       $kuk=  mysql_fetch_array($matkul);
       include 'nav.php' ; include 'tombol.php'; ?>
        
        <div class="container" style="padding: 22px 15px 15px 15px; box-shadow: 0px 1px 1px 0px; background: #fff;">
    <h1 class="text-center">Ubah Nama Mata Kuliah</h1>
            <hr>
            
            <form class="form-control-static" action="ac-matkul.php?act=edit&imat=<?php echo $kuk[idmatkul];?>" method="post" role="form">
                <div class="form-group">
                    <label for="Mata Kuliah">Nama Mata Kuliah:</label>
                    <input value="<?php echo $kuk[matkul];?>" type="Text" required name="matkul" placeholder="Nama Matakuliah" class="form-control">
                    </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button> <br>
                     
                </div></form>
                
                <hr>
                <h2 class="text-center"> Mata Kuliah Yang di Database</h2>
                <hr>
                <div  style=" box-shadow: 0px 0px 10px 1px #ccc">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         
                        <tbody>
                          
                                <?php include '../koneksi.php';
                $sql=  mysql_query("Select * from matkul");
                $no=1;
                while($data= mysql_fetch_array($sql)){ ?>
                                 <tr><td><?php echo $no ?></td>
                                     <td><?php echo $data[1] ?></td>
                                    <td><a class="btn btn-primary btn-sm" href="ematkul.php?imat=<?php echo $data[idmatkul];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a class="btn btn-danger btn-sm" href="javascript:if(confirm('Apakah Anda yakin untuk menghapus mata kuliah ini?')) {location.href='ac-matkul.php?id=<?php echo $data[idmatkul];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
                            </tr> <?php $no++; } ?>
                        </tbody>
                    </table>
                </div></div><br>
                <?php include 'js.php'; ?>
        <?php include 'footer.php'; ?>
               
</body>
</html> <?php } ?>