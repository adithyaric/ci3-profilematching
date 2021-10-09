<center>
		<h3>Edit data baru</h3>
</center>
	<form action="<?php echo base_url(). $aksi .'/update'; ?>" method="post">	
	<?php foreach($alternatif as $x){ ?>	
	<?php foreach($nilai_alternatif as $n){ ?>	
		<input type="hidden" name="id_nilai[]" value="<?= $n->id_nilai; ?>">	
		<input type="hidden" name="id_alternatif[]" value="<?= $x->id_alternatif; ?>">	
	<?php } }?>
		<table>
			<tr>
				<td>Alternatif</td>
				<td>	
					<?= $x->nama_alternatif; ?>
				</td>
			</tr>						
			<?php foreach ($kriteria as $key) :
					$where = array('id_kriteria' => $key->id_kriteria);
					$sub_kriteria = $this->m_data->edit_data($where, 'sub_kriteria')->result();
					if($sub_kriteria != NULL): ?>							
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
				<td colspan="2"><input type="submit" value="Simpan"></td>
			</tr>
		</table>	
</form>
