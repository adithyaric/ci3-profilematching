	<center>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($kriteria as $k){ ?>
	<form action="<?php echo base_url(). $aksi .'/update'; ?>" method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $k->id_kriteria ?>">
					<input type="text" name="nama" value="<?php echo $k->nama_kriteria ?>">
				</td>
			</tr>
			<tr>
				<td>Jenis Kriteria :</td>
				<td>
					<?php if ($k->jenis_kriteria == 'core') { ?>
						<input type="radio" id="core" name="jenis" value="core" checked>
						<label for="core">Core Factor</label><br>
						<input type="radio" id="secondary" name="jenis" value="secondary">
						<label for="secondary">Secondary Factor</label>
					<?php } elseif ($k->jenis_kriteria == 'secondary') { ?>
						<input type="radio" id="core" name="jenis" value="core">
						<label for="core">Core Factor</label><br>
						<input type="radio" id="secondary" name="jenis" value="secondary" checked>
						<label for="secondary">Secondary Factor</label>
					<?php } ?>											
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
