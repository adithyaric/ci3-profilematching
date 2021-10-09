<?php if(isset($pm)): ?>
<!--  -->
<h3>Nilai : </h3>
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
        </tbody>
    </table> 
<!--  -->
<h3>Target : </h3>
<table>
	<thead>
		<tr>
                <?php foreach($kriteria as $h): ?>
            <?= '<th>'.$h->nama_kriteria.'</th>'; ?>
                <?php endforeach; ?>     
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php foreach($pm->aspek_nilai as $key => $value): ?>
            <?= '<td>'.$value.'</td>'; ?>
		<?php endforeach; ?>  
		</tr>
			</tbody>					
	</tbody>
</table> 
<!--  -->
<h3>Selisih (Gap) : </h3>
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
<h3>Nilai Gap (Bobot Gap) : </h3>
<table>
	<thead>
		<tr>
			<th>Selisih</th>
		<?php foreach($pm->selisih as $key => $value): ?>
            <?= '<th>'.$value.'</th>'; ?>
		<?php endforeach; ?>      
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Bobot</th>
		<?php foreach($pm->bobot_nilai as $key => $value): ?>
            <?= '<th>'.$value.'</th>'; ?>
		<?php endforeach; ?>  
		</tr>
			</tbody>					
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
    <?php $count = 1;
		foreach ($pm->bobot_aspek as $key => $value) :
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
<h3>Nilai Total : </h3>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Rata" CF</th>
			<th>Rata" SF</th>
			<th>Hasil Akhir</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$count = 1;
		foreach ($pm->ncf_aspek as $key => $value) {
			echo '
				<tr>
					<td>'.$count.'</td>
					<td>'.$nama[$key]->nama_alternatif.'</td>
					<td>'.$pm->ncf_aspek[$key].'</td>
					<td>'.$pm->nsf_aspek[$key].'</td>
					<td bgcolor="ffc9ok">'.$pm->total_aspek[$key].'</td>
				</tr>
		';$count++;
		} ?>
    </tbody>
</table> 
<?php endif; ?>     
<?php if(!isset($pm)): ?>
<center>
	<a href="<?php echo base_url(). 'perhitungan'; ?>">
		<?php echo 'Input data terlebih dahulu!!!';?>
	</a>
</center>
<?php endif; ?> 