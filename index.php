<?php 
include "conn.php"; 
session_start();
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Perpustakaan | min16jakarta.sch.id</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">

	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

	    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	    <link rel="stylesheet" type="text/css" href="css/vendor.css">
	    <link rel="stylesheet" type="text/css" href="style.css">


	    <link rel="icon" type="icon/ico" href="favicon.ico">



		<!-- script
		================================================== -->
		<script src="js/modernizr.js"></script>
		<script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()", 1000);
        function waktu() {
            var isoDateString = new Date();
            var gmt = isoDateString.toLocaleString('id-ID', { timeZone: 'asia/jakarta' })

            var tanggal = gmt.split(" ");
            var tgl = tanggal[0].split('/');
            var d = tgl[0];
            var m = tgl[1];
            var y = tgl[2];
            var jam = tanggal[1].split('.');


            tgl_now = d+"/"+m+"/"+y;
            jam_now = jam[0] + ":" + jam[1] + ":" + jam[2];

            setTimeout("waktu()", 1000);
            document.getElementById("output_jam").innerHTML = jam_now;
            // document.getElementById("jam_kunjung").value = jam_now;
            
            // console.log(tanggal[1]);
        }
    </script>
    <script language="JavaScript">
    	function tanggal (){
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
        document.getElementById("output_tgl").innerHTML = tanggallengkap;
    	}

    	function quoteofday (){
    		const settings = {
			  "async": true,
			  "crossDomain": true,
			  "url": "https://type.fit/api/quotes",
			  "method": "GET"
			}

			$.ajax(settings).done(function (response) {
			  const data = JSON.parse(response);
			  const random = Math.floor(Math.random() * 1000);
			  document.getElementById("output_quote").innerHTML = data[random].text;
			  document.getElementById("output_author").innerHTML = data[random].author;
			});
    	}

    	function runcode(){
    		tanggal();
    		quoteofday()
    	}
    </script>
	</head>

<body onload="runcode();">

<!-- <div id="entire-wrapper"> -->

<?php include "header.php" ?>
<!--header-wrap-->



<?php 

if(!isset($_GET['menu'])){
	include "home.php";
}else if($_GET['menu']=='login'){
	include "login.php";
}else if($_GET['menu']=='bukutamu'){
	include "bukutamu.php";
}else if($_GET['menu']=='profil'){
	include "profile.php";
}else{

}
?>

<section id="quotation" class="align-center">
	<div class="inner-content">
		<h2 class="section-title divider">Quote of the day</h2>
		<blockquote data-aos="fade-up">
			<q><span id='output_quote'></span></q>
			<div class="author-name"><span id='output_author'></span></div>			
		</blockquote>
	</div>		
</section>




<div id="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="inner-content">
				<div class="copyright">
					<div class="grid">
						<!-- Template by <a href="https://www.templatesjungle.com/" target="_blank">Templates Jungle</a> &  -->
						<p>© <?= date("Y")?> All rights reserved. Development by <a href="https://ddterakhir.com/" target="_blank">DDTERAKHIR</a></p>
						<div class="social-links">
							<!-- <ul>
								<li>
									<a href="#"><i class="icon icon-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-youtube-play"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-behance-square"></i></a>
								</li>
							</ul> -->
						</div>
					</div>
				</div><!--grid-->
			</div><!--footer-bottom-content-->			
		</div>
	</div>
</div>

<!-- </div>   -->

	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/slideNav.min.js"></script>
	<script src="js/slideNav.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>	

</body>
</html>	