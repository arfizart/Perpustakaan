<?php
include "conn.php";
$nama        = $_POST['nama'];
$jk 		 = $_POST['jk'];
$kelas 	     = $_POST['kelas'];
$perlu1 	 = $_POST['perlu1'];
$cari 	     = $_POST['cari'];
$saran	     = $_POST['saran'];
// $tgl_ = date_create($_POST['tgl_kunjung']);
// $tgl_kunjung = date_format($tgl_,"Y/d/m");
$tgl_kunjung = $_POST['tgl_kunjung'];
$jam_kunjung = $_POST['jam_kunjung'];

//if( empty($nama) || empty($jk) || empty($kelas) || empty($perlu) || empty($cari) || empty($saran) ){
    //echo "<b>Data Harus Di isi.!!!</b>";
//}else{

$sql = "INSERT INTO pengunjung(id, nama, jk, kelas, perlu1, cari, saran, tgl_kunjung, jam_kunjung) VALUES (NULL, '$nama', '$jk', '$kelas', '$perlu1', '$cari', '$saran', '$tgl_kunjung', '$jam_kunjung')";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
echo "<script>window.location = 'index.php?menu=bukutamu'</script>";	

// $query = mysqli_query($conn, "INSERT INTO pengunjung (id, nama, jk, kelas, perlu1, cari, saran, tgl_kunjung, jam_kunjung) VALUES ()");
// if ($query){
// 	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'index.php'</script>";	
// } else {
// 	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>";	
// }
//}

?>
