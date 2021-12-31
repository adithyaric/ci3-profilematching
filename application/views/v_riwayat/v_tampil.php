<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman Riwayat</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<form method="get">
						<label>Pilih Tanggal : </label>
						<input type="date" name="tanggal">
						<input type="submit" value="Pilih" class="btn btn-primary">
						<a href="<?php echo base_url('admin/riwayat/'); ?>" class="btn btn-info">Reset</a>
					</form>
				</div>
				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<?php if ($riwayat) {
						foreach ($riwayat as $rwt) : ?>
						<?php endforeach; ?>
						<div class="alert alert-light alert-has-icon">
							<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
							<div class="alert-body">
								<div class="alert-title">Penjelasan : </div>
								<h4>Target ideal : </h4>
								<p for=""><?php echo $rwt->detail; ?></p>
							</div>
						</div>
						<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $rwt->id_keterangan) ?>')" href="#" class="btn btn-sm btn-danger">Hapus Riwayat <?php echo $rwt->tanggal; ?> <i class="fa fa-trash"></i></a>
						<br><br>
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th>Nama Alternatif</th>
									<th>Nilai total</th>
									<th>Rangking</th>
								</tr>
								<?php

								foreach ($riwayat as $r) {
								?>
									<tr>
										<td><?php echo $r->nama_alternatif ?></td>
										<td><?php echo $r->nilai ?></td>
										<td><?php echo $r->rangking ?></td>
									</tr>
								<?php }
							} else { ?>
								<tr>
									<td colspan="4">
										<center>Kosong...</center>
									</td>
								</tr>
							<?php
							} ?>
							</table>
						</div>
				</div>
			</div>
		</div>
	</section>
</div>