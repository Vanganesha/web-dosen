<?php  
include '../koneksi.php';
 include '../lib/fungsi.php';
 include '../lib/library.php';
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
       <?php include 'css.php'; $id=$_SESSION['idDosen'];?>
    </head>

    <body>
       <?php        include 'nav.php';
        include 'tombol.php';?>
        <?php $gmat="SELECT a.idpengumuman as ice, a.judul as judul, a.isi as isi, a.tangglUpload as tanggal, b.nama as dosen from pengumuman a left join dosen b on a.idDosen=b.idDosen where a.idDosen='$id'";
                $exmat=  mysql_query($gmat);
                ?>
        
    <materi>
        <div class="container">
            <div class="materi">
                <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control" type="text" name="filter" value="" id="filter" placeholder="Cari cepat e.g judul, matkul, dosen..." autocomplete="off"/></div><br>
                        <div id="tombol-materi" style="padding: 2px 0px 52px 22px;"><a class="btn btn-default navbar-right" href="tpengumuman.php">Tambahkan Pengumuman</a></div>
             
                <table class="table table-bordered" id="tabel-materi">
                    <thead>
                        <tr>
                            <th>Judul Pengumuman</th>
                            <th>Isi Pengumuman</th>
                            <th>Tanggal Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                        <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[isi];?></td>
                            <td><?php echo tgl_indo($fetmat[tanggal]) ;?></td>
                            <td><a href="edpengumuman.php?ipeng=<?php echo $fetmat[ice];?>"> <span class="glyphicon glyphicon-edit"></span> Edit</a>|<a href="javascript:if(confirm('Apakah Anda yakin untuk menghapus penngumuman ini?')) {location.href='acpengumuman.php?id=<?php echo $fetmat[ice];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
                        </tr>
                        <?php  } ?>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </materi>
 
        <?php include 'js.php'; include 'footer.php'; ?>
    </body>
</html>
<?php } ?>