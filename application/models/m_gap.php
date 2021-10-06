<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gap extends CI_Model {

	public function hitung($data)
	{
		$users =  $data;
		
		$raw_asam = [];
		$raw_non_asam = [];
		foreach ($users as $key => $user) {
			$data = array($user->batas_tanam, $user->kadar_air, $user->tinggi_tanaman, $user->kerontokan, $user->harga_bibit);
	  		array_push($raw_asam, $data);
		}
		$hasil = $this->gap($raw_asam);
		return $hasil;
	}

	function gap($arr_asam)
	{
		$asam = (Object)[
			'cf' => 0.6,
			'sf' => 0.4,
			'sub_kriteria' => 
			[
				'Batas tanam',
				'Kadar air',
				'Tinggi tanaman',
				'Kerontokan',
				'Harga bibit'
			]
		];
		$asam_nilai = [3,2,1,3,2]; //Nilai Target
		// $asam_tipe = [
		// 	'core',
		// 	'second',
		// 	'second',
		// 	'core'
		// ];

		$raw_asam = $arr_asam;
		$alt_asam = [];
		function hitung_bobot($val)
		{
			$selisih = [0,1,-1,2,-2,3,-3,4,-4];
			$bobot_nilai = [5,4.5,4,3.5,3,2.5,2,1.5,1];
			foreach ($selisih as $key => $value) {
				if($val == $value)
					return $bobot_nilai[$key];
			}
		}

		$gap_asam = [];
		$bobot_asam = [];
		$cf_asam = [];
		$sf_asam = [];

		// Menghitung Nilai CF/SF Asam
		foreach ($alt_asam as $key => $value) {
			$cf_asam[$key] = [];
			$sf_asam[$key] = [];
			foreach ($value as $key2 => $value2) {
				$gap_asam[$key][$key2] = $alt_asam[$key][$key2] - $asam_nilai[$key2];
				$bobot_asam[$key][$key2] = hitung_bobot($gap_asam[$key][$key2]);
				
				if($asam_tipe[$key2] == 'core')
					array_push($cf_asam[$key], $bobot_asam[$key][$key2]);
				else
					array_push($sf_asam[$key], $bobot_asam[$key][$key2]);
				
			}
		}
		
		// Menghitung Nilai Total Asam
		foreach ($alt_asam as $key => $value) {
			$ncf_asam[$key] = array_sum($cf_asam[$key]) / count($cf_asam[$key]);
			$nsf_asam[$key] = array_sum($sf_asam[$key]) / count($sf_asam[$key]);
			$total_asam[$key] = $asam->cf * $ncf_asam[$key] + $asam->sf * $nsf_asam[$key];
		}
		
		// Menghitung Nilai Total & Ranking
		foreach ($alt_asam as $key => $value) {
			// $rank[$key] = $asam->bobot * $total_asam[$key] + $non_asam->bobot * $total_non_asam[$key];
			$rank[$key] = $asam->cf * $total_asam[$key] + $asam->sf * $total_non_asam[$key];
		}
		
		$hasil = (Object)[
			'gap_asam' 			=> $gap_asam,
			'bobot_asam' 		=> $bobot_asam,
			'ncf_asam' 			=> $ncf_asam,
			'nsf_asam' 			=> $nsf_asam,
			'total_asam' 		=> $total_asam,
			'rank' 				=> $rank,
			'alt_asam' 			=> $alt_asam
		];
		return $hasil;
	}
}
