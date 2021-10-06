	<center>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($alternatif as $a){ ?>
	<form action="<?php echo base_url(). $aksi .'/update'; ?>" method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $a->id_alternatif ?>">
					<input type="text" name="nama" value="<?php echo $a->nama_alternatif ?>">
				</td>
			</tr>
			<tr>
				<td>Detail</td>
				<td><input type="text" name="detail" value="<?php echo $a->detail ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
