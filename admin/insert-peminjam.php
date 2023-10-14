<?php

include "../conn.php";

$id = $_POST['id'];
$id_anggota = $_POST['kdAnggota'];
$id_buku_perpus = $_POST['kdBuku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];


$sql = "INSERT INTO  `data_peminjam` (`id`, `id_anggota`, `id_buku_perpus`, `tgl_pinjam`, `tgl_pengembalian`, `denda`, `status`, `tgl_kembali`) VALUES
        ('$id','$id_anggota','$id_buku_perpus','$tgl_pinjam','$tgl_pengembalian','0','0',NULL)";
		$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
header("location:peminjam.php");
