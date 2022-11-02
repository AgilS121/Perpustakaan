<?php
include 'header_utama.php';
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top bg-black">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html"><?= APPNAME ?></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="index.php">Home</a></li>
                <li><a class="nav-link scrollto" href="index.php">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#">Buku</a></li>
                <li><a class="nav-link scrollto " href="register.php">Register / Login</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<br><br><br>
<!-- ======= Portfolio Section ======= -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <br><br><br>
        <center>
            <h2>Daftar Buku</h2>
        </center>
        <hr>

        <div class="row isotope-grid">
            <?php
            $sql = "SELECT * FROM buku";
            $query = mysqli_query($db, $sql);

            while($buku = mysqli_fetch_array($query)){ ?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->

                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="<?= BASEURL ?>public/img/<?= $buku['cover']?>" alt="IMG-PRODUCT" height="350px"
                            width="250px">

                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?= $buku['judul'] ?>
                            </a>

                            <span class="stext-105 cl3">
                                <?= $buku['penulis'] ?> | <?= $buku['tahun_terbit'] ?>
                            </span>
                        </div>

                    </div>
                </div>

            </div>
            <?php
        }
        ?>

        </div>

    </div>
</div>


</main><!-- End #main -->
<?php
include 'footer_utama.php';
require_once './config/config.php';
require_once './config/helper.php';
?>