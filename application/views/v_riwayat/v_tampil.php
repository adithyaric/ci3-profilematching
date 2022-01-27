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
					<div class="alert alert-light alert-has-icon">
						<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
						<div class="alert-body">
							<div class="alert-title">Penjelasan : </div>
							Halaman Riwayat digunakan untuk melihat hasil perangkingan yang sudah dilakukan
							<ol>
								<li>Pilih tanggal lalu klik tombol Pilih</li>
								<li>lalu muncul hasil perangkingan</li>
							</ol>
							<p>
								Jika anda menggunakan Smartphone (<i class='fa fa-mobile'></i>) untuk melihat menu yang ada klik tombol
								<i class='fa fa-bars'></i>.
							</p>
						</div>
					</div>
					<?php if ($riwayat) {
						foreach ($riwayat as $rwt) {
						} ?>
						<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $rwt->id_keterangan) ?>')" href="#" class="btn btn-sm btn-danger">Hapus Riwayat <?php echo $rwt->tanggal; ?> <i class="fa fa-trash"></i></a>
						<hr>
						<h5>Target Ideal :</h5>
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th>Kriteria</th>
										<th>Jenis Kriteria</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $rwt->detail; ?>
								</tbody>
							</table>
						</div>
						<h5>Hasil rekomendasi bibit padi terbaik :</h5>
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th>Nama Bibit padi</th>
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