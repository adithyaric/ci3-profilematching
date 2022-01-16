<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman kriteria</h1>
		</div>
		<!-- End Header -->
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah <i class="fa fa-plus-square"></i></button>
				</div>
				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<div class="alert alert-light alert-has-icon">
						<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
						<div class="alert-body">
							<div class="alert-title">Penjelasan : </div>
							Ini merupakan halaman yang digunakan untuk mengelola Data kriteria.<br>
							Kriteria adalah ukuran yang menjadi dasar penilaian atau penetapan sesuatu (kbbi)
							<ul>
								<li>Untuk Menambahkan Anggota kriteria Klik Tombol Tambah <i class="fa fa-plus-square"></i></li>
								<li>Untuk Melihat Detail Data kriteria Klik Tombol Detail <i class="fa fa-info"></i></li>
								<li>Untuk Merubah Data kriteria Klik Tombol Edit <i class="fa fa-edit"></i></li>
								<li>Untuk Menghapus Data kriteria Klik Tombol Hapus <i class="fa fa-trash"></i></li>
							</ul>
							<p>Jika anda menggunakan Smartphone (<i class="fa fa-mobile"></i>) geser tabel ke-kiri untuk melihat data secara keseluruhan</p>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jenis</th>
								<th>Action</th>
							</tr>
							<?php
							$no = 1;
							foreach ($kriteria as $k) {
							?>
								<tr>
									<td><?php echo $no++ ?><input type="text" name="id" value="<?= $k->id_kriteria ?>" hidden></td>
									<td><?php echo $k->nama_kriteria ?></td>
									<td><?php echo $k->jenis_kriteria ?></td>
									<td>
										<a href="<?php echo base_url()  . 'admin/bobotkriteria/detail/' . $k->id_kriteria; ?>" class="btn btn-sm btn-primary">Detail <i class="fa fa-info"></i></a>
										<a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $k->id_kriteria; ?>" data-name="<?= $k->nama_kriteria; ?>" data-jenis="<?= $k->jenis_kriteria; ?>">Edit <i class="fa fa-edit"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $k->id_kriteria) ?>')" href="#" class="btn btn-sm btn-danger">Hapus <i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Modal Add Product-->
	<form action="<?php echo base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Kriteria</label>
							<input type="text" class="form-control nama" name="nama" placeholder="Nama Kriteria" required>
						</div>
						<div class="form-group">
							<label>jenis</label>
							<select name="jenis" id="jenis" class="form-control jenis">
								<option value="core">Core</option>
								<option value="secondary">Secondary</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" class="id_kriteria">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- End Modal Add Product-->
	<!-- Modal Edit Product-->
	<form action="<?php echo base_url() . $aksi . '/edit_aksi'; ?>" method="post">
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Kriteria</label>
							<input type="text" class="form-control nama" name="nama" required>
						</div>
						<div class="form-group">
							<label>jenis</label>
							<select name="jenis" id="jenis" class="form-control jenis">
								<option value="core">Core</option>
								<option value="secondary">Secondary</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" class="id_kriteria">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Edit</button>
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
			const jenis = $(this).data('jenis');
			// Set data to Form Edit
			$('.id_kriteria').val(id);
			$('.nama').val(name);
			$('.jenis').val(jenis).trigger('change');
			// Call Modal Edit
			$('#editModal').modal('show');
		});
	});
</script>