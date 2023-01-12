<section id="client-holder" data-aos="fade-up">
	<div class="container" style="padding: 100px;">
		<section class="panel">
            <header class="panel-heading">
                <b>Profile</b>
            </header>

            <?php if($_SESSION['class']=='admin'){

            ?>
            <div class="panel-body">
                    <a href="admin/index.php">Admin Panel</a>
             
            </div>
            <?php } ?>
            <div class="panel-body">
                    <a href="logout.php">Logout</a>
             
            </div>
        </section>
	</div>
</section>