<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Admin Masuk Ke Sistem</title>
        <?php include 'css.php'; ?>

    </head>
    <body>
        <div class="container">
            <form class="login" method="post" action="clog.php">
                <h2 class="text-center">Login Ke Sistem</h2>
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required="true" autofocus="true">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Masukkan Password"><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button><hr>
                <div style="text-align: center;">
                <a href="../index.php" class="btn btn-default"><span class="glyphicon glyphicon-home"></span></a>
                <a href="../materi.php" class="btn btn-default"><span class="glyphicon glyphicon-book"></span></a>
                <a href="../pengumuman.php" class="btn btn-default"><span class="glyphicon glyphicon-bullhorn"></span></a>
                </div><hr><footer><p class="text-center">Website Dosen Teknik Informatika Universitas Palangkaraya</p> <hr> <p class="text-center"> Van Ray Hosea (c) 2014</p></footer>
            </form>
        </div>
    </body>
</html>