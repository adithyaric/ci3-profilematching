<?php if(isset($pm)): ?>
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
		foreach ($pm->alt_aspek as $key => $value) :
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
			<tr bgcolor="grey">
				<th colspan="2">Target</th>
				<?php foreach($pm->aspek_nilai as $key => $value): ?>
            		<?= '<th>'.$value.'</th>'; ?>
				<?php endforeach; ?>  
			</tr>
	<!-- Selisih -->
    <?php $count = 1;
		foreach ($pm->gap_aspek as $key => $value) :
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
			<td rowspan="2">Pembobotan</td>
			<th>Selisih</th>
		<?php foreach($pm->selisih as $key => $value): ?>
            <?= '<th>'.$value.'</th>'; ?>
		<?php endforeach; ?>    
		</tr>
		<tr>
			<th>Bobot</th>
		<?php foreach($pm->bobot_nilai as $key => $value): ?>
            <?= '<th>'.$value.'</th>'; ?>
		<?php endforeach; ?>  
		</tr>
</table> 	
<!--  -->
<table>
	<thead>
		<tr>
            <td>No</td>
            <td>Nama</td>
                <?php foreach($kriteria as $h): ?>
            <?= '<td>'.$h->nama_kriteria.'</td>'; ?>
                <?php endforeach; ?>
			<th>CF <?php echo $pm->cf*100; ?>%</th>
			<th>SF <?php echo $pm->sf*100; ?>%</th>
			<th>Hasil Akhir</th>     
		</tr>
	</thead>
	<tbody>
    <?php $count = 1;
		foreach ($pm->bobot_aspek as $key => $value) :
            echo '
                <tr>
                    <td>'.$count.'</td>
                    <td>'.$nama[$key]->nama_alternatif.'</td>';
                    for($i = 0; $i<count($value); $i++){
                        echo '<td>'.$value[$i].'</td>';
                    }
            echo '
					<td>'.$pm->ncf_aspek[$key].'</td>
					<td>'.$pm->nsf_aspek[$key].'</td>
					<td>'.$pm->total_aspek[$key].'</td>	
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
		$max = max($pm->total_aspek);
		foreach ($pm->total_aspek as $key => $value) {
			if($pm->total_aspek[$key] == $max)
				$bg = 'yellow';
			else
				$bg = 'white';
			echo '
				<tr bgcolor='.$bg.'>
					<td>'.$count.'</td>
					<td>'.$nama[$key]->nama_alternatif.'</td>
					<td>'.$pm->total_aspek[$key].'</td>
				</tr>
		';$count++;
		} ?>
</table>
<center>
<?php 
		$max = max($pm->total_aspek);
		foreach ($pm->total_aspek as $key => $value) {
			if($pm->total_aspek[$key] == $max)
				echo 'Hasil Kecocokan Terbesar Didapatkan oleh Alternatif dengan Nama = '
				.'<strong>'
				. $nama[$key]->nama_alternatif
				.'</strong>'
				. ' dengan Nilai Profile Matching Terbesar = '
				.'<strong>'
				. $pm->total_aspek[$key]
				.'</strong>';
		} ?>
</center>		
<?php endif; ?>     
<?php if(!isset($pm)): ?>
<center>
	<a href="<?php echo base_url(). 'perhitungan'; ?>">
		<?php echo 'Input data terlebih dahulu!!!';?>
	</a>
</center>
<?php endif; ?> 