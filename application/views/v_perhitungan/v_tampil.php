<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Hasil Perhitungan SPK</h1>
		</div>
		<!-- End Header -->
		<div class="alert alert-light alert-has-icon">
			<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			<div class="alert-body">
				<div class="alert-title">Penjelasan : </div>
				<p>Ini merupakan bagian hasil perhitungan menggunakan metode GAP</p>
				<ol>
					<li>Untuk melihat perhitungan menggunakan SPK metode GAP klik tombol "Perhitungan SPK <i class="fa fa-calculator"></i>"</li>
					<li>Tekan tombol Simpan <i class="fas fa-save"></i> untuk menyimpan hasil perangkingan berdasarkan tanggal</li>
				</ol>
				<p>
					Jika anda menggunakan Smartphone (<i class='fa fa-mobile'></i>) untuk melihat menu yang ada klik tombol
					<i class='fa fa-bars'></i>.
				</p>
			</div>
		</div>
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<?php if (isset($hasil)) : ?>
						<!-- Detail -->
						<details>
							<summary class="btn btn-primary">Perhitungan SPK <i class="fa fa-calculator"></i></summary>
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<?php foreach ($kriteria as $h) : ?>
												<?= '<th>' . $h->nama_kriteria . '</th>'; ?>
											<?php endforeach; ?>
										</tr>
									</thead>
									<tbody>
										<!-- Nilai Profil -->
										<?php $count = 1;
										foreach ($nama as $key => $value) :
											$where = array('id_alternatif ' => $value->id_alternatif);
											$nilai_alternatif  = $this->m_data->edit_data($where, 'nilai_alternatif')->result();
											echo '
									<tr>
										<td>' . $count . '</td>
										<td>' . $value->nama_alternatif . '</td>';
											foreach ($nilai_alternatif as $key => $value) {
												$where2 = array('id_bobotkriteria ' => $value->id_bobotkriteria);
												$bobot_kriteria  = $this->m_data->edit_data($where2, 'bobot_kriteria')->result();
												foreach ($bobot_kriteria as $s) :
													echo '<td>' . $s->nama_bobotkriteria . '</td>';
												endforeach;
											}
											echo '</tr>';
											$count++;
										endforeach; ?>
									</tbody>
								</table>
							</div>
							<!--  -->
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<?php foreach ($kriteria as $h) : ?>
												<?= '<th>' . $h->nama_kriteria . '</th>'; ?>
											<?php endforeach; ?>
										</tr>
									</thead>
									<tbody>
										<!-- Nilai Profil -->
										<?php $count = 1;
										foreach ($hasil->alt_aspek as $key => $value) :
											echo '
									<tr>
										<td>' . $count . '</td>
										<td>' . $nama[$key]->nama_alternatif . '</td>';
											for ($i = 0; $i < count($value); $i++) {
												echo '<td>' . $value[$i] . '</td>';
											}
											echo '</tr>';
											$count++;
										endforeach; ?>
										<!-- Target -->
										<tr>
											<th colspan="2">Target</th>
											<?php foreach ($hasil->aspek_nilai as $key => $value) : ?>
												<?= '<th>' . $value . '</th>'; ?>
											<?php endforeach; ?>
										</tr>
										<!-- Selisih -->
										<?php $count = 1;
										foreach ($hasil->gap_aspek as $key => $value) :
											echo '
									<tr>
										<td>' . $count . '</td>
										<td>' . $nama[$key]->nama_alternatif . '</td>';
											for ($i = 0; $i < count($value); $i++) {
												echo '<td>' . $value[$i] . '</td>';
											}
											echo '</tr>';
											$count++;
										endforeach; ?>
									</tbody>
								</table>
							</div>
							<!--  -->
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<tr>
										<td colspan="3">
											<center>Pembobotan</center>
										</td>
									</tr>
									<tr>
										<th>Selisih</th>
										<th>Bobot</th>
										<th>Keterangan</th>
									</tr>
									<?php
									foreach ($hasil->selisih as $key => $value) :
									?>
										<?= '<tr><td>' . $value . '</td><td>' . $hasil->bobot_nilai[$key] . '</td><td>' . $hasil->keterangan[$key] . '</td></tr>'; ?>
									<?php endforeach; ?>
								</table>
							</div>
							<!--  -->
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<td>No</td>
											<td>Nama</td>
											<?php foreach ($kriteria as $h) : ?>
												<td>
													<?= $h->nama_kriteria . '<br>';
													if ($h->jenis_kriteria == 'core') {
														echo '<b>(Core factor)</b>';
													} else {
														echo '<b>(Secondary factor)</b>';
													}
													?>
												</td>
											<?php endforeach; ?>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1;
										foreach ($hasil->bobot_aspek as $key => $value) :
											echo '
									<tr>
										<td>' . $count . '</td>
										<td>' . $nama[$key]->nama_alternatif . '</td>';
											for ($i = 0; $i < count($value); $i++) {
												echo '<td>' . $value[$i] . '</td>';
											}
											echo '
									</tr>';
											$count++;
										endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<td>No</td>
											<td>Nama</td>
											<th>CF <?php echo $hasil->cf * 100; ?>%</th>
											<th>SF <?php echo $hasil->sf * 100; ?>%</th>
											<th>Hasil Akhir</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1;
										foreach ($hasil->bobot_aspek as $key => $value) :
											echo '
									<tr>
										<td>' . $count . '</td>
										<td>' . $nama[$key]->nama_alternatif . '</td>';
											echo '
										<td>' . number_format($hasil->ncf_aspek[$key], 2) . '</td>
										<td>' . number_format($hasil->nsf_aspek[$key], 2) . '</td>
										<td>' . number_format($hasil->total_aspek[$key], 2) . '</td>
									</tr>';
											$count++;
										endforeach; ?>
									</tbody>
								</table>
							</div>
						</details>
						<!-- End of Detail -->
						<br>
						<form action="<?php echo base_url('admin/riwayat/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
							<div class="alert alert-warning alert-dismissible show fade">
								<div class="alert-body">
									<button class="close" data-dismiss="alert">
										<span>&times;</span>
									</button>
									<i class="fa fa-exclamation-triangle"></i> Perlu diingat, keputusan dari sistem hanya bersifat rekomendasi terbaik, keputusan kembali kepada petani
								</div>
							</div>
							<center>Hasil Analisa Menggunakan Sistem Pendukung Keputusan (SPK) Metode Profile Matching</center>
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th>Rangking</th>
											<th>Nama</th>
											<th>Nilai Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$count = 1;
										foreach ($hasil->hasilakhir as $key3 => $value3) { ?>
											<tr>
												<td>
													<?php echo $count; ?>
												</td>
												<td>
													<?php echo $nama[$key3]->nama_alternatif; ?>
												</td>
												<td>
													<?php echo number_format($hasil->total_aspek[$key3], 2); ?>
													<input type="text" name="nama_alternatif[]" value="<?php echo $nama[$key3]->nama_alternatif; ?>" hidden>
													<input type="text" name="nilai[]" value="<?php echo number_format($hasil->total_aspek[$key3], 2); ?>" hidden>
													<input type="text" name="rangking[]" value="<?php echo $count; ?>" hidden>
												</td>
											</tr>
										<?php $count++;
										} ?>
										<tr>
											<td colspan="3" align="right">
												<button type="submit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
												<label class="btn btn-sm btn-info "><i class="fas fa-calendar"></i> <?php echo date('d-m-Y'); ?></label>
												<textarea name="keterangan" hidden>
													<?php
													foreach ($nama_kriteria as $index => $nilainya) {
														// echo $nilainya . " (" . $jenis_kriteria[$index] . ") : " . $nama_bobotkriteria[$index] . ", <br>";
														echo "<tr>";
														echo "<td>" . $nilainya . "</td>";
														echo "<td>" . $jenis_kriteria[$index] . "</td>";
														echo "<td>" . $nama_bobotkriteria[$index] . "</td>";
														echo "</tr>";
													}
													?>
													<tr>
														<td>
															<b>Bobot Core & Secondary Factor :</b>
														</td>
														<td>
															Core Factor : <?= $cf; ?>%
														</td>
														<td>
															Secondary Factor : <?= $sf; ?>%
														</td>
													</tr>
												</textarea>
												<input type="text" name="tanggal" value="<?php echo date('Y-m-d'); ?>" hidden>
												<input type="text" name="user_id" value="<?php echo $this->session->userdata("user_id"); ?>" hidden>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>