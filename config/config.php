<?php

$server = "localhost"; //user hostname 
$user = "root"; //nama user host
$password = ""; // password host
$nama_database = "perpustakaan"; //nama databasenya yang akan dihubungkan 


$db = mysqli_connect($server, $user, $password, $nama_database); // penghubungan semua data ke database dengan mysqli
$koneksi = new PDO('mysql:host=localhost;dbname=perpustakaan;user=root;pass='); // penghubungan semua data ke database dengan PDO






?>