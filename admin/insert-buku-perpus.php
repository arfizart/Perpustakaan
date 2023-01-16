<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";
    
if(isset($_POST['id'])){

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

            $sql = "INSERT INTO data_buku_perpus (`id`, `isbn`, `sampul`, `judul`, `kategori`, `penerbit`, `pengarang`, `tahun_terbit`, `jumlah_buku`, `keterangan`, `tanggal_masuk`) VALUES
            ('$id', '$isbn', '$gambar', '$judul', '$kategori', '$penerbit', '$pengarang', '$tahun_terbit', '$jumlah_buku', '$keterangan', '$tanggal_masuk')";
            $res = mysqli_query($conn, $sql);


            echo "Gambar berhasil dikirim ke direktori" . $gambar;
            header('Location: buku-perpus.php');
        } else {
            echo "<p>Gambar gagal dikirim</p>";
        }
    } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
    }
} else {
    // echo "Anda belum memilih gambar";
    $sql = "INSERT INTO data_buku_perpus (`id`, `isbn`, `sampul`, `judul`, `kategori`, `penerbit`, `pengarang`, `tahun_terbit`, `jumlah_buku`, `keterangan`, `tanggal_masuk`) VALUES
            ('$id', '$isbn', 'gambar_admin/avatar.jpg', '$judul', '$kategori', '$penerbit', '$pengarang', '$tahun_terbit', '$jumlah_buku', '$keterangan', '$tanggal_masuk')";
            $res = mysqli_query($conn, $sql);
            header('Location: buku-perpus.php');
}


}else{
    header('Location: input-perpus.php');
}

