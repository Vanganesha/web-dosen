       
    <tombol>
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div>
                <a class="tombol-dosen" href="materi.php">
                    <i class="fa fa-book"></i><br>
                    <p>Materi Perkuliahan</p>
                </a>
                </div></div>
            
            <div class="col-md-3">
                <a class="tombol-dosen" href="pengumuman.php">
                    <i class="fa fa-bullhorn"></i><br>
                    <p>Pengumuman</p>
                </a>
            </div>
            
            <div class="col-md-3">
                <a class="tombol-dosen" href="matkul.php">
                    <i class="fa fa-tasks"></i><br>
                    <p>Kelola Mata Kuliah</p>
                </a>
            </div>
            
            <div class="col-md-3">
                <a class="tombol-dosen" href="profile.php?id=<?php $id=$_SESSION[idDosen]; echo base64_encode($id) ;?>">
                    <i class="fa fa-user"></i><br>
                    <p>Edit Profile</p>
                </a>
            </div>
            
            
        </div></div>
    </tombol>
 