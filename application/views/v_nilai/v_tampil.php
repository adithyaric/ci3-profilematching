<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Judul Halaman</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<form action="<?= base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<tr>
							<th>Nama Alternatif</th>
							<td>
								<select name="id_alternatif" id="" class=" form-control" required>
									<option value="">--Pilih Alternatif--</option>
									<?php foreach ($alternatif as $a) : ?>
										<option value="<?= $a->id_alternatif; ?>"><?= $a->nama_alternatif; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Kriteria</th>
							<th>Nama Subkriteria</th>
						</tr>
						<?php foreach ($kriteria as $key) :
							$where = array('id_kriteria' => $key->id_kriteria);
							$sub_kriteria = $this->m_data->edit_data($where, 'sub_kriteria')->result();
							if ($sub_kriteria != NULL) : ?>
								<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
								<tr>
									<td>
										<label for="<?= $key->id_kriteria ?>"><?= $key->nama_kriteria ?></label>
									</td>
									<td>
										<select name="sub_kriteria[]" id="" class=" form-control" required>
											<option value=""> --- Pilih --- </option>
											<?php foreach ($sub_kriteria as $s) : ?>
												<option value="<?= $s->id_subkriteria ?>">
													<?= ' | Nilai : ' . $s->nilai . ' | '; ?>
													<?= $s->nama_subkriteria; ?>
												</option>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
						<tr>
							<td colspan="2"><input type="submit" class="btn btn-primary" value="Tambah"></td>
						</tr>
					</table>
				</div>
			</form>
			<div class="card">
				<?= $this->session->flashdata('pesan'); ?>
				<div class="card-body">
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
										<th>Nama Subkriteria</th>
										<th>Nilai</th>
										<td rowspan="<?php echo count($nilai_alternatif) + 1 ?>">
											<center>
												<a href="<?php echo base_url()  . 'admin/nilai/detail/' . $key->id_alternatif; ?>" class="btn btn-sm btn-primary">Detail <i class="fa fa-info"></i></a>
												<a href="<?php echo base_url()  . 'admin/nilai/edit/' . $key->id_alternatif; ?>" class="btn btn-sm btn-info">Edit <i class="fa fa-edit"></i></a>
												<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $key->id_alternatif) ?>')" href="#" class="btn btn-sm btn-danger">Hapus <i class="fa fa-trash"></i></a>
											</center>
										</td>
									</tr>
									<?php
									foreach ($nilai_alternatif as $index => $value) :
										$where = array('id_subkriteria ' => $value->id_subkriteria);
										$subkriteria  = $this->m_data->ambil_id($where, 'sub_kriteria', $setJoinKriteria);
									?>
										<tr>
											<td><?= $subkriteria->nama_kriteria; ?></td>
											<td><?= $subkriteria->nama_subkriteria; ?></td>
											<td><?= $subkriteria->nilai; ?></td>
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