<form action="<?php echo base_url(). $aksi .'/tambah_aksi'; ?>" method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>
					  <input type="radio" id="core" name="jenis" value="core" checked>
					  <label for="core">Core Factor</label><br>
					  <input type="radio" id="secondary" name="jenis" value="secondary">
					  <label for="secondary">Secondary Factor</label><br>					
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
<!-- <center><?php echo anchor($aksi.'/tambah','Tambah Data'); ?></center> -->
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