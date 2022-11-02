<?php
// pemanggilan header tampilan utama
    include 'header_utama.php';
?>

<body>

    <!-- content -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html"><?= APPNAME ?></a></h1>
            <!--tulsan pada navbar -->

            <!-- navbar menu, untuk menampilkan menu apa saja yang akan dipilih -->
            <nav id="navbar" class="navbar">
                <ul>
                    <!--href 'hero' menuju ke id hero di section -->

                    <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                    <!-- href 'about' menuju ke id about untuk tampilan tentang website-->

                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <!-- href welcome.php menuju ke halaman php yang nama filenya welcome.php-->

                    <li><a class="nav-link scrollto" href="welcome.php">Buku</a></li>

                    <!-- menuju ke halaman register.php-->
                    <li><a class="nav-link scrollto " href="register.php">Register / Login</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section, berfungsi menampilkan halam utama atau halaman pertama pada website perpus ini ======= -->
    <div id="hero" class="hero route bg-image" style="background-image: url(public/img/perpus.jpg)">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h1 class="hero-title mb-4">Selamat datang di <?= APPNAME ?>!</h1>
                    <!-- Display pada tampilan utama -->
                    <p class="hero-subtitle"><span class="typed"
                            data-typed-items="PERPUSTAKAAN DENGAN SISTEM WEBSITE"></span></p> <!-- menampilkan text -->
                </div>
            </div>
        </div>
    </div><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section, untuk menampilkan halaman tentang website ini, seperti apakah bentuk dari sistem website ini sendiri ======= -->
        <section id="about" class="about-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="about-me pt-4 pt-md-0">
                                        <div class="title-box-2">
                                            <!-- Judul di kategori Tentang web -->
                                            <h5 class="title-left">
                                                Tentang Web
                                            </h5>
                                        </div>
                                        <p class="lead">
                                            Perpustakaan berbasis web ini dibuat untuk mengetahui informasi buku yang
                                            ada tanpa harus ketempat langsung. Web ini dibuat berdasarkan bahasa
                                            pemrograman PHP. Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Tempora mollitia rerum temporibus unde facilis, commodi deleniti vel earum
                                            illum error, iste odio doloribus magni quidem qui corporis. Esse, cum
                                            ducimus?
                                        </p>
                                        <p class="lead">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias quam non
                                            dicta molestiae quod quis, hic ducimus! Nesciunt adipisci, quasi ipsum
                                            possimus hic quaerat modi est soluta fugiat numquam ratione!
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->

    <?php
    #pemanggilan footer halaman utama untuk tampilan
    include 'footer_utama.php';
    ?>