<center>
	<h3>Detail Data</h3>
</center>
<?php foreach($alternatif as $x){ ?>	
	<table>
		<tr>
			<th>Alternatif</th>
			<td colspan="2">	
				<?= $x->nama_alternatif; ?>
			</td>
		</tr>						
		<tr><th>Kriteria</th><th>Nama Subkriteria</th><th>Nilai</th></tr>
		<?php
		foreach ($nilai_alternatif as $index => $value) :
			$where = array('id_subkriteria ' => $value->id_subkriteria);
			$sub_kriteria  = $this->m_data->edit_data($where, 'sub_kriteria')->result();
			foreach($sub_kriteria as $s):
					
		?>
			<tr>
				<td>
                    <?= $kriteria[$index]->nama_kriteria; ?>
                    <?php
                    if($kriteria[$index]->jenis_kriteria == 'core'){
						echo '<b>(Core factor)</b>';
					}else{
						echo '<b>(Secondary factor)</b>';
					}
                    ?>
                </td>
				<td>
                    <?= $s->nama_subkriteria; ?>			
				</td>
                <td><?= $s->nilai; ?></td>
			</tr>
		<?php endforeach; endforeach; ?>	
		<tr>
            <td>Keterangan</td>
            <td colspan="2">
                <textarea name="" id="" cols="40" rows="7" disabled>
                    <?= $x->detail; ?>
                </textarea>
            </td>
		</tr>
	</table>	
<?php } ?>
