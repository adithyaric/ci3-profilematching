<form action="<?php echo base_url(). $aksi .'/tambah_aksi'; ?>" method="post">		
		<table>
			<tr>
				<td>Alternatif</td>
				<td>	
					<select name="id_alternatif" id="" required>
                    	<option value="">--Pilih Alternatif--</option>
                    <?php foreach ($alternatif as $a) : ?>
                        <option value="<?= $a->id_alternatif; ?>"><?= $a->nama_alternatif; ?></option>
                    <?php endforeach; ?>
               		 </select>					
				</td>
			</tr>			
			<?php foreach ($kriteria as $key) : 
					$where = array('id_kriteria' => $key->id_kriteria);
					$sub_kriteria = $this->m_data->edit_data($where, 'sub_kriteria')->result();
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
				<td colspan="2"><input type="submit" value="Tambah"></td>
			</tr>
		</table>	
</form>
	<table>
		<tr>
			<th>Nama Alternatif</th>
			<th>
				<table>
					<tr>
						<th>Nama Kriteria</th>
						<th>Nama subkriteria</th>
						<th>Nilai</th>
					</tr>
				</table>
			</th>
			<th>Action</th>
		</tr>							
			<?php foreach ($nama as $key) :
					$where = array('id_alternatif' => $key->id_alternatif);
					$nilai_alternatif = $this->m_data->edit_data($where, 'nilai_alternatif')->result();
					if($nilai_alternatif != NULL):
						if($key->id_alternatif%2 == 0){
							$bg = 'yellow';
						}else{
							$bg = 'white';
						}				
			?>
												
			<tr bgcolor="<?php print_r($bg); ?>">
				<td>
					<label for="<?= $key->id_alternatif ?>"><?= $key->nama_alternatif ?></label>
				</td>
				<td>
					<table>
						<?php 
						foreach ($nilai_alternatif as $index => $value) :
							$where = array('id_subkriteria ' => $value->id_subkriteria);
							$subkriteria  = $this->m_data->join($where, 'sub_kriteria');
						?>
						<tr>
							<th><?php echo $subkriteria->nama_kriteria; ?></th>
							<td><?php echo $subkriteria->nama_subkriteria; ?></td>
							<td><?php echo $subkriteria->nilai; ?></td>
						</tr>
						<?php endforeach; ?>						
					</table>
				</td>
				<td>
					<?= anchor($aksi.'/edit/'.$key->id_alternatif,'Edit'); ?>
					<?= anchor($aksi.'/hapus/'.$key->id_alternatif,'Hapus'); ?>
				</td>
			</tr> 
				<?php endif; ?><br>
			<?php endforeach; ?>
		</table>
<!--  -->

