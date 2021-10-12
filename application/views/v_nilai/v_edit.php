<center>
	<h3>Edit Data</h3>
</center>
<form action="<?php echo base_url(). $aksi .'/edit_aksi'; ?>" method="post">	
<?php foreach($alternatif as $x){ ?>	
	<?php foreach($nilai_alternatif as $n){ ?>	
	<input type="hidden" name="id_nilai[]" value="<?= $n->id_nilai; ?>">	
	<input type="hidden" name="id_alternatif[]" value="<?= $x->id_alternatif; ?>">	
	<?php } ?>
<?php } ?>
	<table>
		<tr>
			<th>Alternatif</th>
			<td colspan="2">	
				<?= $x->nama_alternatif; ?>
			</td>
		</tr>						
		<tr><th>Kriteria</th><th>Nama Subkriteria</th></tr>
		<?php
		foreach ($nilai_alternatif as $index => $value) :
			$where1 = array('id_subkriteria ' => $value->id_subkriteria);
			$sub_kriteria1  = $this->m_data->edit_data($where1, 'sub_kriteria')->result();

			$where2 = array('id_kriteria' => $kriteria[$index]->id_kriteria);
			$sub_kriteria2 = $this->m_data->edit_data($where2, 'sub_kriteria')->result();
			foreach($sub_kriteria1 as $s1):
					
		?>
			<tr>
				<td><?php echo $kriteria[$index]->nama_kriteria; ?></td>
				<td>
					<select name="sub_kriteria[]" id="" required>											
					<option value="<?php echo $s1->id_subkriteria; ?>">
						<?= ' > Nilai : '.$s1->nilai.' | '; ?>
						<?php echo $s1->nama_subkriteria; ?>
					</option>	
					<?php foreach ($sub_kriteria2 as $s2) : ?>
							<option value="<?= $s2->id_subkriteria ?>">
								<?= ' | Nilai : '.$s2->nilai.' | '; ?>
								<?= $s2->nama_subkriteria.' | '; ?>
							</option>
					<?php endforeach; ?>
					</select>				
				</td>
			</tr>
		<?php endforeach; endforeach; ?>	
		<tr>
			<td colspan="2"><input type="submit" value="Simpan"></td>
		</tr>
	</table>	
</form>

