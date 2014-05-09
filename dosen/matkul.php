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
                <title>Beranda || Website Dosen Teknik Informatika</title>
       <?php include 'css.php'; ?>
    </head>

    <body>
       <?php        include 'nav.php' ; include 'tombol.php'; ?>
        <div style="padding: 22px ;"></div>
        <div class="container" style="padding: 22px 15px 15px 15px; box-shadow: 0px 0px 5px 0px">
    <h1 class="text-center">Tambahkan Mata Kuliah ke Database</h1>
            <hr>
            
            <form class="form-control-static" action="ac-matkul.php" method="post" role="form">
                <div class="form-group">
                    <label for="Mata Kuliah">Nama Mata Kuliah:</label>
                    <input type="Text" name="matkul" placeholder="Nama Matakuliah" class="form-control">
                    </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambahkan</button><a class="btn btn-default" href="index.php">Kembali</a><br>
                     
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
                            </tr>
                        </thead>
                         
                        <tbody>
                          
                                <?php include '../koneksi.php';
                $sql=  mysql_query("Select * from matkul");
                while($data= mysql_fetch_array($sql)){ echo
                                 "<tr><td>$data[0]</td>
                                <td>$data[1]</td>
                            </tr>" ; } ?>
                        </tbody>
                    </table>
                </div></div><br>
                <?php include 'js.php'; ?>
        <?php include 'footer.php'; ?>
               
</body>
</html> <?php } ?>