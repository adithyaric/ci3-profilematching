<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gap extends CI_Model {

	public function hitung($data, $sub_kriteria_list, $jenis_list)
	{
		//echo ' <pre> hitung($data) :' . var_export($data, true) . '</pre>';
		$users =  $data;
		$raw_aspek = [];
		foreach ($users as $key => $user) {
			$holds = $user->nilai;
			$holds = explode(',', $holds);
			//echo '<pre>' . var_export($holds, true) . '</pre>';
	  		array_push($raw_aspek, $holds);
		}
		//echo '<pre> $raw_aspek :' . var_export($raw_aspek, true) . '</pre>';
		$hasil = $this->gap($raw_aspek, $sub_kriteria_list, $jenis_list);
		return $hasil;
	}

	function gap($arr_aspek, $sub_kriteria_list, $jenis_list)
	{
		$aspek = (Object)[
			'cf' => 0.6,
			'sf' => 0.4,
		];
		//Nilai Target 
		$aspek_nilai = $sub_kriteria_list;
		//$aspek_nilai = $this->input->post('sub_kriteria');
		echo '<pre> aspek_nilai = ' . var_export($aspek_nilai, true) . '</pre>';
		
		//Jenis Kriteria 
		$aspek_tipe = $jenis_list;
		//$aspek_tipe = $this->input->post('jenis_kriteria');
		echo '<pre> aspek_tipe =' . var_export($aspek_tipe, true) . '</pre>';
		
		$alt_aspek = $arr_aspek;
		function hitung_bobot($val)
		{
			$selisih = [0,1,-1,2,-2,3,-3,4,-4];
			$bobot_nilai = [5,4.5,4,3.5,3,2.5,2,1.5,1];
			foreach ($selisih as $key => $value) {
				if($val == $value)
					return $bobot_nilai[$key];
			}
		}

		$gap_aspek = [];
		$bobot_aspek = [];
		$cf_aspek = [];
		$sf_aspek = [];

		// Menghitung Nilai CF/SF aspek
		foreach ($alt_aspek as $key => $value) {
			$cf_aspek[$key] = [];
			$sf_aspek[$key] = [];
			foreach ($value as $key2 => $value2) {
				$gap_aspek[$key][$key2] = $alt_aspek[$key][$key2] - $aspek_nilai[$key2];
				$bobot_aspek[$key][$key2] = hitung_bobot($gap_aspek[$key][$key2]);
				
				if($aspek_tipe[$key2] == 'core')
					array_push($cf_aspek[$key], $bobot_aspek[$key][$key2]);
				else
					array_push($sf_aspek[$key], $bobot_aspek[$key][$key2]);
				
			}
		}
		
		// Menghitung Nilai Total aspek
		foreach ($alt_aspek as $key => $value) {
			$ncf_aspek[$key] = array_sum($cf_aspek[$key]) / count($cf_aspek[$key]);
			//echo '$cf_aspek[$key]: <pre>' . var_export($cf_aspek[$key], true) . '</pre>';
			$nsf_aspek[$key] = array_sum($sf_aspek[$key]) / count($sf_aspek[$key]);
			//echo '$sf_aspek[$key]: <pre>' . var_export($sf_aspek[$key], true) . '</pre>';
			$total_aspek[$key] = $aspek->cf * $ncf_aspek[$key] + $aspek->sf * $nsf_aspek[$key];
			//echo '$ncf_aspek[$key]: <pre>' . var_export($ncf_aspek[$key], true) . '</pre>';
			//echo '$nsf_aspek[$key]: <pre>' . var_export($nsf_aspek[$key], true) . '</pre>';
		}
				
		$hasil = (Object)[
			'gap_aspek' 			=> $gap_aspek,		//Selisih (Gap)
			'bobot_aspek' 			=> $bobot_aspek, 	//Nilai Gap (Bobot Gap)
			'ncf_aspek' 			=> $ncf_aspek,		//Nilai Rata-rata Core Factor
			'nsf_aspek' 			=> $nsf_aspek,		//Nilai Rata-rata Secondary Factor
			'total_aspek' 			=> $total_aspek, 	//Nilai Total
			'alt_aspek' 			=> $alt_aspek		//Nilai Profil Alternatif
		];
		echo '<hr> Hasil : <pre>' . var_export($hasil, true) . '</pre>';
		return $hasil;
	}

}
