<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman detail Bobot kriteria</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<div class="alert alert-light alert-has-icon">
				<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
				<div class="alert-body">
					<div class="alert-title">Penjelasan : </div>
					Bobot kriteria/ Nilai kriteria merupakan parameter berdasarkan kriterianya yang diberi sekala nilai
				</div>
			</div>
			<a href="<?php echo base_url()  . 'admin/bobotkriteria'; ?>"><button type="button" class="btn btn-primary">Tambah <i class="fa fa-plus-square"></i></button></a>
			<a href="<?php echo base_url()  . 'admin/kriteria'; ?>"><button type="button" class="btn btn-info">Kembali</button></a>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>Kriteria</th>
						<th>Nama Bobot Kriteria</th>
						<th>Nilai</th>
					</tr>
					<?php
					$no = 1;
					foreach ($bobot_kriteria as $key => $s) {
					?>
						<tr>
							<td><?= $no++ ?></td>
							<td>
								<?php
								$kriteria  = $this->m_data->edit_data($where, 'kriteria')->result();
								foreach ($kriteria as $k) :
								?>
								<?php
									echo $k->nama_kriteria;
								endforeach; ?>
							</td>
							<td>
								<input type="text" class="form-control" value="<?= $s->nama_bobotkriteria ?>" disabled>
							</td>
							<td><?= $s->nilai ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</section>
</div>