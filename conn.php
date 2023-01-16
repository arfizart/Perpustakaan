<?php
$db_name = "db_perpuspro";

// $conn = mysqli_connect("localhost", "root", "");
// mysqli_select_db($conn, "db_perpuspro");

$host = "localhost";
$db = "db_perpuspro";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);


//fungsi format rupiah 
function format_rupiah($rp) {
	$hasil = "Rp. " . number_format($rp, 0, "", ".");
	return $hasil;
 }
//fungsi pinjaman buku terlambat    
function selisih_tanggal($dateline, $kembali){
$tgl_dateline = explode('-', $dateline);
$tgl_dateline = $tgl_dateline[2].'-'.$tgl_dateline[1].'-'.$tgl_dateline[0];

$tgl_kembali = explode('-', $kembali);
$tgl_kembali = $tgl_kembali[2].'-'.$tgl_kembali[1].'-'.$tgl_kembali[0];

$selisih = strtotime($dateline) - strtotime($kembali);
$selisih = $selisih / 86400;

if ($selisih >= 1) {
$hasil = $selisih;
} else {
$hasil = 0;
}
return $hasil;
}



?>
