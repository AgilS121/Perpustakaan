<?php
include 'header.php';

//query untuk memilih tabel users, meminjam dan buku yang dihubungkan berdasarkan id, jadi disini join 3 tabel
$query = "SELECT * FROM meminjam,buku,users WHERE meminjam.id_users = users.id AND meminjam.id_buku = buku.id AND meminjam.kembali = 1  AND username='$_SESSION[username]' order by id_pinjam ";
$sql = mysqli_query ($db, $query);
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Riwayat Peminjaman Anda</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Lama Pinjam</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- file start php -->
                                    <?php 
                                        $no = 1; //inisialisasi variabel yang menandakan nomor bermulai dari nomor 1
                                        while ($data=mysqli_fetch_array($sql)) { // pengkondisian jika benar dan ditampilkan dalam bentuk array
                                    ?>
                                    <!-- file end php -->

                                    <tr class="odd gradeX">
                                        <td><?php echo $no?></td>
                                        <td><?php echo $data['tgl_pinjam'];?></td>
                                        <td><?php echo $data['username'];?></td>
                                        <td><label
                                                class="btn  <?= ($data['kembali'] == 1) ? 'btn btn-warning' : 'btn btn-success' ?>">
                                                Belum Dikembalikan
                                            </label>
                                        </td>
                                    </tr>

                                    <!-- file start php -->
                                    <?php $no++; //kode yang meemrintahkan agar nomor selalu bertambah sesuai data
                                    } // penutup kurung kurawal
                                    ?>
                                    <!-- file end php -->

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php
include 'footer.php';
?>