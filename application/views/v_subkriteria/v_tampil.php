<form action="<?php echo base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
	<table id="emptbl">
		<tr>
			<th>Kriteria</th>
			<th>Nama Sub kriteria</th>
			<th>Nilai</th>
		</tr>
		<tr>
			<td id="col0">
				<select name="id_kriteria" id="" required>
					<option value="">--Pilih Kriteria--</option>
					<?php foreach ($kriteria as $k) : ?>
						<option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
					<?php endforeach; ?>
				</select>

			</td>
			<td id="col1">
				<!-- <input type="text" name="nama[]" value="" /> -->
				<textarea name="nama[]" id="" cols=20" rows="5" required></textarea>
			</td>
			<td id="col2">
				<input type="range" name="nilai[]" value="1" min="1" max="5" oninput="this.nextElementSibling.value = this.value">
				<output>1</output>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td><input type="button" value="Add Row" onclick="addRows()" /></td>
			<td><input type="button" value="Delete Row" onclick="deleteRows()" /></td>
			<td><input type="submit" value="Submit" /></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function addRows() {
		var table = document.getElementById('emptbl');
		var rowCount = table.rows.length;
		var cellCount = table.rows[0].cells.length;
		var row = table.insertRow(rowCount);
		for (var i = 0; i <= cellCount; i++) {
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
			alert('Setidaknya harus ada satu Row/Baris');
		}
	}
</script>
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