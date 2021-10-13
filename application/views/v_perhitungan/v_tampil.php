<?php if(isset($hasil)): ?>
<!--  -->
<table>
	<thead>
		<tr>
            <th>No</th>
            <th>Nama</th>
                <?php foreach($kriteria as $h): ?>
            <?= '<th>'.$h->nama_kriteria.'</th>'; ?>
                <?php endforeach; ?>     
		</tr>
	</thead>
	<tbody>
	<!-- Nilai Profil -->
    <?php $count = 1;
		foreach ($nama as $key => $value) :
			$where = array('id_alternatif ' => $value->id_alternatif);
			$nilai_alternatif  = $this->m_data->edit_data($where, 'nilai_alternatif')->result();
            echo '
                <tr>
                    <td>'.$count.'</td>
                    <td>'.$value->nama_alternatif.'</td>';
                    foreach($nilai_alternatif as $key => $value){
					$where2 = array('id_subkriteria ' => $value->id_subkriteria);
					$sub_kriteria  = $this->m_data->edit_data($where2, 'sub_kriteria')->result();
						foreach($sub_kriteria as $s):
                        echo '<td>'.$s->nama_subkriteria.'</td>';
						endforeach;
                    }
            echo '</tr>';
            $count++;
            endforeach; ?>
        </tbody>
    </table> 
<!--  -->
<table>
	<thead>
		<tr>
            <th>No</th>
            <th>Nama</th>
                <?php foreach($kriteria as $h): ?>
            <?= '<th>'.$h->nama_kriteria.'</th>'; ?>
                <?php endforeach; ?>     
		</tr>
	</thead>
	<tbody>
	<!-- Nilai Profil -->
    <?php $count = 1;
		foreach ($hasil->alt_aspek as $key => $value) :
            echo '
                <tr>
                    <td>'.$count.'</td>
                    <td>'.$nama[$key]->nama_alternatif.'</td>';
                    for($i = 0; $i<count($value); $i++){
                        echo '<td>'.$value[$i].'</td>';
                    }
            echo '</tr>';
            $count++;
            endforeach; ?>
	<!-- Target -->
			<tr>
				<th colspan="2">Target</th>
				<?php foreach($hasil->aspek_nilai as $key => $value): ?>
            		<?= '<th>'.$value.'</th>'; ?>
				<?php endforeach; ?>  
			</tr>
	<!-- Selisih -->
    <?php $count = 1;
		foreach ($hasil->gap_aspek as $key => $value) :
            echo '
                <tr>
                    <td>'.$count.'</td>
                    <td>'.$nama[$key]->nama_alternatif.'</td>';
                    for($i = 0; $i<count($value); $i++){
                        echo '<td>'.$value[$i].'</td>';
                    }
            echo '</tr>';
            $count++;
            endforeach; ?>	
        </tbody>
    </table> 
<!--  -->
<table>
	<tr>
		<td colspan="3"><center>Pembobotan</center></td>
	</tr>
	<tr>
		<th>Selisih</th>
		<th>Bobot</th> 
		<th>Keterangan</th>
	</tr>
	<?php 
	foreach($hasil->selisih as $key => $value): 
	?>
		<?= '<tr><td>'.$value.'</td><td>'.$hasil->bobot_nilai[$key].'</td><td>'.$hasil->keterangan[$key].'</td></tr>'; ?>
	<?php endforeach;?>
</table> 		
<!--  -->
<table>
	<thead>
		<tr>
            <td>No</td>
            <td>Nama</td>
                <?php foreach($kriteria as $h): ?>
			<td>
				<?= $h->nama_kriteria.'<br>'; 
					if($h->jenis_kriteria == 'core'){
						echo '<b>(Core factor)</b>';
					}else{
						echo '<b>(Secondary factor)</b>';
					}
				?>
			</td>
                <?php endforeach; ?>
			<th>CF <?php echo $hasil->cf*100; ?>%</th>
			<th>SF <?php echo $hasil->sf*100; ?>%</th>
			<th>Hasil Akhir</th>     
		</tr>
	</thead>
	<tbody>
    <?php $count = 1;
		foreach ($hasil->bobot_aspek as $key => $value) :
            echo '
                <tr>
                    <td>'.$count.'</td>
                    <td>'.$nama[$key]->nama_alternatif.'</td>';
                    for($i = 0; $i<count($value); $i++){
                        echo '<td>'.$value[$i].'</td>';
                    }
            echo '
					<td>'.number_format($hasil->ncf_aspek[$key],2).'</td>
					<td>'.number_format($hasil->nsf_aspek[$key],2).'</td>
					<td>'.number_format($hasil->total_aspek[$key],2).'</td>	
				</tr>';
            $count++;
            endforeach; ?>
    </tbody>
</table> 
<!--  -->
<center>Hasil Analisa Menggunakan Sistem Pendukung Keputusan (SPK) Metode Profile Matching</center>
<table>
	<tr><th>Rangking</th><th>Nama</th><th>Nilai Profile Matching</th></tr>
	<?php 
	$count = 1;
	$max = max($hasil->total_aspek);
	arsort($hasil->total_aspek);
	foreach ($hasil->total_aspek as $key => $value) {
		echo '
			<tr>
				<td>'.$count.'</td>
				<td>'.$nama[$key]->nama_alternatif.'</td>
				<td>'.number_format($hasil->total_aspek[$key],2).'</td>
			</tr>
	';$count++;
	} ?>
</table>
<center>
<?php 
$max = max($hasil->total_aspek);
foreach ($hasil->total_aspek as $key => $value) {
	if($hasil->total_aspek[$key] == $max)
		echo 'Hasil Kecocokan Terbesar Didapatkan oleh Alternatif dengan Nama = '
		.'<strong>'
		. $nama[$key]->nama_alternatif
		.'</strong>'
		. ' dengan Nilai Profile Matching Terbesar = '
		.'<strong>'
		. number_format($hasil->total_aspek[$key],2)
		.'</strong>';
} ?>
</center>		
<?php endif; ?>    