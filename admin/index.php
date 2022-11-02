<?php
include 'header.php';
// include '../config/config.php';

$query1 = mysqli_query($db, "SELECT * FROM buku");
$query2 = mysqli_query($db,"SELECT * FROM users WHERE role = 'anggota'");
$query3 = mysqli_query($db,"SELECT * FROM meminjam");

$jml_buku = mysqli_num_rows($query1);
$jml_user = mysqli_num_rows($query2);
$jml_pinjaman = mysqli_num_rows($query3);


?>
<h1 class="h3 mb-4 text-gray-800">Halaman Admin</h1>
<hr>

<div class="row">
    <div class="col-lg-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_buku ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Member</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_user?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pinjaman
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_pinjaman?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>