<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Edit Data</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<form action="<?php echo base_url() . $aksi . '/edit_aksi'; ?>" method="post">
				<?php foreach ($alternatif as $x) { ?>
					<?php foreach ($nilai_alternatif as $n) { ?>
						<input type="hidden" name="id_nilai[]" value="<?= $n->id_nilai; ?>">
						<input type="hidden" name="id_alternatif[]" value="<?= $x->id_alternatif; ?>">
					<?php } ?>
				<?php } ?>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<tr>
							<th>Nama Bibit padi</th>
							<td colspan="2">
								<input type="hidden" name="id" value="<?= $x->id_alternatif; ?>">
								<input type="text" class="form-control" name="nama" value="<?= $x->nama_alternatif; ?>" placeholder="Nama Bibit padi" required>
							</td>
						</tr>
						<tr>
							<th>Kriteria</th>
							<th>Keterangan</th>
						</tr>
						<?php
						foreach ($nilai_alternatif as $index => $value) :
							$where1 = array('id_bobotkriteria ' => $value->id_bobotkriteria);
							$sub_kriteria1  = $this->m_data->edit_data($where1, 'bobot_kriteria')->result();
							$where2 = array('id_kriteria' => $kriteria[$index]->id_kriteria);
							$sub_kriteria2 = $this->m_data->edit_data($where2, 'bobot_kriteria')->result();
							foreach ($sub_kriteria1 as $s1) :
						?>
								<tr>
									<td><?php echo $kriteria[$index]->nama_kriteria; ?></td>
									<td>
										<select name="bobot_kriteria[]" class="form-control" id="" required>
											<?php foreach ($sub_kriteria2 as $s2) : ?>
												<option <?php if ($s1->id_bobotkriteria == $s2->id_bobotkriteria) echo "selected"; ?> value="<?php echo $s2->id_bobotkriteria; ?>">
													<?= $s2->nama_bobotkriteria . ' | '; ?>
												</option>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>
						<?php endforeach;
						endforeach; ?>
						<tr>
							<td colspan="2">
								<button type="submit" class="btn btn-primary" value="Simpan">Simpan <i class="fas fa-save"></i></button>
								<a href="<?php echo base_url()  . 'admin/nilai'; ?>"><button type="button" class="btn btn-info">Kembali</button></a>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</section>
</div>