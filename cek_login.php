<?php

$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan"); //code untuk koneksi pada database

ob_start(); //sebagai pemberian unpan balik
session_start(); //pembukaan session
    $username        = mysqli_real_escape_string($koneksi, $_POST['username']); //ambil data username darri form login 
    $password        = mysqli_real_escape_string($koneksi, md5($_POST['password'])); //ambil data passwrd dari form login
    $op             = $_GET['op'];

    if($op=="in"){
        $sql = mysqli_query($koneksi, "SELECT * FROM users 
        WHERE username='$username' 
        AND 
        password='$password'"); // jika username dan password ada makan masukkan username dan password lalu lalukan pengecekan
        if(mysqli_num_rows($sql)==1){ //jika data row ada bernilai 1 maka akan dilakukan pengecekan
            $qry = mysqli_fetch_array($sql); // pengecekan pertama mengubah data menjadi array
            $_SESSION['username']    = $qry['username']; // pengecekan sesi untuk username apakah benar
            $_SESSION['nama']    = $qry['nama']; // pengecekan data nama apakah sesuai
            $_SESSION['role']    = $qry['role']; // pengecekan data role apakah ada
            
            if($qry['role']=="admin"){ // jika data role ada, lalu kembali dilakukan pengecekan, jika role = admin
                header("location:admin"); // maka data akan diarahkan ke halaman admin
            } else { //jika role bukan atau tidak sama dengan admin
                header("location:anggota");// maka data atau user akan dirahkan ke halaman anggota
            }
        }
        else{
            ?>


<script language="JavaScript">
alert('Oops! Login Failed. Username & password tidak sesuai ...');
document.location = './';
</script>


<?php
        }
    }
    else if($op=="out"){
        unset($_SESSION['id']);
        unset($_SESSION['role']);
        header("location:./");
    }