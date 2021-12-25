<div class="navbar-bg"></div>
<div class="main-content">
	<section class="section">
		<!-- Header -->
		<div class="section-header">
			<h1>Halaman alternatif</h1>
		</div>
		<!-- End Header -->
		<!-- Body -->
		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
				</div>
				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<div class="alert alert-light alert-has-icon">
						<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
						<div class="alert-body">
							<div class="alert-title">Penjelasan : </div>
							alternatif adalah ...
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Detail</th>
								<th>Action</th>
							</tr>
							<?php
							$no = 1;
							foreach ($alternatif as $a) {
							?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $a->nama_alternatif ?></td>
									<td>
										<span name="detail" class="textarea" role="textbox"><?php echo $a->detail ?></span>
									</td>
									<td>
										<a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $a->id_alternatif; ?>" data-name="<?= $a->nama_alternatif; ?>" data-detail="<?= $a->detail; ?>">Edit <i class="fa fa-edit"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url($aksi . '/hapus/' . $a->id_alternatif) ?>')" href="#" class="btn btn-sm btn-danger">Hapus <i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Body -->
	</section>
	<!-- Modal Add Product-->
	<form action="<?php echo base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Alternatif</label>
							<input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>" placeholder="Nama Alternatif">
							<?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label>Detail</label>
							<textarea name="detail" class="form-control"><?= set_value('detail'); ?></textarea>
							<?= form_error('detail', '<div class="text-danger small">', '</div>'); ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Alternatif</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Alternatif</label>
							<input type="text" class="form-control nama" name="nama" required>
							<?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label>Detail</label>
							<textarea class="detail" name="detail" id="" cols="50" rows="10" required></textarea>
							<?= form_error('detail', '<div class="text-danger small">', '</div>'); ?>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" class="id_alternatif">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
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
			const detail = $(this).data('detail');
			// Set data to Form Edit
			$('.id_alternatif').val(id);
			$('.nama').val(name);
			$('.detail').val(detail);
			// Call Modal Edit
			$('#editModal').modal('show');
		});
	});
</script>