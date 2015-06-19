<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">navigasi</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a href="index.php" class="navbar-brand"><img class="img-rounded" src="gambar/logo.jpg" style="width: 25px;"><small class="text-center"> Website Dosen Teknik Informatika Universitas Palangkaraya</small></a>
    </div> 
      <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
              <li><a href="materi.php"><span class="glyphicon glyphicon-book"></span> Materi</a></li>
              <li><a href="pengumuman.php"><span class="glyphicon glyphicon-bullhorn"></span> Pengumuman</a></li>
              <?php 
              if($_SESSION[tipe]=='Dosen') {?>
              <li><a href="dosen/"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION[nama];?></a></li>
              <?php } else { ?>
                  <li><a href="dosen/"><span class="glyphicon glyphicon-user"></span> Login Dosen</a></li>
             <?php } ?>
                  <?php 
                 if($_SESSION[tipe]=='Admin') {?> 
              <li><a href="admin/"><span class="glyphicon glyphicon-eye-open"></span> <?php echo $_SESSION[username];?></a></li>
              <?php } else { ?>
              <li><a href="admin/"><span class="glyphicon glyphicon-eye-open"></span> Login Admin</a></li>
              <?php } ?>
      </ul>
      </div>
  </div>
        </nav>