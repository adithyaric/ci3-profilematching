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
