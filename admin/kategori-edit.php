<?php
include 'header.php';
// include '../config/function.php';

$id = $_GET['id'];
$query = mysqli_query($db,"SELECT * FROM kategori WHERE id = $id");
$kategori = mysqli_fetch_array($query);


if( isset($_POST["submit"]) ) {

    

    if (ubah_kategori($_POST) > 0){
        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'kategori.php';
            </script>";
    } else {
        echo "<script>
        alert('data gagal diubah!');
        document.location.href = 'kategori.php';
            </script>";
        
    }

}
?>
<h3 class="mb-3 text-center">Form Ubah Kategori</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?= $kategori["id"]; ?>">

                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input class="form-control" type="text" name="nama_kategori" id="nama_kategori"
                            value="<?= $kategori['nama_kategori'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input class="form-control" type="text" name="keterangan" id="keterangan"
                            value="<?= $kategori['keterangan'] ?>">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Ubah Kategori</button>
            <a href="kategori.php" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>