<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysqli_query($conn, "DELETE FROM data_buku_perpus WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'buku-perpus.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'buku-perpus.php'</script>";	
}
