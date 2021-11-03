<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Detail Data</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<a href="<?php echo base_url()  . 'admin/nilai'; ?>"><button type="button" class="btn btn-info">Kembali</button></a>
			<?php foreach ($alternatif as $x) { ?>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<tr>
							<th>Alternatif</th>
							<td colspan="2">
								<?= $x->nama_alternatif; ?>
							</td>
						</tr>
						<tr>
							<th>Kriteria</th>
							<th>Nama Subkriteria</th>
							<th>Nilai</th>
						</tr>
						<?php
						foreach ($nilai_alternatif as $index => $value) :
							$where = array('id_subkriteria ' => $value->id_subkriteria);
							$sub_kriteria  = $this->m_data->edit_data($where, 'sub_kriteria')->result();
							foreach ($sub_kriteria as $s) :
						?>
								<tr>
									<td>
										<?= $kriteria[$index]->nama_kriteria; ?>
										<?php
										if ($kriteria[$index]->jenis_kriteria == 'core') {
											echo '<b>(Core factor)</b>';
										} else {
											echo '<b>(Secondary factor)</b>';
										}
										?>
									</td>
									<td>
										<?= $s->nama_subkriteria; ?>
									</td>
									<td><?= $s->nilai; ?></td>
								</tr>
						<?php endforeach;
						endforeach; ?>
						<tr>
							<td>Keterangan</td>
							<td colspan="2">
								<input type="text" class="form-control" value="<?= $x->detail; ?>" disabled>
							</td>
						</tr>
					</table>
				</div>
			<?php } ?>
		</div>
	</section>
</div>