<?php
// Pemanggilan koneksi database dan bantuan url website di folder config
include 'config/config.php';
include 'config/helper.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- judul pada tab di browser -->
    <title><?= APPNAME ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- pemanggilan tamppilan pada folder public -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= BASEURL; ?>public/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= BASEURL; ?>public/assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= BASEURL; ?>public/assets/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= BASEURL; ?>public/assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/public/assets/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= BASEURL; ?>public/assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>public/assets/css/main.css">
    <!-- Vendor CSS Files -->
    <link href="<?= BASEURL; ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- assets Main CSS File -->
    <link href="<?= BASEURL; ?>public/assets/css/style.css" rel="stylesheet">

</head>