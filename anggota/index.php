<?php
include 'header.php';

//query yang memerintahkan pengecekan pada database kemudian pengecekan pada tabel yang dimaksud, kemudian jika sudah, cek apakah id yang dipanggil sudah sesuai, jika sudah maka tampilkan data yang ada berdasarkan id tersebut
$query = "SELECT * FROM meminjam,buku,users WHERE meminjam.id_users = users.id AND meminjam.id_buku = buku.id AND username='$_SESSION[username]' ORDER By id_pinjam ";
$sql = mysqli_query ($db, $query);
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= BASEURL?>public/img/users.png"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $user['nama'] ?></h3>

                        <p class="text-muted text-center"><?= $user['id'] ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity"
                                    data-toggle="tab">AKTIFITAS</a></li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">


                                <!-- Post -->
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <h3 class="m-0"> Riwayat Peminjaman Anda</h3>
                                    </div>
                                    <!-- /.user-block -->
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Nama Peminjam</th>
                                                <th>Judul Buku</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- php start -->
                                            <?php 
                                            $no = 1;
                                            while ($data=mysqli_fetch_array($sql)) {
                                            ?>
                                            <!-- php end -->

                                            <tr class="odd gradeX">
                                                <td><?php echo $no?></td>
                                                <td><?php echo $data['tgl_pinjam'];?></td>
                                                <td><?php echo $data['tgl_kembali'];?></td>
                                                <td><?php echo $data['username'];?></td>
                                                <td class="center"><?php echo $data['judul'];?></td>

                                                <!-- pebuatan if else atau pengkondisian dimana jika data row 'kembali' bernilai 1 maka akan tampillkan text belum dikembalikan dan jika data kembali nilainya selain nilai 1 maka akan tampil data sudah kembali -->
                                                <?php if ($data['kembali'] == 1) : ?>
                                                <td class="text-danger">Belum Dikembalikan</td>
                                                <?php else : ?>
                                                <td class="text-success">Sudah Dikembalikan</td>
                                                <?php endif ?>

                                            </tr>

                                            <!-- php start -->
                                            <?php $no++; 
                                            }
                                            ?>
                                            <!-- php end -->

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.post -->

                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php
include 'footer.php';
?>