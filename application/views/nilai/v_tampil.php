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
	<!-- <center><?= anchor($aksi.'/tambah','Tambah Data'); ?></center> -->
	<table>
		<tr>
			<th>No</th>
			<th>Alternatif</th>
			<th>Kriteria</th>
			<th>Sub Kriteria</th>
			<th>Nilai</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($nilai_alternatif as $s){ 
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $s->nama_alternatif ?></td>
			<td><?= $s->nama_kriteria ?></td>
			<td><?= $s->nama_subkriteria ?></td>
			<td><?= $s->nilai ?></td>
			<td>
			    <?= anchor($aksi.'/edit/'.$s->id_alternatif,'Edit'); ?>
                <?= anchor($aksi.'/hapus/'.$s->id_alternatif,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>