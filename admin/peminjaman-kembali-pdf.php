<?php

require_once '../vendor/autoload.php';
$html = '<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Perpustakaan</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


</head>

<body>


    <main>

        <section class="py-5  container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-center">DATA BUKU PERPUSTAKAAN</h1>
                    <br>
                    <table class="table" border="1" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama peminjam</th>
                                <th>Tanggal Pinjam Buku </th>
                                <th>Tanggal kembali </th>
                                <th>Buku</th>
                            </tr>
                        </thead>';
                        $i = 1; 
                        include '../config/config.php';
                        $query    =mysqli_query($db, "SELECT * FROM meminjam,buku,users
                        WHERE meminjam.id_users = users.id AND
                        meminjam.id_buku = buku.id AND meminjam.kembali = 2
                        ORDER By id_pinjam ");
                        while($b    =mysqli_fetch_array($query)){ 
                        $html .='<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $b["nama"] . '</td>
                            <td>' . $b["tgl_pinjam"] . '</td>
                            <td>' . $b["tgl_kembali"] . '</td>
                            <td>' . $b["judul"] . '</td>
                            </tr>';
                        }
$html .=            '</table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Buku Sudah Dikembalikan.pdf', 'I', 'D');