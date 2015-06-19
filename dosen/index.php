<?php 
error_reporting(0);
include '../koneksi.php';

session_start();


if($_SESSION[tipe]=='Admin'){
    session_destroy();
     include 'masuk.php';
    echo "<br><center>Silahkan login menggunakan akun dosen,<a href='masuk.php'> klik disini</a> untuk login ke Akun Dosen"; 
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
     <?php 
                $id=$_SESSION[idDosen];
		$sel_user="SELECT * FROM dosen WHERE iddosen='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);
                
                $gmat="select a.idmateri as imat, a.judul as judul, b.matkul as matkul from materi a left join matkul b on a.idmatkul=b.idmatkul where idDosen='$id' order by a.tangglUpload desc limit 5";
                $exmat=  mysql_query($gmat);
				$sak=  mysql_num_rows($exmat);
                
                $gm="SELECT a.idpengumuman as ice, a.judul as judul, a.isi as isi, a.tangglUpload as tanggal, b.nama as dosen from pengumuman a left join dosen b on a.idDosen=b.idDosen where a.idDosen='$id' order by a.tangglUpload desc limit 5";
                $exm=  mysql_query($gm);
				$bak=  mysql_num_rows($exm);
                ?>
    <head>
        <title>Beranda <?php echo $fet[nama] ;?> | Website Dosen Teknik Informatika</title>
        <?php include 'css.php'; ?>
    </head>

    <body>
       <?php include 'nav.php' ; include 'tombol.php'; ?>
      
                
       
    <profil>
        <div class="container">
        <kiri>
            <div class="col-md-6" style="padding-top: 20px;width: 60%;">
                <div class="row" >
                    <div class="img-circle">
                        <img class="img-img" src="../gambar/<?php echo $fet[foto] ;?>" id="gambar-dosen"style="width: 240px;height: 194px;" >
                        <div id="ssd" style="box-shadow: 0px 0px 1px 0px;">
                        <h1 id="nama-dosen"><?php echo $fet[nama] ;?></h1><hr>
                        <table>
                            <tbody>
                                <tr>
                                    <td ><span class="fa fa-user-md"></span></td>
                                    <td style="padding-left: 2;"><b> NIP </b> </td>
                                    <td style="padding-left: 2;"> :</td>
                                    <td style="padding-left: 5;"> <?php echo " $fet[nip]";?></td>
                                </tr>
                                
                                <tr>
                                    <td ><span class="fa fa-map-marker"></span></td>
                                    <td style="padding-left: 2;"><b> Alamat</b> </td>
                                    <td style="padding-left: 2;"> :</td>
                                    <td style="padding-left: 5;"><?php echo $fet[alamat];?></td>
                                </tr>
                                
                                <tr>
                                    <td ><span class="fa fa-briefcase"></span></td>
                                    <td style="padding-left: 2;"><b> Pangkat </b> </td>
                                    <td style="padding-left: 2;"> :</td>
                                    <td style="padding-left: 5;"> <?php echo $fet[jabatan];?></td>
                                </tr>
                                
                                <tr>
                                    <td><span class="fa fa-envelope"></span></td>
                                    <td style="padding-left: 2;"><b> Email </b> </td>
                                    <td style="padding-left: 2;"> :</td>
                                    <td style="padding-left: 5;"> <?php echo $fet[email];?></td>
                                </tr>
                                
                                <tr>
                                    <td><span class="fa fa-mobile-phone"></span></td>
                                    <td style="padding-left: 2;"><b> HP </b> </td>
                                    <td style="padding-left: 2;"> : </td>
                                    <td style="padding-left: 5;"> <?php echo $fet[hp];?></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        </div>
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
                    <h2 class="panel-title"><?php if ($sak > 0 ){ echo "$sak Materi Terakhir Anda";} else { echo "Anda tidak mempunyai materi";}?> </h2>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed">
                        <thead><tr>
                                <th>Judul</th>
                                <th>Mata Kuliah</th>
                                <th class="text-center">Aksi</th></tr>
                        </thead>
                        <tbody>
                            <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                            <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[matkul];?></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="edmateri.php?imat=<?php echo base64_encode($fetmat[imat]);?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a class="btn btn-danger btn-sm" href="javascript:if(confirm('Apakah Anda yakin untuk menghapus materi ini?')) {location.href='acmateri.php?id=<?php echo $fetmat[imat];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a></td></tr><?php } ?>
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
                    <h2 class="panel-title"><?php if ($bak > 0 ){ echo "$bak Pengumuman Terakhir Anda";} else { echo "Anda tidak mempunyai pengumuman";}?> </h2>
                </div>
                <div class="panel-body">
                     <?php while ($fetp=mysql_fetch_array($exm)){ ?>
                    <div class="well">
                        <b class="text-center"><?php echo $fetp['judul'];?></b><br>
                        <p><?php echo $fetp['isi'];?></p>
                        <a class="btn btn-sm btn-primary" href="edpengumuman.php?ipeng=<?php echo $fetp[ice];?>"> <span class="glyphicon glyphicon-edit"></span> Edit</a> <a class="btn btn-sm btn-danger" href="javascript:if(confirm('Apakah Anda yakin untuk menghapus penngumuman ini?')) {location.href='acpengumuman.php?id=<?php echo $fetp[ice];?>&act=hapus'}; "><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                    </div>
                     <?php } ?>
                    
            </div>
            </div></div>
    </pengumuman>
    
    <?php  include 'footer.php'; ?>
    </body>
</html>



<?php }