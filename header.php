
<div id="header-wrap" data-aos="fade">
	<div class="top-content">
		<div class="container">
			<div class="inner-content">
				<div class="grid">					
					<div class="social-links">
						<a id="output_tgl"></a>
						<a> | </a>
						<a id="output_jam"></a>

					</div>

					<div class="right-element">
						<div class="grid">
							<div class="user-account for-buy">
								<a href="index.php">
								<span>Beranda</span>
								</a>
							</div>

							<?php
								if(!isset($_SESSION['username'])){
							?>
							<div class="user-account for-buy">
								<a href="index.php?menu=login">
								<i class="icon icon-user"></i>
								<span>Masuk</span>
								</a>
							</div>
							<?php
								}else{
							?>
							<div class="user-account for-buy">
								<a href="index.php?menu=profil">
								<i class="icon icon-user"></i>
								<span><?=$_SESSION['username'];?></span>
								</a>
							</div>
							<?php
							    }
							?>

							<div class="user-account for-buy">
								<a href="index.php?menu=bukutamu">
								<i class="icon icon-clipboard"></i>
								<span>Buku Tamu</span>
								</a>
							</div>
							<!-- <div class="cart for-buy">
								<a href="#">
								<i class="icon icon-clipboard"></i>
								<span>My Book</span>
								</a>
							</div> -->

							<div class="search-bar">
								<a href="#" class="search-button search-toggle" data-selector="#header-wrap">
									<i class="icon icon-search"></i>
									<span>Cari</span>
								</a>
								<form role="search" method="get" class="search-box">
									<input class="search-field text search-input" placeholder="Pencarian Buku" type="search">
								</form>
							</div>
						</div><!--grid-->
					</div><!--top-right-->
				</div><!--grid-->
			</div>
		</div>
	</div><!--top-content-->

	<header id="header">
		<div class="container">
			<div class="inner-content">
				<div class="grid">
					<div class="main-logo">
						<!-- <a href=""><img src="images/main-logo.png" alt="logo"></a> -->
						<a href="index.php">
						<h2 class="banner-title">Perpustakaan Online  | MIN 16 Jakarta Timur</h2>
						</a>
					</div>

					<nav id="navbar">
						<div class="main-menu">
							<!-- <ul class="menu-list">
								<li class="menu-item active"><a href="#home" data-effect="Home">Home</a></li>
								<li class="menu-item"><a href="#about" class="nav-link" data-effect="About">About</a></li>
								<li class="menu-item"><a href="#pages" class="nav-link" data-effect="Pages">Pages</a></li>
								<li class="menu-item"><a href="#shop" class="nav-link" data-effect="Shop">Shop</a></li>
								<li class="menu-item"><a href="#articles" class="nav-link" data-effect="Articles">Articles</a></li>
								<li class="menu-item"><a href="#contact" class="nav-link" data-effect="Contact">Contact</a></li>
							</ul> -->

							<div class="hamburger">
				                <!-- <span class="bar"></span>
				                <span class="bar"></span>
				                <span class="bar"></span> -->
				            </div>

						</div>
					</nav>

				</div>
			</div>
		</div>
	</header>
		
</div>