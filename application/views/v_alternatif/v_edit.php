<center>
	<h3>Edit Data</h3>
</center>
<?php foreach ($alternatif as $a) { ?>
	<form action="<?php echo base_url() . $aksi . '/edit_aksi'; ?>" method="post">
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
				<td><textarea name="detail" id="" cols="25" rows="5" required><?php echo $a->detail ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php } ?>