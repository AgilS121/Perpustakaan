<?php 
include 'header.php';
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header card-secondary">
                        <h3>Daftar Buku</h3>
                        <p>Berikut adalah daftar buku yang tersedia pada web perpustakaan ini</p>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="btn-group w-100 mb-2">
                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="filter-container p-0 row">

                                <!-- file start php -->
                                <?php
                                $sql = "SELECT * FROM buku"; // pemanggilan semua data di tabel buku
                                $query = mysqli_query($db, $sql); // mengecek apakah di database ada tabel yang dimaksud

                                while($buku = mysqli_fetch_array($query)){ //jika data yang dimaksud ada, maka tampilkan dalam bentuk array
                                ?>
                                <!-- file end php -->

                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="detail-buku.php?id=<?= $buku['id']?>" data-toggle="lightbox"
                                        data-title="sample 1 - white">
                                        <img src="<?= BASEURL ?>public/img/<?= $buku['cover']?>" class=" mb-2"
                                            alt="white sample" width="200px" height="300px" />
                                    </a>
                                </div>

                                <!-- file start php -->
                                <?php } // pengakhiran kurung kurawal
                                ?>
                                <!-- file end php -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>