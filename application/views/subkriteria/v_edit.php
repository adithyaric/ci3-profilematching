	<center>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($sub_kriteria as $s){ ?>
	<form action="<?php echo base_url(). $aksi .'/update'; ?>" method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?= $s->id_subkriteria; ?>">
					<input type="text" name="nama" value="<?= $s->nama_subkriteria; ?>">
				</td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>	
					<select name="id_kriteria" id="" class="form-control">
                    <option value="<?= $ambil_id->id_kriteria; ?>">--<?= $ambil_id->nama_kriteria ?>--</option>
                    <?php foreach ($kriteria as $k) : ?>
                        <option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
                    <?php endforeach; ?>
                </select>					
				</td>
			</tr>
			<tr>
				<td>Nilai</td>
				<td><input type="text" name="nilai" value="<?= $s->nilai; ?>"></td>
			</tr>			
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>