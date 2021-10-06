	<center>
		<h3>Tambah data baru</h3>
	</center>
	<form action="<?php echo base_url(). $aksi .'/tambah_aksi'; ?>" method="post">
		<table>
			<tr>
				<td>Alternatif</td>
				<td>	
					<select name="id_alternatif" id="" class="form-control" required>
                    <option value="">--Pilih Alternatif--</option>
                    <?php foreach ($alternatif as $a) : ?>
                        <option value="<?= $a->id_alternatif; ?>"><?= $a->nama_alternatif; ?></option>
                    <?php endforeach; ?>
                </select>					
				</td>
			</tr>
			<tr>
				<td>Sub Kriteria</td>
				<td>	
					<select name="id_subkriteria" id="" class="form-control" required>
                    <option value="">--Pilih Sub Kriteria--</option>
                    <?php foreach ($sub_kriteria as $s) : ?>
                        <option value="<?= $s->id_subkriteria; ?>"><?= $s->nama_kriteria; ?> - <?= $s->nama_subkriteria; ?> - nilai : <?= $s->nilai; ?></option>
                    <?php endforeach; ?>
                </select>					
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
