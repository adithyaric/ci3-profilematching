	<center><?= anchor($aksi.'/tambah','Tambah Data'); ?></center>
	<table>
		<tr>
			<th>No</th>
			<th>Nama Sub Kriteria</th>
			<th>Kriteria</th>
			<th>Nilai</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($sub_kriteria as $s){ 
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $s->nama_subkriteria ?></td>
			<td><?= $s->nama_kriteria ?></td>
			<td><?= $s->nilai ?></td>
			<td>
			    <?= anchor($aksi.'/edit/'.$s->id_subkriteria,'Edit'); ?>
                <?= anchor($aksi.'/hapus/'.$s->id_subkriteria,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>