<form action="<?php echo base_url(). $aksi .'/hasil'; ?>" method="post">		
	<table>
		<tr>
			<th>Kriteria</th>
			<th>Sub kriteria</th>
		</tr>		
		<?php foreach ($kriteria as $key) : 
				$where = array('id_kriteria' => $key->id_kriteria);
				$sub_kriteria = $this->m_data->edit_data($where, 'sub_kriteria')->result();
				if($sub_kriteria != NULL): ?>
		<input type="text" name="jenis_kriteria[]" value="<?= $key->jenis_kriteria ?>" hidden>
		<tr>
			<td>
				<label for="<?= $key->id_kriteria ?>"><?= $key->nama_kriteria ?></label>
			</td>
			<td>
				<select name="sub_kriteria[]" id="" required>
				<option value=""> --- Pilih --- </option>	
				<?php foreach ($sub_kriteria as $s) : ?>			
						<option value="<?= $s->nilai ?>">
							<?= ' | Nilai : '.$s->nilai.' | '; ?>
							<?= $s->nama_subkriteria; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr> 
		<?php endif; ?><br>
		<?php endforeach; ?>
		<tr>
			<th colspan="2">
				<label for="">Core Factor : </label>
					<input type="number" name="cf" required="" min="1" max="100" value="60">%
				<label for="">Secondary Factor : </label>
					<input type="number" name="sf" required="" min="1" max="100" value="40">%
			</th>
			</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Tambah"></td>
		</tr>
	</table>	
</form>
