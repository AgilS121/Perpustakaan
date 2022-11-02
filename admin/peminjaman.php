<?php
include 'header.php';
// include '../config/function.php';
if( isset($_POST["simpan"]) ) {
	
	if( tambah_peminjaman($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'input-peminjaman.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'input-peminjaman.php';
			</script>
		";
	}


}

$buku = query("SELECT * FROM buku");
?>

<h3 class="text-center mb-5">Input Peminjaman</h3>

<div class="card shadow">
    <div class="card-body">
        <table width="700" border="1">

            <tr>

                <form method="post" action="">
                    <table class="table dt-responsive nowrap" style="width: 100%;">
                        <tr>
                            <td>Nama Peminjam</td>
                            <td>:</td>
                            <td>
                                <!-- start php -->
                                <?php

                                $sql_anggota="select * from users order by id";
                                $kueri_anggota=mysqli_query($db, $sql_anggota) or die(mysqli_error($db));
                                ?>
                                <!-- end php -->

                                <select name="users">
                                    <!-- start php -->
                                    <?php
                                    while (list($kode,$nama_status)=mysqli_fetch_array($kueri_anggota))
                                    {
                                    ?>
                                    <option value="<?= $kode ?>"><?= $nama_status ?></option>
                                    <?php
                                    }
                                    ?>
                                    <!-- end php -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Judul Buku </td>
                            <td>:</td>
                            <td>
                                <!-- start php -->
                                <?php

                                $sql_buku="select * from buku order by id";
                                $kueri_buku=mysqli_query($db, $sql_buku) or die(mysqli_error($db));
                                ?>
                                <!-- end php -->
                                <select name="buku">
                                    <!-- start php -->
                                    <?php
                                    while (list($kode,$nama_status)=mysqli_fetch_array($kueri_buku))
                                    {
                                    ?>
                                    <!-- end php -->
                                    <option value="<?= $kode ?>"><?= $nama_status ?></option>
                                    <!-- start php -->
                                    <?php
                                    }
                                    ?>
                                    <!-- end php -->
                                </select>
                            <td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="simpan" value="simpan" class="btn btn-info"></td>
                        </tr>

                    </table>
                </form>
            </tr>
        </table>
    </div>
</div>
<br>
<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <td>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="h3 mb-0 text-gray-800">Daftar Buku Yang Dipinjam</h3>

                        <a href="pinjaman-pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa-solid fa-file-pdf fa-sm text-white-50"></i> Cetak PDF</a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam Buku </th>
                                <th>nama peminjam</th>
                                <th>Buku</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- start php -->
                            <?php 
                            $query = "SELECT * FROM meminjam,buku,users
                            WHERE meminjam.id_users = users.id AND
                            meminjam.id_buku = buku.id AND meminjam.kembali = 1
                            ORDER By id_pinjam";
                            $sql = mysqli_query ($db, $query);
                            $no = 1;
                            while ($data=mysqli_fetch_array($sql)) {
                            ?>
                            <!-- end php -->
                            <tr class="odd gradeX">
                                <td><?= $no?></td>
                                <td><?= $data['tgl_pinjam'];?></td>
                                <td><?= $data['username'];?></td>
                                <td class="center"><?= $data['judul'];?></td>
                </td>
                <td class="center">
                    <a class="btn btn-secondary" href="peminjaman-kembali.php?id=<?= $data['id_pinjam']; ?>"
                        onClick="return confirm('Apakah Anda ingin mengembalikan  <?= $data['judul_buku']; ?>?')">
                        Kembalikan </a>
                </td>
            </tr>
            <!-- start php -->
            <?php $no++; }?>
            <!-- end php -->
            </tbody>

        </table>
        <br>

        <hr>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Data Buku Yang Sudah Dikembalikan</h3>

            <a href="pinjaman-kembali-pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fa-solid fa-file-pdf fa-sm text-white-50"></i> Cetak PDF</a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pinjam Buku </th>
                    <th>Tanggal kembali </th>
                    <th>Nama peminjam</th>
                    <th>Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- start php -->
                <?php 
                            $query = "SELECT * FROM meminjam,buku,users
                            WHERE meminjam.id_users = users.id AND
                            meminjam.id_buku = buku.id AND meminjam.kembali = 2
                            ORDER By id_pinjam";
                            $sql = mysqli_query ($db, $query);
                            $no = 1;
                            while ($data=mysqli_fetch_array($sql)) {
                            ?>
                <!-- end php -->
                <tr class="odd gradeX">
                    <td><?= $no?></td>
                    <td><?= $data['tgl_pinjam'];?></td>
                    <td><?= $data['tgl_kembali'];?></td>
                    <td><?= $data['nama'];?></td>
                    <td class="center"><?= $data['judul'];?></td>
                    </td>
                    <td class="center"><a class="btn btn-danger"
                            href="peminjaman-hapus.php?id=<?= $data['id_pinjam']; ?>"
                            onClick="return confirm('Apakah Anda ingin mengapus  <?= $data['id_pinjam']; ?>?')">
                            hapus</a> </td>
                </tr>
                <!-- start php -->
                <?php $no++; }?>
                <!-- end php -->
            </tbody>

        </table>
        </td>
        </tr>

        </table>
    </div>
</div>
<br><br><br>

<?php
include 'footer.php';
?>