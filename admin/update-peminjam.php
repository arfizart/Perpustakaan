<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";
    
 $id = $_POST['id'];
 $denda = $_POST['denda'];
 $status = $_POST['status'];
 $tgl_kembali = date('Y-m-d',strtotime($_POST['tgl_kembali']));

// echo "Anda belum memilih gambar";
$sql = "UPDATE `data_peminjam` SET `denda` = '$denda', `status` = '$status', `tgl_kembali` = '$tgl_kembali' WHERE `id`='$id'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
header("location:peminjam.php");

