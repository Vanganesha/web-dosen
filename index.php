<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'css.php'; ?>
        <title>Home Layout</title>
    </head>
    <body>    
       <?php include 'nav.php'; ?>
        <div class='container' style="padding: 70px 0px;">
            <div class='row'>
          <?php
            include 'koneksi.php';
            $gdosen=  mysql_query("select iddosen, foto, nama from dosen where status='Aktif'");
            while ($hgdosen = mysql_fetch_array($gdosen)) {
               $dosen=$hgdosen[0];
               $fto=$hgdosen[foto];
               $nma=$hgdosen[2];
               ?>
                <div class='col-sm-6 col-md-3' style="padding-top: 20px;">
                            <div class="picture">
                                <a href='dosen.php?id=<?php echo $dosen;?>'><img src='gambar/<?php echo $fto;?>'  style='height: 180px; width: 100%; display: block;'></a>
                             <div class="item-description" style="text-align: center;">
                                 <a href='dosen.php?id=<?php echo $dosen;?>' style="text-align: center;" class='btn btn-default'><?php echo $nma; ?> </a>
                             </div></div></div>
            <?php  } ?> </div></div>
       
       <?php           include 'dosen/footer.php';           include 'dosen/js.php';?>
    </body>
</html>