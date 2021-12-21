<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Judul Halaman</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<?php if (isset($hasil)) : ?>
						<!--  -->
						<details>
							<summary class="btn btn-primary">Perhitungan <i class="fa fa-calculator"></i></summary>
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
												$where2 = array('id_subkriteria ' => $value->id_subkriteria);
												$sub_kriteria  = $this->m_data->edit_data($where2, 'sub_kriteria')->result();
												foreach ($sub_kriteria as $s) :
													echo '<td>' . $s->nama_subkriteria . '</td>';
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
											for ($i = 0; $i < count($value); $i++) {
												echo '<td>' . $value[$i] . '</td>';
											}
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
						<!--  -->
						<center>Hasil Analisa Menggunakan Sistem Pendukung Keputusan (SPK) Metode Profile Matching</center>
						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th>Rangking</th>
									<th>Nama</th>
									<th>Nilai Profile Matching</th>
								</tr>
								<?php
								$count = 1;
								// arsort($hasil->total_aspek);
								// arsort($hasil->cf_aspek);
								// echo '$array1 : <pre>' . print_r($hasil->total_aspek, true) . '</pre>';
								// echo '$array2 : <pre>' . print_r($hasil->cf_aspek, true) . '</pre>';
								foreach ($hasil->total_aspek as $key => $value) {
									$combine[$key] = $hasil->cf_aspek[$key];
									array_push($combine[$key], $hasil->total_aspek[$key]);
									// array_push($hasil->cf_aspek[$key], $hasil->total_aspek[$key]);									
									// echo '
									// <tr>
									// <td>' . $count . '</td>
									// <td>' . $nama[$key]->nama_alternatif . '</td>
									// <td>' . $key . ' - ' . number_format($value, 2) . '</td>
									// </tr>
									// ';
									$count++;
								}
								$count2 = 1;
								$keys = array_keys($combine);
								$sort = array();
								foreach ($combine as $key2 => $value2) {
									$sort['0'][$key2] = $value2['0'];
									$sort['1'][$key2] = $value2['1'];
									$sort['2'][$key2] = $value2['2'];
									$sort['3'][$key2] = $value2['3'];
								}
								array_multisort($sort['3'], SORT_DESC, $sort['2'], SORT_DESC, $sort['0'], SORT_DESC, $sort['1'], SORT_DESC, $combine, $keys);
								$hasilakhir = array_combine($keys, $combine);
								// echo '$hasilakhir : <pre>' . print_r($hasilakhir, true) . '</pre>';
								// die();
								foreach ($hasilakhir as $key3 => $value3) {
									echo '									
									<tr>
									<td>' . $count2 . '</td>
									<td>' . $nama[$key3]->nama_alternatif . '</td>
									<td>' . number_format($hasil->total_aspek[$key3], 2) . '</td>
									</tr>
									';
									$count2++;
								}
								?>
							</table>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>