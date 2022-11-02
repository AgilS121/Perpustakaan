<?php
require_once('../config/helper.php');
require_once('../config/config.php');
require_once('../config/function.php');

ob_start();
session_start();
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed");
}
if($_SESSION['role']!="admin"){
    die(" Access Failed");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base_url" content="<?= BASEURL ?>">
    <title><?= APPNAME ?></title>


    <link href="<?= BASEURL ?>public/template/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/386a70e6e1.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.17/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">
    <link href="<?= BASEURL?>public/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= APPNAME ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL?>admin/index.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buku.php">
                    <i class="fas fa-book"></i>
                    <span>Daftar Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="peminjaman.php">
                    <i class="fas fa-arrow-circle-down"></i>
                    <span>Input Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="penerbit.php">
                    <i class="fas fa-user-tag"></i>
                    <span>Penerbit</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kategori.php">
                    <i class="fas fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                    $tampiluser    =mysqli_query($db, "SELECT * FROM users WHERE username='$_SESSION[username]'");
                                    $user    =mysqli_fetch_array($tampiluser);
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?> -
                                    <?= $user['role']?></span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php"
                                    onclick="return confirm('Apakah anda yakin ingin keluar?')">
                                    <i class="fas fa-sign-out-alt fa-sm mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">