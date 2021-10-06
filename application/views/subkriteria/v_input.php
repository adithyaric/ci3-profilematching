	<center>
		<h3>Tambah data baru</h3>
	</center>
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
