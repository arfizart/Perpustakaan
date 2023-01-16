<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";
   $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['th_terbit'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $tanggal_masuk = $_POST['tgl_input'];
if (!empty($_FILES["nama_file"]["tmp_name"])) {
   $jenis_gambar = $_FILES['nama_file']['type'];
   
    

   if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
      $gambar = $namafolder . basename($_FILES['nama_file']['name']);
      if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
         $sql = "UPDATE `data_buku_perpus` SET `isbn` = '$isbn', `sampul` = '$gambar', `judul` = '$judul', `kategori` = '$kategori', `penerbit` = '$penerbit', `pengarang` = '$pengarang', `tahun_terbit` = '$tahun_terbit', `jumlah_buku` = '$jumlah_buku', `keterangan` = '$keterangan', `tanggal_masuk` = '$tanggal_masuk' WHERE id='$id'";
         $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
         echo "Gambar berhasil dikirim ke direktori" . $gambar;
         header('location:buku-perpus.php');
      } else {
         echo "<p>Gambar gagal dikirim</p>";
      }
   } else {
      echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
   $gambar = $_POST['foto_old'];
   // echo "Anda belum memilih gambar";
   $sql = "UPDATE `data_buku_perpus` SET `isbn` = '$isbn', `sampul` = '$gambar', `judul` = '$judul', `kategori` = '$kategori', `penerbit` = '$penerbit', `pengarang` = '$pengarang', `tahun_terbit` = '$tahun_terbit', `jumlah_buku` = '$jumlah_buku', `keterangan` = '$keterangan', `tanggal_masuk` = '$tanggal_masuk' WHERE id='$id'";
         $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   header("location:buku-perpus.php");
}
