<?php
$namafolder = "gambar_anggota/"; //tempat menyimpan file

include "../conn.php";
	$id = $_POST['id'];
	$no_induk = $_POST['no_induk'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];

	$password = $_POST['password'];

	if(empty($password)){
		$password = $_POST['password_old'];
	}


	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];
	$foto = $_POST['foto'];

if (!empty($_FILES["nama_file"]["tmp_name"])) {
	$jenis_gambar = $_FILES['nama_file']['type'];
	

	if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql = "UPDATE data_anggota SET no_induk='$no_induk', nama='$nama', username='$username', password='$password', jk='$jk', kelas='$kelas', ttl='$ttl', alamat='$alamat', foto='$gambar' WHERE id='$id'";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			echo "Gambar berhasil dikirim ke direktori" . $gambar;
			echo "<h3><a href='anggota.php'> Input Lagi</a></h3>";
		} else {
			echo "<p>Gambar gagal dikirim</p>";
		}
	} else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	}
} else {
	$sql = "UPDATE data_anggota SET no_induk='$no_induk', nama='$nama', username='$username', password='$password', jk='$jk', kelas='$kelas', ttl='$ttl', alamat='$alamat', foto='$foto' WHERE id='$id'";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	header("location:anggota.php");
}
