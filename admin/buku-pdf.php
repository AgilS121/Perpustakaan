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
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Penulis</th>
                            </tr>
                        </thead>';
                        $i = 1; 
                        include '../config/config.php';
                        $query    =mysqli_query($db, "SELECT buku.*, kategori.nama_kategori, penerbit.nama_penerbit FROM buku JOIN kategori ON id_kategori = kategori.id JOIN penerbit On penerbit.id");
                        while($b    =mysqli_fetch_array($query)){ 
                        $html .='<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $b["judul"] . '</td>
                            <td>' . $b["tahun_terbit"] . '</td>
                            <td>' . $b["nama_kategori"] . '</td>
                            <td>' . $b["nama_penerbit"] . '</td>
                            <td>' . $b["penulis"] . '</td>
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
$mpdf->Output('Daftar Buku.pdf', 'I');