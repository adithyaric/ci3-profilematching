	<table>
		<tr>
			<th>No</th>
			<th>Alternatif</th>
			<th>Kriteria</th>
			<th>Sub Kriteria</th>
			<th>Nilai</th>
			<th>Target</th>
			<th>Gap</th>
			<th>Nilai CF/SF</th>
			<th>Rata-Rata</th>
			<th>Hasil</th>
		</tr>
		<?php 
		$no = 1;
		foreach($nilai_alternatif as $s){ 
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $s->nama_alternatif ?></td>
			<td><?= $s->nama_kriteria ?></td>
			<td><?= $s->nama_subkriteria ?></td>
			<td><?= $s->nilai ?></td>
		</tr>
		<?php } ?>
	</table>