	<center><?php echo anchor($aksi.'/tambah','Tambah Data'); ?></center>
	<table>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($kriteria as $k){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $k->nama_kriteria ?></td>
			<td><?php echo $k->jenis_kriteria ?></td>
			<td>
			    <?php echo anchor($aksi.'/edit/'.$k->id_kriteria,'Edit'); ?>
                <?php echo anchor($aksi.'/hapus/'.$k->id_kriteria,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>