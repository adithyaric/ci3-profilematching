<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman Perhitungan</h1>
		</div>
		<!-- End Header -->
		<div class="alert alert-light alert-has-icon">
			<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			<div class="alert-body">
				<div class="alert-title">Penjelasan : </div>
				<ol>
					<li>Langkah pertama pilih kriteria sesuai kebutuhan (target ideal anda)</li>					
					<li>Tekan tombol Hitung <i class="fa fa-calculator"></i></li>					
				</ol>
			</div>
		</div>
		<?= $this->session->flashdata('pesan'); ?>
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<form action="<?php echo base_url() . $aksi . '/hasil'; ?>" method="post">
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th>Kriteria</th>
									<th>Keterangan</th>
								</tr>
								<?php foreach ($kriteria as $index => $key) :
									$where = array('id_kriteria' => $key->id_kriteria);
									$bobot_kriteria = $this->m_data->edit_data($where, 'bobot_kriteria')->result();
									if ($bobot_kriteria != NULL) : ?>
										<input type="text" name="jenis_kriteria[]" value="<?= $key->jenis_kriteria ?>" hidden>
										<input type="text" name="nama_kriteria[]" value="<?= $key->nama_kriteria ?>" hidden>
										<tr>
											<td>
												<label for="<?= $key->id_kriteria ?>"><?= $key->nama_kriteria ?></label>
											</td>
											<td>
												<select name="bobot_kriteria[]" id="" class=" form-control" required>
													<?php
													$input = array(1, 2, 2, 1, 3, 2, 3, 3);
													foreach ($bobot_kriteria as $s) : ?>
														<option <?php if ($s->nilai == $input[$index]) echo "selected"; ?> value="<?php echo $s->nilai; ?>">
															<?= $s->nama_bobotkriteria; ?>
														</option>
													<?php endforeach; ?>
												</select>
												<input type="text" name="nama_bobotkriteria[]" value="<?= $s->nama_bobotkriteria ?>" hidden>
											</td>
										</tr>
									<?php endif; ?>
								<?php endforeach; ?>
								<tr>
									<th><label for="">Core Factor : </label></th>
									<td>
										<input type="range" name="cf" value="60" min="50" max="100" oninput="this.nextElementSibling.value = this.value">
										<output>60</output>%
									</td>
								</tr>
								<tr>
									<th><label for="">Secondary Factor : </label></th>
									<td>
										<input type="range" name="sf" value="40" min="1" max="50" oninput="this.nextElementSibling.value = this.value">
										<output>40</output>%
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<button type="submit" class="btn btn-primary">Hitung <i class="fa fa-calculator"></i></button>
									</td>
								</tr>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>