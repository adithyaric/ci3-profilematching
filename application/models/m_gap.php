<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gap extends CI_Model {

	public function hitung($data)
	{
		echo '<pre>' . var_export($data, true) . '</pre>';
		/** */
		$users =  $data;
		$raw_aspek = [];
		foreach ($users as $key => $user) {
			$holds = $user->id_subkriteria;
			$holds = explode(',', $holds);
			//echo '<pre>' . var_export($holds, true) . '</pre>';

	  		array_push($raw_aspek, $holds);
		}
		echo '<pre>' . var_export($raw_aspek, true) . '</pre>';
		// $hasil = $this->gap($raw_aspek);
		// return $hasil;
	}

	function gap($arr_aspek)
	{
		$aspek = (Object)[
			'cf' => 0.6,
			'sf' => 0.4,
		];
		//Nilai Target $aspek_nilai = [3,2,1,3,2];
		$aspek_nilai = $this->input->post('sub_kriteria');
		echo '<pre>' . var_export($aspek_nilai, true) . '</pre>';
		 
		$aspek_tipe = ['core','second','second','core'];

		$raw_aspek = $arr_aspek;
		$alt_aspek = [];
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
			$nsf_aspek[$key] = array_sum($sf_aspek[$key]) / count($sf_aspek[$key]);
			$total_aspek[$key] = $aspek->cf * $ncf_aspek[$key] + $aspek->sf * $nsf_aspek[$key];
		}
		
		// Menghitung Nilai Total & Ranking
		// foreach ($alt_aspek as $key => $value) {
		// $rank[$key] = $aspek->bobot * $total_aspek[$key] + $non_aspek->bobot * $total_non_aspek[$key];
		// }
		
		$hasil = (Object)[
			'gap_aspek' 			=> $gap_aspek,
			'bobot_aspek' 			=> $bobot_aspek,
			'ncf_aspek' 			=> $ncf_aspek,
			'nsf_aspek' 			=> $nsf_aspek,
			'total_aspek' 			=> $total_aspek,
			// 'rank' 				=> $rank,
			'alt_aspek' 			=> $alt_aspek
		];
		return $hasil;
	}

}
