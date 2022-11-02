<?php
include 'header.php';
// include '../config/config.php';

if(isset($_GET['id'])){
    $id    =$_GET['id'];
}
else {
    die ("Tidak Ada Id yang dipilih!");    
}
$query    =mysqli_query($db, "SELECT buku.*, kategori.nama_kategori, penerbit.nama_penerbit FROM buku JOIN kategori ON buku.id_kategori = kategori.id JOIN penerbit ON buku.id_penerbit = penerbit.id
WHERE buku.id = '$id'");
$data_buku    =mysqli_fetch_array($query);
?>

<h3 class="mb-3">Detail Buku</h3>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $data_buku['judul'] ?></h4>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data_buku['tahun_terbit'] ?></h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Penulis:</b> <?= $data_buku['penulis'] ?></li>
                <li class="list-group-item"><b>Penerbit:</b> <?= $data_buku['nama_penerbit'] ?></li>
                <li class="list-group-item"><b>Kategori:</b> <?= $data_buku['nama_kategori'] ?></li>
                <li class="list-group-item"><b>kd_buku:</b> <?= $data_buku['kd_buku'] ?></li>
            </ul>
            <div class="card-body">
                <a href="<?= BASEURL ?>admin/buku.php" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><img src="<?= BASEURL?>public/img/<?= $data_buku['cover']?>" width="50%">
                </li>
                <li class="list-group-item"><b>Deskripsi:</b> <?= $data_buku['descripsi'] ?></li><br><br>
            </ul>

        </div>
    </div>
</div>

<?php

include 'footer.php';
?>