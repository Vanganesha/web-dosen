<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'css.php';?>
        <title>Materi Layout</title>
    </head>
    <body>    
<?php include 'koneksi.php'; include 'lib/fungsi.php'; include 'lib/library.php'; include 'nav.php'?>;
<?php $gm="SELECT a.judul as judul, a.isi as isi, a.tangglUpload as tanggal, b.nama as dosen from pengumuman a left join dosen b on a.idDosen=b.idDosen order by a.tangglUpload DESC limit 5";
      $exm=  mysql_query($gm); ?>
<div id="tam" style="box-shadow: 0px 0px 0px 0px;">
    <div class="container" id="putih" style="box-shadow: 0px 0px 3px;">
            <div class="page-header">
                <h2 class="text-center">PENGUMUMAN</h2>
            </div>
            
            <?php while ($fetp=mysql_fetch_array($exm)){ ?>
            <div class="well">
                <h4 class="text-center"><b><?php echo $fetp['judul'];?></b></h4>
                <p class="text-center" style="font-size: 20px;"><?php echo $fetp['isi'];?></p>
                <p >oleh : <i><?php echo $fetp['dosen'];?></i>   yang dibuat pada tanggal : <?php echo tgl_indo($fetp['tanggal']);?></p>
            </div>
            <?php } ?>
        </div></div><br>
         <?php           include 'dosen/footer.php';           include 'dosen/js.php';?>
    </body></html>