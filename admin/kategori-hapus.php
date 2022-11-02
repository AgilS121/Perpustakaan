<?php
include '../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    die ("Tidak ada ID yang dipilih Silakan cek kembali! ");    
}

if (!empty($id) && $id != "") {
    $hapus =mysqli_query($db, "DELETE FROM kategori WHERE id='$id'");
    echo "
            <script>
            alert('Delete data berhasil');
            document.location='kategori.php';
            </script>
            ";
        
}