<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman Penilaian</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<div class="alert alert-light alert-has-icon">
				<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
				<div class="alert-body">
					<div class="alert-title">Penjelasan : </div>
					Ini merupakan halaman yang digunakan untuk mengelola Data Bibit padi
					<ul>
						<li>Untuk Menambahkan Bibit padi Klik Tombol Tambah <i class="fa fa-plus-square"></i></li>
						<li>Untuk Merubah Data bibit padi Klik Tombol Edit <i class="fa fa-edit"></i></li>
						<li>Untuk Menghapus Data bibit padi Klik Tombol Hapus <i class="fa fa-trash"></i></li>
					</ul>
					<p>Jika anda menggunakan Smartphone (<i class="fa fa-mobile"></i>) geser tabel ke-kiri untuk melihat data secara keseluruhan</p>
				</div>
			</div>
			<div class="card">
				<div class="card-body"><a href="<?php echo base_url()  . 'admin/nilai/tambah'; ?>"><button type="button" class="btn btn-primary">Tambah <i class="fa fa-plus-square"></i></button></a></div>
				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th colspan="4">Alternatif</th>
								<th>Action</th>
							</tr>
							<?php foreach ($alternatif as $key) :
								$where = array('id_alternatif' => $key->id_alternatif);
								$nilai_alternatif = $this->m_data->edit_data($where, 'nilai_alternatif')->result();
								if ($nilai_alternatif != NULL) :
							?>
									<tr>
										<td rowspan="<?php echo count($nilai_alternatif) + 1 ?>"><label for="<?= $key->id_alternatif ?>"><?= $key->nama_alternatif ?></label></td>
										<th>Kriteria</th>
										<th>Keterangan</th>
										<th>Nilai</th>
										<td rowspan="<?php echo count($nilai_alternatif) + 1 ?>">
											<center>
												<a href="<?php echo base_url()  . 'admin/nilai/edit/' . $key->id_alternatif; ?>" class="btn btn-sm btn-info">Edit <i class="fa fa-edit"></i></a>
												<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $key->id_alternatif) ?>')" href="#" class="btn btn-sm btn-danger">Hapus <i class="fa fa-trash"></i></a>
											</center>
										</td>
									</tr>
									<?php
									foreach ($nilai_alternatif as $index => $value) :
										$where = array('id_bobotkriteria ' => $value->id_bobotkriteria);
										$bobotkriteria  = $this->m_data->ambil_id($where, 'bobot_kriteria', $setJoinKriteria);
									?>
										<tr>
											<td><?= $bobotkriteria->nama_kriteria; ?></td>
											<td><?= $bobotkriteria->nama_bobotkriteria; ?></td>
											<td><?= $bobotkriteria->nilai; ?></td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>