<?php
$sldier_query = "select * from data_buku where tag='Slider' order by id";
$slider = mysqli_query($conn, $sldier_query) or die(mysqli_error($conn));
?>


<section id="billboard" class="pattern-overlay">
	<button class="prev slick-arrow">
		<i class="icon icon-arrow-left"></i>
	</button>

	<div class="main-slider">

		<?php while ($slider_data = mysqli_fetch_array($slider)) { ?>
		<div class="slider-item">
			<div class="banner-content" data-aos="fade-up">
				<h3 class="banner-title"><?=$slider_data['judul']?></h3>
				<p><?=$slider_data['pengarang']?></p>
				<div class="btn-wrap">
					<a href="baca.php?id=<?=$slider_data['id']?>" target="_blank" class="btn-outline-accent btn-accent-arrow">Baca<i class="icon icon-ns-arrow-right"></i></a>
				</div>
			</div><!--banner-content--> 
			<img src="<?=$slider_data['gambar']?>" alt="banner" class="banner-image">
		</div><!--slider-item-->

		<?php } ?>

		<!--slider-item-->
	</div><!--slider-->
		
	<button class="next slick-arrow">
		<i class="icon icon-arrow-right"></i>
	</button>
</section>