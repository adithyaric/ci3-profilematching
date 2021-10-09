<form action="<?php echo base_url(). $aksi .'/tambah_aksi'; ?>" method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>	
					<select name="id_kriteria" id="" class="form-control" required>
                    <option value="">--Pilih Kriteria--</option>
                    <?php foreach ($kriteria as $k) : ?>
                        <option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
                    <?php endforeach; ?>
                </select>					
				</td>
			</tr>
			<tr>
				<td>Nilai</td>
				<td><input type="text" name="nilai" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
	<!-- <center><?= anchor($aksi.'/tambah','Tambah Data'); ?></center> -->
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