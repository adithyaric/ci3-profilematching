<?= $this->session->flashdata('pesan'); ?>
<form action="<?php echo base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
	<table>
		<tr>
			<td>Nama</td>
			<td>
				<input type="text" name="nama" value="<?= set_value('nama'); ?>">
				<?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
			</td>
		</tr>
		<tr>
			<td>Detail</td>
			<td>
				<textarea name="detail" id="" cols="25" rows="5"><?= set_value('detail'); ?></textarea>
				<?= form_error('detail', '<div class="text-danger small">', '</div>'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Tambah"></td>
		</tr>
	</table>
</form>
<table>
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
			<td><textarea name="detail" id="" cols="30" rows="7" disabled><?php echo $a->detail ?></textarea></td>
			<td>
				<?php echo anchor($aksi . '/edit/' . $a->id_alternatif, 'Edit'); ?>
				<?php echo anchor($aksi . '/hapus/' . $a->id_alternatif, 'Hapus'); ?>
			</td>
		</tr>
	<?php } ?>
</table>