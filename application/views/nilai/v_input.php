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
			<?php foreach ($kriteria as $key) : 
					$table = 'sub_kriteria';
					$where = 'id_kriteria';
					$sub_kriteria = $this->m_data->data_sub_($key->id_kriteria, $table, $where);
					if($sub_kriteria != NULL): ?>
			<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
			<tr>
				<td>
					<label for="<?= $key->id_kriteria ?>"><?= $key->nama_kriteria ?></label>
				</td>
				<td>
					<select name="sub_kriteria[]" id="" required>
					<option value=""> --- Pilih --- </option>	
					<?php foreach ($sub_kriteria as $s) : ?>			
							<option value="<?= $s->id_subkriteria ?>">
								<?= $s->nama_subkriteria; ?>
								<?= ' - Nilai : '.$s->nilai; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr> 
			<?php endif; ?><br>
			<?php endforeach; ?>
			<tr>
				<td colspan="2"><input type="submit" value="Tambah"></td>
			</tr>
		</table>	
</form>
