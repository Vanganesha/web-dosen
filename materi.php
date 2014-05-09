<?php include 'koneksi.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'css.php';
        include 'lib/fungsi.php';
        include 'lib/library.php';?>
        <title>Materi Layout</title>
    </head>
    <body>    
        <?php include 'nav.php';?>
        <?php $gmat="SELECT a.idmateri AS imat, a.materi AS materi, c.nama AS dosen, a.judul AS judul, b.matkul AS matkul, a.tangglUpload AS tanggal FROM materi a LEFT JOIN matkul b ON a.idmatkul = b.idmatkul LEFT JOIN dosen c ON a.idDosen = c.idDosen";
              $exmat=mysql_query($gmat);
        ?>
                
        <div id="tam" style="box-shadow: 0px 0px 0px 0px;">
            <div class="container" id="putih" style="box-shadow: 0px 0px 3px; padding: 24px;">
            <div class="page-header">
                <h2 class="text-center">Materi Perkuliahan</h2>
            </div>
            <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control" type="text" name="filter" value="" id="filter" placeholder="Cari cepat e.g judul, matkul, dosen..." autocomplete="off"/></div><br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul Materi</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Tanggal Upload</th>
                            <th class=" text-center">Download</th></tr>
                    </thead>
                    
                   
                         <tbody>
                        <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                        <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[matkul];?></td>
                            <td><?php echo $fetmat[dosen];?></td>
                            <td><?php echo tgl_indo($fetmat[tanggal]) ;?></td>
                            <td class="text-center"><a class="btn btn-default" href="dokumen/<?php echo $fetmat[materi];?>"><span class="glyphicon glyphicon-download"></span> Download</a></td>
                        </tr>
                        <?php  } ?>
                    </tbody>
                   
                </table>
            </div>
        </div></div><br>
        
         <?php           include 'dosen/footer.php';           include 'dosen/js.php';?>
    </body></html>
