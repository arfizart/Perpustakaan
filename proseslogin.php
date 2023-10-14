<?php
include("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$next = $_POST['next'];

if ($level == 'admin') {

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	if (empty($username) && empty($password)) {
		header('location:index.php?menu=login&?error=empty');
	} else if (empty($username)) {
		header('location:index.php?menu=login&?error=usname');
	} else if (empty($password)) {
		header('location:index.php?menu=login&?error=pwd');
	} else {
		header('location:index.php');

		$q = mysqli_query($conn, "select * from admin where username='$username'");
		$row = mysqli_fetch_array($q);

		if (mysqli_num_rows($q) == 1) {


			$hash = $row['password'];

			if (password_verify($_POST['password'], $hash)) {
			    $_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $username;
				$_SESSION['fullname'] = $row['fullname'];
				$_SESSION['gambar'] = $row['gambar'];
				$_SESSION['class'] = 'admin';
				if(empty($next)){
					header('location:admin/');
				}else{
					header("location:baca.php?id=$next");
				}
			} else {
			    $valid = 'Invalid password.';
				header("location:index.php?menu=login&?error=$valid");
			}

				
			


			
		} else {
			header("location:index.php?menu=login&?error=pwderror");
		}
	}
} else {
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	if (empty($username) && empty($password)) {
		header('location:index.php?menu=login&?error=1');
	} else if (empty($username)) {
		header('location:index.php?menu=login&?error=2');
	} else if (empty($password)) {
		header('location:index.php?menu=login&?error=3');
	} else {
		header('location:index.php');

		$q = mysqli_query($conn, "select * from data_anggota where username='$username'");
		$row = mysqli_fetch_array($q);

		if (mysqli_num_rows($q) == 1) {

			$hash = $row['password'];

			if (password_verify($_POST['password'], $hash)) {

				$_SESSION['id'] = $row['id'];
				$_SESSION['no_induk'] = $row['no_induk'];
				$_SESSION['fullname'] = $row['nama'];
				$_SESSION['username'] = $username;
				$_SESSION['jk'] = $row['jk'];
				$_SESSION['kelas'] = $row['kelas'];
				$_SESSION['ttl'] = $row['ttl'];
				$_SESSION['alamat'] = $row['alamat'];
				$_SESSION['foto'] = $row['gambar'];
				$_SESSION['class'] = 'anggota';

				if(empty($next)){
					header('location:index.php');
				}else{
					header("location:baca.php?id=$next");
				}

			}
		} else {
			header('location:index.php?menu=login&?error=4');
		}
	}
}
