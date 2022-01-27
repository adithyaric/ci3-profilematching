<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman Bobot kriteria</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<div class="alert alert-light alert-has-icon">
				<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
				<div class="alert-body">
					<div class="alert-title">Penjelasan : </div>
					Bobot kriteria adalah nilai pada tiap kriteria sesuai dengan sekala nilai yang sudah ditentukan
					<ul>
						<li>
							Untuk Menambahkan Data Bobot kriteria Pertama pilih Kriteria, isi Nama Bobot kriteria dan Sekala nilai lalu klil tombol +,
							<br>
							Bisa mengisi secara banyak dengan menambah baris lalu klik simpan
						</li>
						<li>Untuk Merubah Data Bobot kriteria Klik Tombol Edit <i class="fa fa-edit"></i></li>
						<li>Untuk Menghapus Data Bobot kriteria Klik Tombol Hapus <i class="fa fa-trash"></i></li>
					</ul>
					<p>Jika anda menggunakan Smartphone (<i class="fa fa-mobile"></i>) geser tabel ke-kiri untuk melihat data secara keseluruhan</p>
				</div>
			</div>
			<form action="<?php echo base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
				<div class="table-responsive">
					<table id="emptbl" class="table table-hover table-striped table-bordered">
						<tr>
							<th>Kriteria</th>
							<th>Nama Bobot kriteria</th>
							<th>Nilai</th>
						</tr>
						<tr>
							<td id="col0">
								<select name="id_kriteria" id="" class=" form-control" required>
									<option value="">--Pilih Kriteria--</option>
									<?php foreach ($kriteria as $k) : ?>
										<option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td id="col1">
								<textarea name="nama[]" id="" required></textarea>
							</td>
							<td id="col2">
								<input type="range" name="nilai[]" value="1" min="1" max="3" oninput="this.nextElementSibling.value = this.value">
								<output>1</output>
							</td>
						</tr>
					</table>
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<tr>
							<td><button type="button" class="btn btn-primary" value="Tambah baris" onclick="addRows()" />Tambah baris <i class="fa fa-plus-square"></i></button></td>
							<td><button type="button" class="btn btn-danger" value="Hapus baris" onclick="deleteRows()" />Hapus baris <i class="fa fa-trash"></i></button></td>
							<td><button type="submit" class="btn btn-primary" value="Simpan" />Simpan <i class="fa fa-save"></i></button></td>
						</tr>
					</table>
				</div>
			</form>
			<span id="alert"></span>
			<div class="card">
				<?= $this->session->flashdata('pesan'); ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th>No</th>
								<th>Kriteria</th>
								<th>Nama Bobot Kriteria</th>
								<th>Nilai</th>
								<th>Action</th>
							</tr>
							<?php
							$no = 1;
							foreach ($bobot_kriteria as $s) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td>
										<?= $s->nama_kriteria ?>
									</td>
									<td>
										<input type="text" class="form-control" value="<?= $s->nama_bobotkriteria ?>" disabled>
									</td>
									<td><?= $s->nilai ?></td>
									<td>
										<a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $s->id_bobotkriteria; ?>" data-name="<?= $s->nama_bobotkriteria; ?>" data-nilai="<?= $s->nilai; ?>" data-kriteria="<?= $s->id_kriteria ?>">
											Edit <i class="fa fa-edit"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $s->id_bobotkriteria) ?>')" href="#" class="btn btn-sm btn-danger">Hapus <i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Modal Edit Product-->
	<form action="<?php echo base_url() . $aksi . '/edit_aksi'; ?>" method="post">
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Bobot Kriteria</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>jenis kriteria</label>
							<select name="id_kriteria" id="" class="id_kriteria form-control">
								<?php foreach ($kriteria as $k) : ?>
									<option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Bobot Kriteria</label>
							<input type="text" class="form-control nama" name="nama" required>
						</div>
						<div class="form-group">
							<label for="">Nilai</label>
							<input type="range" name="nilai" class="nilai" min="1" max="3" oninput="this.nextElementSibling.value = this.value">
							<output class="nilai"></output>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" class="id">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan <i class="fas fa-save"></i></button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- End Modal Edit Product-->
</div>
<script>
	$(document).ready(function() {
		// get Edit Product
		$('.btn-edit').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			const nilai = $(this).data('nilai');
			const kriteria = $(this).data('kriteria');
			// Set data to Form Edit
			$('.id').val(id);
			$('.nama').val(name);
			$('.nilai').val(nilai);
			$('.id_kriteria').val(kriteria).trigger('change');
			// Call Modal Edit
			$('#editModal').modal('show');
		});
	});
</script>
<script type="text/javascript">
	function addRows() {
		var table = document.getElementById('emptbl');
		var rowCount = table.rows.length;
		var cellCount = table.rows[0].cells.length;
		var row = table.insertRow(rowCount);
		for (var i = 0; i < cellCount; i++) {
			var cell = 'cell' + i;
			cell = row.insertCell(i);
			var copycel = document.getElementById('col' + i).innerHTML;
			cell.innerHTML = copycel;
		}
	}

	function deleteRows() {
		var table = document.getElementById('emptbl');
		var rowCount = table.rows.length;
		if (rowCount > '2') {
			var row = table.deleteRow(rowCount - 1);
			rowCount--;
		} else {
			document.getElementById("alert").innerHTML =
				"<div class='alert alert-danger alert-dismissible show fade'><div class='alert-body'><button class = 'close' data-dismiss = 'alert'><span>&times;</span></button>Tidak boleh kosong!</div></div>";
		}
	}
</script>