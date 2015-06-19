<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">navigasi</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a href="../index.php" class="navbar-brand"><img class="img-rounded" src="../dosen/aset/gbr/logo.jpg" style="width: 25px;"><small class="text-center"> Website Dosen Teknik Informatika Universitas Palangkaraya</small></a>
    </div> 
      <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION[username];?></a></li>
              <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Kelola Admin</a></li>
              <li><a href="logout.php"> <span class="glyphicon glyphicon-off"></span> Keluar</a></li>
      </ul>
      </div>
  </div>
        </nav>