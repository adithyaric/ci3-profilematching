	<center><?= anchor($aksi.'/tambah','Tambah Data'); ?></center>
	<table>
		<tr>
			<th>No</th>
			<th>Alternatif</th>
			<th>Kriteria</th>
			<th>Sub Kriteria</th>
			<th>Nilai</th>
			<th>Action</th>
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
			<td>
			    <?= anchor($aksi.'/edit/'.$s->id_alternatif,'Edit'); ?>
                <?= anchor($aksi.'/hapus/'.$s->id_alternatif,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>