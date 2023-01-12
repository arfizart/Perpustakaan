<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $th_terbit = $_POST['th_terbit'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $kategori = $_POST['kategori'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $tag = $_POST['tag'];
    $asal = $_POST['asal'];
    $tgl_input = $_POST['tgl_input'];
    $link_buku = $_POST['link_buku'];


    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "INSERT INTO data_buku_perpus VALUES
            (NULL,'$judul','$pengarang','$th_terbit','$penerbit','$isbn','$kategori','$tag','$jumlah_buku','$asal','$tgl_input','admin/$gambar','$link_buku')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo "Gambar berhasil dikirim ke direktori" . $gambar;
            echo "<h3><a href='input-buku.php'> Input Lagi</a></h3>";
            echo "<h3><a href='buku.php'> Data Buku</a></h3>";
        } else {
            echo "<p>Gambar gagal dikirim</p>";
        }
    } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
    }
} else {
    echo "Anda belum memilih gambar";
}
