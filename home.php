<?php include "slider.php" ?>

<!-- <section id="client-holder" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="inner-content">
				<div class="logo-wrap">
					<div class="grid">
						<a href="#"><img src="images/client-image1.png" alt="client"></a>
						<a href="#"><img src="images/client-image2.png" alt="client"></a>
						<a href="#"><img src="images/client-image3.png" alt="client"></a>
						<a href="#"><img src="images/client-image4.png" alt="client"></a>
						<a href="#"><img src="images/client-image5.png" alt="client"></a>
					</div>
				</div>image-holder
			</div>
		</div>
	</div>
</section> -->

<section id="featured-books" class="bookshelf">
	<div class="container">
		<div class="row">
			<div class="inner-content">

			<div class="section-header align-center">
				<div class="title">
					<span>Some quality items</span>
				</div>
				<h2 class="section-title">Featured Books</h2>
			</div>

			<div class="product-list" data-aos="fade-up">
				<div class="product-grid">		

					<?php
					$pbook = "SELECT * FROM kategori_buku INNER JOIN data_buku ON kategori_buku.id_kategori = data_buku.kategori and data_buku.tag = 'Utama' order by data_buku.id";
					$pbookdata = mysqli_query($conn, $pbook) or die(mysqli_error($conn));
					?>
			
					<?php while ($pbook_data = mysqli_fetch_array($pbookdata)) { ?>
					<figure class="product-style"><a href="baca.php?id=<?=$pbook_data['id']?>" target="_blank">
						<img src="upload/pdf/<?=$pbook_data['gambar']?>" width="100%" alt="<?=$pbook_data['judul']?>" class="product-item">
						
							<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Baca</button>
						
						<figcaption>
							<h3><?=$pbook_data['judul']?></h3>
							<p><?=$pbook_data['pengarang']?></p>
							<div class="item-price"><?=$pbook_data['nama_kategori']?></div>
						</figcaption></a>
					</figure>
				
					<?php } ?>

					

			    </div><!--ft-books-slider-->				
			</div><!--grid-->

			

			</div><!--inner-content-->
		</div>
	</div>
</section>


<section id="popular-books" class="bookshelf">
	<div class="container">
	<div class="row">
		<div class="inner-content">

			<div class="section-header align-center">
				<div class="title">
					<span>Some quality items</span>
				</div>
				<h2 class="section-title">Collection Books</h2>
			</div>

			<?php
			$kategoriBuku = "select * from kategori_buku";
			$listKategori = mysqli_query($conn, $kategoriBuku) or die(mysqli_error($conn));
			?>
   			
			<ul class="tabs">
				<li data-tab-target="#all" class="active tab">All</li>
				<?php while ($dataKategori = mysqli_fetch_array($listKategori)) { ?>
			  	<li data-tab-target="#" class="tab"><?=$dataKategori['nama_kategori']?></li>
		    	<?php } ?>
			</ul>
			<div class="tab-content">


			  <div id="all" data-tab-content class="active" data-aos="fade-up">
			  	<div class="grid">
			  		<?php
					$Buku = "SELECT * FROM data_buku,kategori_buku WHERE data_buku.kategori = kategori_buku.id_kategori AND data_buku.tag='' LIMIT 0,8";
					$listBuku = mysqli_query($conn, $Buku) or die(mysqli_error($conn));
					?>
					<?php while ($dataBuku = mysqli_fetch_array($listBuku)) { ?>
				  	<figure class="product-style">
				  		<a href="baca.php?id=<?=$dataBuku['id']?>" target="_blank">
						<img src="upload/pdf/<?=$dataBuku['gambar']?>" alt="Books" class="product-item">
						<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Baca</button>
						<figcaption>
							<h3><?=$dataBuku['judul']?></h3>
							<p><?=$dataBuku['pengarang']?></p>
							<div class="item-price"><?=$dataBuku['nama_kategori']?></div>
						</figcaption></a>
					</figure>
					<?php } ?>
				  	

		    	 </div>

			  </div>
			  

			  

			</div>
			<div class="btn-wrap align-right">
				<a href="#" class="btn-accent-arrow">View all Books <i class="icon icon-ns-arrow-right"></i></a>
			</div>
		</div><!--inner-tabs-->


			
		</div>
	</div>
</section>