<?php
include "../config/function.php";

$id = $_GET['id'];

$query = mysqli_query($db, "delete from meminjam where id_pinjam='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='peminjaman.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='peminjaman.php'</script>\n";
}
?>