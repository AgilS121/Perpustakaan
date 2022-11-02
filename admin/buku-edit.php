<?php 
include 'header.php';
// include '../config/function.php';
// include '../config/config.php';


$id    =$_GET['id'];

$data_buku = query("SELECT * FROM buku where id = $id")[0];


//proses edit
if( isset($_POST["edit"]) ) {
	

    if (ubah_buku($_POST) > 0){
        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'buku.php';
            </script>";
    } else {
        echo "<script>
        alert('data gagal diubah!');
        document.location.href = 'buku.php';
            </script>";

        // echo mysqli_error($db); echo "<br>";
        // echo mysqli_affected_rows($db);echo "<br>";
        // echo var_dump($_POST);echo "<br>";
        // echo mysqli_errno($db);
        
    }


}

?>
<h3 class="mb-3 text-center">Form Ubah Buku</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="id" value="<?= $data_buku["id"]; ?>">
                <input type="hidden" name="coverlama" value="<?= $data_buku["cover"]; ?>">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input class="form-control" type="text" name="judul" id="judul"
                            value="<?= $data_buku['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <select class="form-control" name="penerbit" id="penerbit">
                            <?php 
                            $query    =mysqli_query($db, "SELECT * FROM penerbit ");
                            while($p    =mysqli_fetch_array($query)) { ?>
                            <?php if ($p['id'] == $data_buku['id_penerbit']) { ?>
                            <option value="<?= $p['id'] ?>" selected><?= $p['nama_penerbit'] ?></option>
                            <?php } else { ?>
                            <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                            <?php } 
                        } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input class="form-control" type="number" name="tahun" id="tahun"
                            value="<?= $data_buku['tahun_terbit'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input class="form-control" type="text" name="penulis" id="penulis"
                            value="<?= $data_buku['penulis'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kd_buku">kd_buku</label>
                        <input class="form-control" type="text" name="kd_buku" id="kd_buku" value="<?= $data_buku['kd_buku'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <?php 
                            $query    =mysqli_query($db, "SELECT * FROM kategori");
                            while($k    =mysqli_fetch_array($query)) { ?>
                            <?php if ($k['id'] == $data_buku['id_kategori']) { ?>
                            <option value="<?= $k['id'] ?>" selected><?= $k['nama_kategori'] ?></option>
                            <?php }else { ?>
                            <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">


                    <div class="form-group">
                        <label for="cover">Cover Buku</label>
                        <div><img src="<?= BASEURL?>public/img/<?= $data_buku['cover']?>" width="100"></div>
                        <input class="form-control" type="file" name="cover" id="cover"
                            value="<?= $data_buku['cover'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripsi">Deskripsi</label>
                        <textarea class="form-control" name="descripsi" id="descripsi"
                            rows="10"><?= $data_buku['descripsi'] ?></textarea>
                    </div>

                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="edit">Ubah Buku</button>
            <a href="buku.php" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div>
<?php 
include 'footer.php';
?>