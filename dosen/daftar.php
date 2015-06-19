<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Daftarkan Akun Baru</title>
        <?php include 'css.php'; ?>

    </head>
    <body>
        <div class="container">
            <form class="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                <h2 class="text-center">Buat Akun Baru</h2>
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required="true" autofocus="true">
                <label for="password">Password</label>
                <input class="form-control" type="password" required name="password" placeholder="Masukkan Password">
                <label for="password">Nama</label>
                <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama Anda">
                <label for="password">NIP</label>
                <input class="form-control" type="text" name="nip" required placeholder="Masukkan NIP Anda">
                <label for="password">Jabatan</label>
                <input class="form-control" required type="text" name="jabatan" placeholder="e.g Lektor , Tenaga Ahli"><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="daftar">Daftar</button><hr>
                <a href="masuk.php" class="btn btn-default btn-block">Login Disini</a><hr>
                <footer><p class="text-center">Website Dosen Teknik Informatika Universitas Palangkaraya</p> <hr> <p class="text-center">Program Profesional oleh Van Ray Hosea (c) 2014</p></footer>
            </form>
        </div>
       <?php 
       include '../koneksi.php';
      
	if(isset($_POST['submit']) && $_POST['submit']=='daftar')
	{
		
		$uname=$_POST['username'];
                $pass=$_POST['password'];
                $nama=$_POST['nama'];
                $nip=$_POST['nip'];
                $jabatan=$_POST['jabatan'];
		$status='Tidak Aktif';
		
				
		$ins="INSERT INTO dosen(username,password,nama,nip,jabatan,status) VALUES('$uname','$pass','$nama','$nip','$jabatan','$status')";
		$xx= mysql_query($ins);
                
		echo "<script>alert('Data $uname Berhasil dimasukkan, Hubungi Admin untuk mengaktifkan Akun anda');
		window.location='index.php';
		</script>";
			
		
	}
?> 
    </body>
</html>