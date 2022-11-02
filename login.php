<?php 
// pemanggilan file koneksi dan helper pada folder config 
require_once 'config/config.php';
require_once 'config/helper.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= APPNAME; ?></title>
    <link rel="stylesheet" href="<?= BASEURL?>/public/patalin/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="login-box">
        <h2>Login</h2><br>

        <!-- form login , yang mengarah pada cek login kemudian menggunakan method post -->
        <form action="cek_login.php?op=in" method="post">
            <div class="user-box">
                <!-- label inputan sebgai user untuk mengetikkan usernamenya -->
                <input type="text" name="username" id="username" required=""><br>
                <label>Username</label>
            </div>
            <div class="user-box">
                <!-- label inputan sebgai user untuk mengetikkan passwordnya -->
                <input type="password" name="password" id="password" required="">
                <label>Password</label>
            </div>
            <!-- btn dengan nama login -->
            <button class="btn-trans" type="submit" name="login" id="login">Login</button>
        </form>
        <center>
            <!-- text untuk mengarahkan ke halaman register sebagai user pengguna baru -->
            <p class="small">Belum Mempunyai Akun? <a href="<?= BASEURL ?>register.php">Register</a></p>
        </center>
        </form>
    </div>
</body>

</html>