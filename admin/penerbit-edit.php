<?php
include 'header.php';
// include '../config/function.php';

$id = $_GET['id'];
$query = mysqli_query($db,"SELECT * FROM penerbit WHERE id = $id");
$penerbit = mysqli_fetch_array($query);


if( isset($_POST["submit"]) ) {

    if (ubah_penerbit($_POST) > 0){
        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'penerbit.php';
            </script>";
    } else {
        echo "<script>
        alert('data gagal diubah!');
        document.location.href = 'penerbit.php';
            </script>";
    }

}
?>
<h3 class="mb-3 text-center">Form Ubah Penerbit</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?= $penerbit['id']?>">
                    <div class="form-group">
                        <label for="nama_penerbit">Nama Penerbit</label>
                        <input class="form-control" type="text" name="nama_penerbit" id="nama_penerbit"
                            value="<?= $penerbit['nama_penerbit'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat"
                            value="<?= $penerbit['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input class="form-control" type="number" name="no_telp" id="no_telp"
                            value="<?= $penerbit['no_telp'] ?>">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Ubah Penerbit</button>
            <a href="penerbit.php" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>