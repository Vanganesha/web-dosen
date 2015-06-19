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
                <title>Materi | Website Dosen Teknik Informatika</title>
       <?php include 'css.php'; $id=$_SESSION['idDosen'];?>
    </head>

    <body>
       <?php        include 'nav.php'; include 'tombol.php';
       ?>
           <?php $gmat="SELECT a.idmateri as imat, a.judul AS judul, b.matkul AS matkul, a.tangglUpload AS tanggal FROM materi a LEFT JOIN matkul b ON a.idmatkul=b.idmatkul WHERE idDosen='$id' order by a.tangglUpload DESc";
                $exmat=  mysql_query($gmat);
                ?>
    <materi>
        <div class="container" style="box-shadow: 0px 1px 1px 0px; padding: 43px 30px 0px; background: #fff;">
            <div class="materi">
                <form class="form-inline">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control" type="text" name="filter" value="" id="filter" placeholder="Cari cepat e.g judul, matkul, dosen..." autocomplete="off"/></div><br>
                        <div id="tombol-materi" style="padding: 2px 0px 52px 22px;">
                            <a class="btn btn-default navbar-right" href="tmateri.php">Tambahkan Materi</a></div>
                 <table class="table table-bordered" id="tabel-materi">
                    <thead>
                        <tr>
                            <th class="sortable">Judul Materi</th>
                            <th>Mata Kuliah</th>
                            <th>Tanggal Upload</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                        <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[matkul];?></td>
                            <td><?php echo tgl_indo($fetmat[tanggal]) ;?></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="edmateri.php?imat=<?php echo base64_encode($fetmat[imat]);?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a class="btn btn-danger btn-sm" href="javascript:if(confirm('Apakah Anda yakin untuk menghapus materi ini?')) {location.href='acmateri.php?id=<?php echo $fetmat[imat];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
                        </tr>
                        <?php  } ?>
                    </tbody>
                 </table></form>
            </div>
        </div>
    </materi><br>
    <?php include 'js.php'; ?>
        <?php include 'footer.php'; ?>
 
        
    </body>
</html>
<?php } ?>