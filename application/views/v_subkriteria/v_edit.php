	<center>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($sub_kriteria as $s){ ?>
	<form action="<?php echo base_url(). $aksi .'/edit_aksi'; ?>" method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?= $s->id_subkriteria; ?>">
					<textarea name="nama" id="" cols="20" rows="5"><?= $s->nama_subkriteria; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>	
					<select name="id_kriteria" id="">
                    <option value="<?= $ambil_id->id_kriteria; ?>" selected>--<?= $ambil_id->nama_kriteria ?>--</option>
                    <?php foreach ($kriteria as $k) : ?>
                        <option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
                    <?php endforeach; ?>
                	</select>					
				</td>
			</tr>
			<tr>
				<td>Nilai</td>
				<td>
					<input type="range" name="nilai" value="<?= $s->nilai; ?>" min="1" max="5" oninput="this.nextElementSibling.value = this.value">
					<output><?= $s->nilai; ?></output>
				</td>
			</tr>			
			<tr>
				<td colspan="2"><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>