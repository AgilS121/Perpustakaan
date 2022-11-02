<?php
include 'header.php';
// include '../config/config.php';

if(isset($_POST['submit'])) {

    if (tambah_kategori($_POST) > 0){
        echo " Data Berhasil ditambahkan";
    } else {
        echo "gagal";
        echo "<br>";
        echo mysqli_error($db);
    }
}
?>
<div class="card shadow">
    <div class="card-body">



        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Data Kategori</h3>

            <a href="kategori-pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fa-solid fa-file-pdf fa-sm text-white-50"></i> Cetak PDF</a>
        </div>
        <button class="btn btn-outline-info mb-3" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#staticBackdrop">
            Tambah
        </button>


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <!-- php start -->
                <?php $i=1;
                $query    =mysqli_query($db, "SELECT * FROM kategori ");
                 while($k   =mysqli_fetch_array($query)){  ?>
                <!-- php end -->
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $k['nama_kategori'] ?></td>
                    <td><?= $k['keterangan'] ?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="kategori-edit.php?id=<?= $k['id'] ?>">Ubah</a>
                        <a class="btn btn-danger" href="kategori-hapus.php?id=<?= $k['id'] ?>"
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <!-- php start -->
                <?php $i++; }?>
                <!-- php end -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input class="form-control" type="text" name="nama_kategori" id="nama_kategori"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit">Tambah Kategori</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>