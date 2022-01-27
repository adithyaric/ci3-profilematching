<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">

		</div>
		<!-- End Header -->
		<!-- Body -->
		<div class="section-body">
			<!-- End Body -->
			<div class="card">
				<div class="card-header">
					<h3>
						Hallo selamat datang <?php echo $this->session->userdata("nama"); ?> !
					</h3>
				</div>
				<div class="card-body">					
					<b>Langkah - langkah menggunakan program :</b>
					<p><?php echo $this->session->userdata("keterangan"); ?></p>
				</div>
			</div>
		</div>
</div>
</section>
</div>