<form action="<?php echo base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
	<table>
		<tr>
			<td>Nama</td>
			<td>
				<textarea name="nama" id="" cols=20" rows="5" required></textarea>
			</td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td>
				<select name="id_kriteria" id="" required>
					<option value="">--Pilih Kriteria--</option>
					<?php foreach ($kriteria as $k) : ?>
						<option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nilai</td>
			<td>
				<input type="range" name="nilai" value="1" min="1" max="5" oninput="this.nextElementSibling.value = this.value">
				<output>1</output>
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
		<th>Kriteria</th>
		<th>Nama Sub Kriteria</th>
		<th>Nilai</th>
		<th>Action</th>
	</tr>
	<?php
	$no = 1;
	foreach ($sub_kriteria as $s) {
	?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $s->nama_kriteria ?></td>
			<td>
				<textarea id="" cols="20" rows="5" disabled>
				<?= $s->nama_subkriteria ?>
			</textarea>
			</td>
			<td><?= $s->nilai ?></td>
			<td>
				<?= anchor($aksi . '/edit/' . $s->id_subkriteria, 'Edit'); ?>
				<?= anchor($aksi . '/hapus/' . $s->id_subkriteria, 'Hapus'); ?>
			</td>
		</tr>
	<?php } ?>
</table>