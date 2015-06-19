<?php error_reporting(0); session_start(); include 'koneksi.php'; include 'lib/fungsi.php'; include 'lib/library.php'; ?>
<?php 
        $id=$_GET[id];
		$sel_user="SELECT * FROM dosen WHERE iddosen='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);               
        $gmat="select a.idmateri as imat, a.tangglUpload as tanggal, a.judul as judul, a.materi as materi, b.matkul as matkul from materi a left join matkul b on a.idmatkul=b.idmatkul where idDosen='$id' order by a.tangglUpload DESC limit 5";
        $exmat=  mysql_query($gmat);                
        $gm="SELECT a.judul as judul, a.isi as isi, a.tangglUpload as tanggal, b.nama as dosen from pengumuman a left join dosen b on a.idDosen=b.idDosen where a.idDosen='$id' order by a.tangglUpload DESC limit 5";
        $exm=  mysql_query($gm);                
        ?>
<html>
    <head>
        <title>Profil <?php echo $fet[nama];?> || Website Dosen Teknik Informatika</title>
        <?php include 'css.php'; ?>
    </head>
    <body>
       <?php include 'nav.php';?>     
    <profil style='padding: 70px 0px'>
        <div class="container">
        <kiri>
            <div class="col-md-6" style="padding-top: 20px; width: 60%; height: 250px;">
                <div class="row">
                    <div class="img-circle">
                        <img class="img" src="gambar/<?php echo $fet[foto] ;?>" id="gambar-dosen" style="width: 240px;height: 250px;">
                        <div id="ssd" style="box-shadow: 0px 0px 1px 0px; height: 250px;">
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
                        
                        </div></div>
                </div>
            </div>
        </kiri>
        </div>
    </profil>
   
    <materi>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">5 Materi Terakhir dari <?php echo $fet[nama];?></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-condensed">
                        <thead><tr>
                                <th>Judul</th>
                                <th>Mata Kuliah</th>
                                <th>Tanggal Upload</th>
                                <th>Download</th></tr>
                        </thead>
                        <tbody>
                            <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                            <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[matkul];?></td>
                            <td><?php echo tgl_indo($fetmat[tanggal]);?></td>
                            <td><a class="btn btn-primary" href="dokumen/<?php echo $fetmat[materi];?>"><span class="glyphicon glyphicon-download"></span> Unduh</a></td></tr><?php } ?>
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
                    <h2 class="panel-title">5 Pengumuman Terakhir <?php echo $fet[nama];?></h2>
                </div>
                <div class="panel-body">
                    <?php while ($fetp=mysql_fetch_array($exm)){ ?>
                    <div class="shadow-wrapper">
                        <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
                        <b class="text-center"><?php echo $fetp[judul];?></b><br>
                        <p><?php echo $fetp[isi];?></p>
                        <p>Dibuat Tanggal : <?php echo tgl_indo($fetp[tanggal]);?></p>
                        </div></div>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
    </pengumuman>
    <?php include 'dosen/footer.php';?>
    </body>
</html>