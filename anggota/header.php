<?php
require_once('../config/helper.php');
require_once('../config/config.php');
require_once('../config/function.php');

ob_start();
session_start();
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed");
}
if($_SESSION['role']!="anggota"){
    die(" Access Failed");
}


$tampiluser    =mysqli_query($db, "SELECT * FROM users WHERE username='$_SESSION[username]'");
$user    =mysqli_fetch_array($tampiluser);

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APPNAME?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= BASEURL?>vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL?>vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
    <!-- bootstrap -->

</head>

<body class="hold-transition dark-mode layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-lg navbar-dark mb-2">
            <div class="container">
                <a class="navbar-brand">
                    <span class="brand-text font-weight-light"> Welcome - <?= $user['nama']?></span>
                </a>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <?= $user['username']?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')"
                                class="dropdown-item">
                                <i class="fas fa-sign-out"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <center>
            <h1><?= APPNAME?></h1>
        </center>
        <nav class="main-header fixed navbar navbar-expand-md navbar-dark navbar-dark mt-2 mb-4">
            <div class="container">

                <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item pl-5 pr-5">
                            <a href="index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i>
                                Home</a>
                        </li>
                        <li class="nav-item pl-5 pr-5">
                            <a href="daftar-buku.php" class="nav-link"><i class="fa fa-book" aria-hidden="true"></i>
                                Daftar Buku</a>
                        </li>
                        <li class="nav-item pl-5 pr-5">
                            <a href="daftar-pinjaman.php" class="nav-link"><i class="fa fa-list" aria-hidden="true"></i>
                                Daftar Pinjaman</a>
                        </li>
                        <li class="nav-item pl-5 pr-5">
                            <a href="about.php" class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                About Website</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->