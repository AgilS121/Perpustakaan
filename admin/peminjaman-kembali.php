<?php
include "../config/config.php";

$tgl = date('Y-m-d');

$query = mysqli_query($db, "UPDATE meminjam SET tgl_kembali  = '$tgl', kembali = '2'
          where id_pinjam ='$_GET[id]'");
if ($query) {
echo "<script>alert('Buku Sudah Dikembalikan');
document.location.href='peminjaman.php'</script>\n";
} else {
echo "<script>alert('gagal');
document.location.href='peminjaman.php'</script>\n";
}
?>