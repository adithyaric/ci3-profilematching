<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Gap extends CI_Model
{
	
	protected $selisih = [-4, -3, -2, -1, 0, 1, 2, 3, 4];
	protected $bobot_nilai = [1, 2, 3, 4, 5, 4.5, 3.5, 2.5, 1.5];
	protected $keterangan = [
		'Kompetensi individu kekurangan 4 tingkat/level',
		'Kompetensi individu kekurangan 3 tingkat/level',
		'Kompetensi individu kekurangan 2 tingkat/level',
		'Kompetensi individu kekurangan 1 tingkat/level ',
		'Tidak ada selisih (Kompetensi sesuai yang dibutuhkan)',
		'Kompetensi individu kelebihan 1 tingkat/level',
		'Kompetensi individu kelebihan 2 tingkat/level',
		'Kompetensi individu kelebihan 3 tingkat/level',
		'Kompetensi individu kelebihan 4 tingkat/level',
	];

	public function hitung($hitungid, $data)
	{		
		$alt_aspek = [];
		foreach ($hitungid as $user) {
			$nilai = $user->nilai;
			$nilai = explode(',', $nilai);
			array_push($alt_aspek, $nilai);
		}
		$hasil = $this->gap($alt_aspek, $data);
		return $hasil;
	}

	public function hitung_bobot($val)
	{
		foreach ($this->selisih as $key => $value) {
			if ($val == $value) {
				return $this->bobot_nilai[$key];
			}
		}
	}

	public function gap($alt_aspek, $data)
	{
		$aspek = (object)[
			'cf' => $data['cf'] / 100, //60%
			'sf' => $data['sf'] / 100, //40%
		];
		$aspek_nilai = $data['sub_kriteria_list']; //Nilai Target 		
		$aspek_tipe = $data['jenis_list']; //Jenis Kriteria 
		$gap_aspek = [];
		$bobot_aspek = [];

		// Menghitung Nilai CF/SF aspek
		foreach ($alt_aspek as $key => $value) {
			$cf_aspek[$key] = [];
			$sf_aspek[$key] = [];
			foreach ($value as $key2 => $value2) {
				$gap_aspek[$key][$key2] = $alt_aspek[$key][$key2] - $aspek_nilai[$key2]; //Selisih
				$bobot_aspek[$key][$key2] = $this->hitung_bobot($gap_aspek[$key][$key2]);
				if ($aspek_tipe[$key2] == 'core')
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

		foreach ($total_aspek as $key => $value) {
			$combine[$key] = $cf_aspek[$key];
			array_push($combine[$key], $total_aspek[$key]);
		}
				
		$keys 			= array_keys($combine); //Ambil index per-baris
		//Ambil index per-kolom
		$nilai 			= array_column($combine, 3); 
		$kadaramilosa 	= array_column($combine, 2);
		$harga 			= array_column($combine, 1);
		$tinggi 		= array_column($combine, 0);
		array_multisort($nilai, SORT_DESC, $kadaramilosa, SORT_DESC, $harga, SORT_DESC, $tinggi, SORT_DESC, $combine, $keys);
		$hasilakhir = array_combine($keys, $combine); //array multidimensional [baris, kolom]

		$hasil = (object)[
			'gap_aspek' 			=> $gap_aspek,		//Selisih (Gap)
			'bobot_aspek' 			=> $bobot_aspek, 	//Nilai Gap (Bobot Gap)
			'cf_aspek' 				=> $cf_aspek,		//Nilai Core Factor
			'ncf_aspek' 			=> $ncf_aspek,		//Nilai Rata-rata Core Factor
			'nsf_aspek' 			=> $nsf_aspek,		//Nilai Rata-rata Secondary Factor
			'total_aspek' 			=> $total_aspek, 	//Nilai Total
			'alt_aspek' 			=> $alt_aspek,		//Nilai Profil Alternatif
			'aspek_nilai'           => $aspek_nilai,
			'selisih'				=> $this->selisih,
			'bobot_nilai'			=> $this->bobot_nilai,
			'keterangan'			=> $this->keterangan,
			'cf'					=> $aspek->cf,
			'sf'					=> $aspek->sf,
			'hasilakhir'			=> $hasilakhir,
		];
		return $hasil;
	}
}
