<?php
include 'header.php';

//data penerbit, pemanggilan database dengan tabel penerbit
$sql = "SELECT * FROM penerbit"; // memilih tabel penerbit
$row = $koneksi->prepare($sql); // mengkoneksikan ke database
$row->execute(); // menjalankan perintah
$penerbit = $row->fetchAll(); // memecah menjadi row

//data kategori, pemanggilan database dengan tabel kategori
$sql = "SELECT * FROM kategori"; 
$row = $koneksi->prepare($sql);
$row->execute();
$kategori = $row->fetchAll();

if( isset($_POST["submit"]) ) { //pengkondisian jika button sumbit ditekan maka perintah akan dijalankan ke tahap selanjutnya
	
	if( tambah_buku($_POST) > 0 ) { // jika fungssi tambah buku yang dimaksud mengirimkan method post dengan data lebih dari 0 atau data berisi maka akan menjalankan perintah if
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'buku.php';
			</script>
		";
	} else { //jika tidak perintah else yang akan dijalankan
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'buku.php';
			</script>
		";
	}


}


?>

<div class="card shadow">
    <div class="card-body">


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Data Buku</h3>

            <a href="buku-pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fa-solid fa-file-pdf fa-sm text-white-50"></i> Cetak PDF</a>
        </div>

        <!-- Button trigger modal, memanggil modal dengan target staticbackdrop  -->
        <button class="btn btn-info mb-3" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#staticBackdrop">
            Tambah
        </button>




        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Cover Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <!-- php start -->
                <?php $i = 1; 
                 $query    =mysqli_query($db, "SELECT buku.*, kategori.nama_kategori FROM buku JOIN kategori ON id_kategori = kategori.id");
                 while($b    =mysqli_fetch_array($query)){ ?>
                <!-- php end -->

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $b['judul'] ?></td>
                    <td><?= $b['tahun_terbit'] ?></td>
                    <td><?= $b['nama_kategori'] ?></td>
                    <td><img src="<?= BASEURL ?>public/img/<?= $b['cover']?>" width="100"></td>
                    <td class="text-center">
                        <a class="btn btn-info" href="buku-detail.php?id=<?= $b['id']?>">Detail</a>
                        <a class="btn btn-warning" href="buku-edit.php?id=<?= $b['id'] ?>">Ubah</a>
                        <a class="btn btn-danger" href="buku-hapus.php?id=<?= $b['id'] ?>"
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>

                <!-- php start -->
                <?php $i++; ?>
                <?php }; ?>
                <!-- php end -->

            </tbody>
        </table>
    </div>
</div>



<!-- Modal Tambah Buku -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judul">Judul Buku</label>
                                <input class="form-control" type="text" name="judul" id="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <select class="form-control" name="penerbit" id="penerbit" required>
                                    <option value="">--- Pilih Penerbit ---</option>
                                    <!-- pengkondisian jika penerbit berisi data array maka tampilkan semua data pada tabel penerbit -->
                                    <?php if ($penerbit != []) : ?>
                                    <?php foreach ($penerbit as $p) : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun Terbit</label>
                                <input class="form-control" type="number" name="tahun" id="tahun" required>
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input class="form-control" type="text" name="penulis" id="penulis" required>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="cover">Cover Buku</label>
                                <input class="form-control" type="file" name="cover" id="cover" required>
                            </div>

                            <div class="form-group">
                                <label for="descripsi">Deskripsi</label>
                                <textarea class="form-control" type="text" name="descripsi" id="descripsi"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">kd_buku</label>
                                <input class="form-control" type="text" name="kd_buku" id="kd_buku" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori" required>
                                    <option value="">--- Pilih Kategori ---</option>
                                    <!-- pengkondisian jika tabel kategori yang dipanggil berbentuk array maka data yang ada didalamnya akan ditampilkan semua -->
                                    <?php if ($kategori != []) : ?>
                                    <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="submit">Tambah Buku</button>
                <button class="btn btn-danger" type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';


    
?>