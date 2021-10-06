	<center><?php echo anchor($aksi.'/tambah','Tambah Data'); ?></center>
	<table>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Detail</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($alternatif as $a){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $a->nama_alternatif ?></td>
			<td><?php echo $a->detail ?></td>
			<td>
			    <?php echo anchor($aksi.'/edit/'.$a->id_alternatif,'Edit'); ?>
                <?php echo anchor($aksi.'/hapus/'.$a->id_alternatif,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>