<?php include '../koneksi.php'; include 'logic.php';

session_start();
error_reporting(0);

if (empty($_SESSION[username]) AND empty($_SESSION[password])){ 
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
    <?php include 'nav.php'; ?>
         <div class="container">
             <div class="row">
                 <h2 class="text-center">Admin Dashboard</h2><hr>
             </div>              
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>NIP</td>
                        <td>Username</td>
                        <td>Status</td>
                        <td class="text-center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
        
          <?php
            include '../koneksi.php';
            $gdosen=  mysql_query("select nama, nip, username, status, iddosen from dosen");
            while ($hgdosen = mysql_fetch_array($gdosen)) {
               $nama=$hgdosen[0];
               $nip=$hgdosen[1]; 
               $username=$hgdosen[2];
               $status=$hgdosen[3];
               ?>
                        <tr>
                        <td><?php echo $nama ; ?></td>
                        <td><?php echo $nip ; ?></td>
                        <td><?php echo $username ;?></td>
                        <td><?php if ($status=='Aktif') {
                        echo 'Aktif';} else {
                        echo 'Tidak Aktif';}  ?> </td>
                        <td class='text-center'><a href="?id=<?php echo $hgdosen['iddosen'];?>&act=st"><?php 
				if($status == 'Tidak Aktif')
				{
					echo "<span class='glyphicon glyphicon-ok-circle'></span> Aktifkan";
				}
				else
				{
					echo "<span class='glyphicon glyphicon-remove-circle'></span> Non Aktifkan";
				}
				?>
					
					</a>  || 
                                        <a href="javascript:if(confirm('Anda yakin untuk menghapusnya?')) {location.href='index.php?del_id=<?php echo $hgdosen['iddosen']; ?>&action=del'};" ><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
                    </tr>
                         <?php } ?>
                    
                </tbody>
            </table>
         </div><?php include 'footer.php';?>
    </body>
</html>



            <?php }