<?php 
error_reporting(0);
session_start();
    /*
     * FILE   : Pengumuman.php
     * Author : Van Ray Hosea
     * FOR    : Program Profesional 2014
     */

     //Pengaturan Pembuatan Halaman
    include 'koneksi.php';
    error_reporting(E_ERROR);
    $line = 0;
    $page = 'pengumuman.php';
    $dataperpage = mysql_query("SELECT * FROM pengumuman");
    $numpage = mysql_num_rows($dataperpage);
    $start = $_GET['start'];
    $eu = $start - 0;
    $limit = 5;
    $thisp= $eu + $limit;
    $back = $eu - $limit;
    $next = $eu + $limit;
    if(strlen($start) > 0 && !is_numeric($start)){
        echo 'Data Error';
        exit();
        
    }
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'css.php';?>
        <title>Pengumuman Perkuliahan | Website Dosen Teknik Informatika Universitas Palangka Raya</title>
    </head>
    <body>    
<?php  include 'lib/fungsi.php'; include 'lib/library.php'; include 'nav.php'?>;
<?php $gm="SELECT a.idDosen as idd, a.judul as judul, a.isi as isi, a.tangglUpload as tanggal, b.nama as dosen from pengumuman a left join dosen b on a.idDosen=b.idDosen order by a.tangglUpload DESC LIMIT $eu,$limit";
      $exm=  mysql_query($gm); ?>
<div id="tam" style="box-shadow: 0px 0px 0px 0px;">
    <div class="container" id="putih" style="box-shadow: 0px 0px 3px;">
            <div class="page-header">
                <h2 class="text-center">PENGUMUMAN</h2>
            </div>
            
            <?php while ($fetp=mysql_fetch_array($exm)){ ?>
            <div class="shadow-wrapper">
                <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
                <h4 class="text-center"><b><?php echo $fetp['judul'];?></b></h4>
                <p class="text-center" style="font-size: 20px;"><?php echo $fetp['isi'];?></p>
                <small>oleh :<a href="dosen.php?id=<?php echo $fetp['idd'];?>"> <b><?php echo $fetp['dosen'];?></b> </a>  yang dibuat pada tanggal : <?php echo tgl_indo($fetp['tanggal']);?></small>
                </div></div>
            <?php } ?>
        <?php 
             if($numpage>$limit){ ?>
             <div class="text-center"><ul class="pagination"><?php
                 if($back>=0){
                     echo "<li><a href=$page?start=$back>PREV</a></li>";              
                 } 
                 $l = 1;
                 for($i = 0; $i < $numpage;$i = $i + $limit){
                     if($i<>$eu){
                         echo "<li><a href=$page?start=$i>$l</a></li>";
                         
                     }else{
                         echo "<li class='active'><a>$l</a></li>";}		
                         $l = $l + 1;
                         
                     }
                     
                     if($thisp<$numpage){
                         echo "<li><a href=$page?start=$next>NEXT</a></li>";
                         
                     }
                     echo "</ul></div>";
			}
                        ?>
        </div></div><br>
         <?php           include 'dosen/footer.php';           include 'js.php';?>
    </body></html>