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
       <?php include 'nav.php' ; include 'tombol.php'; ?>
       <?php 
                $id=$_SESSION[idDosen];
		$sel_user="SELECT * FROM dosen WHERE iddosen='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);
                
                $gmat="select a.idmateri as imat, a.judul as judul, b.matkul as matkul from materi a left join matkul b on a.idmatkul=b.idmatkul where idDosen='$id' limit 5";
                $exmat=  mysql_query($gmat);
                
                $gm="SELECT a.idpengumuman as ice, a.judul as judul, a.isi as isi, a.tangglUpload as tanggal, b.nama as dosen from pengumuman a left join dosen b on a.idDosen=b.idDosen where a.idDosen='$id' limit 5";
                $exm=  mysql_query($gm);
                ?>
                
       
    <profil>
        <div class="container">
        <kiri>
            <div class="col-md-6">
                <div class="row">
                    <div class="img-circle">
                        <img class="img-rounded" src="../gambar/<?php echo $fet[foto] ;?>" id="gambar-dosen">
                        <h1 id="nama-dosen"><?php echo $fet[nama] ;?></h1><hr>
                        <strong>NIP : <?php echo $fet[nip];?></strong><br>
                        <strong>Alamat : <?php echo $fet[alamat];?></strong><br>
                        <strong>Jabatan : <?php echo $fet[jabatan];?></strong><br>
                        <b>Email : <?php echo $fet[email];?></b><br>
                        <b>HP : <?php echo $fet[hp];?></b>
                        
                    </div>
                </div>
            </div>
        </kiri>
        </div>
    </profil>
    <hr>
    <materi>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">5 Materi Terakhir Anda</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed">
                        <thead><tr>
                                <th>Judul</th>
                                <th>Mata Kuliah</th>
                                <th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                            <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[matkul];?></td>
                            <td><a href="edmateri.php?imat=<?php echo $fetmat[imat];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>|<a href="javascript:if(confirm('Apakah Anda yakin untuk menghapus materi ini?')) {location.href='acmateri.php?id=<?php echo $fetmat[imat];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a></td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </materi>
    <hr>
    <pengumuman>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">5 Pengumuman Terakhir Anda</h2>
                </div>
                <div class="panel-body">
                     <?php while ($fetp=mysql_fetch_array($exm)){ ?>
                    <div class="well">
                        <b class="text-center"><?php echo $fetp['judul'];?></b><br>
                        <p><?php echo $fetp['isi'];?></p>
                        <a href="edpengumuman.php?ipeng=<?php echo $fetmat[ice];?>"> <span class="glyphicon glyphicon-edit"></span> Edit</a>|<a href="javascript:if(confirm('Apakah Anda yakin untuk menghapus penngumuman ini?')) {location.href='acpengumuman.php?id=<?php echo $fetmat[ice];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                    </div>
                     <?php } ?>
                    
            </div>
            </div></div>
    </pengumuman>
    
    <?php include 'js.php'; include 'footer.php'; ?>
    </body>
</html>



<?php }