<?php
// untuk memanggil sebuah koneksi, bantuan dan fungsi di folder config
include 'config/config.php'; 
include 'config/helper.php';
include 'config/function.php';


if( isset($_POST["register"]) ) { // proses register, jika button 'nama' submit diklik maka akan mengirimkan data data yang ada didalamnya

	if( registrasi($_POST) > 0 ) { // jika , fungsi registrasi mengirimkan metod post yang berisi data atau 1 
		echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
			  </script>"; // maka akan mengirimkan alert berhasil kemudian dialihkan ke halaman login
	} else { // jika tidak
		echo mysqli_error($db); // tampilkan error pada koneksi
	}

}
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
        <h2>REGISTER</h2>
        <!-- form register dengan method post, tidak ada form actionnya karena akan berjalan di halaman ini juga -->
        <form action="" method="post">
            <div class="user-box">
                <!-- label innput nama sebagai pengisina nama lengkap -->
                <input type="text" name="nama" id="nama" required=""><br>
                <label>Nama</label>
            </div>
            <div class="user-box">
                <!-- label innput nama sebagai pengisina username anggota -->
                <input type="text" name="username" id="username" required=""><br>
                <label>Username</label>
            </div>
            <div class="user-box">
                <!-- label innput nama sebagai pengisina password anggota -->
                <input type="password" name="password" id="password" required="">
                <label>Password</label>
            </div>
            <div class="user-box">
                <!-- label innput nama sebagai pengisina konfirmasi password anggota apakah sesuai atau tidak -->
                <input type="password" name="password1" id="password1" required="">
                <label>Confirm Password</label>
            </div>
            <!-- label innput nama sebagai button ketika pengisian sudah selesai dilakukan -->
            <button class="btn-trans" type="submit" name="register">Submit</button>
        </form>
        <center>
            <p class="small">Sudah Mempunyai Akun? <a href="login.php">Login</a></p>
        </center>
    </div>
</body>
<footer class="fixed-bottom footer text-grey">
    <p style="font-size: 12px;">&copy; Design login by Patalin</p>
</footer>



</html>