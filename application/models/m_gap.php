<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gap extends CI_Model {

	// protected $selisih = [-4, -3, -2, -1, 0, 1, 2, 3, 4];
	// protected $bobot_nilai = [1, 2, 3, 4, 5, 4.5, 3.5, 2.5, 1.5];
	protected $selisih = [-2, -1, 0, 1, 2];
	protected $bobot_nilai = [1, 2, 3, 2.5, 1.5];

	public function hitung($hitungid, $data)
	{
		// echo ' <pre> hitung($data) :' . print_r($hitungid, true) . '</pre>';
		// echo ' <pre> sub_kriteria_list :' . print_r($data['sub_kriteria_list'], true) . '</pre>';
		// echo ' <pre> jenis_list :' . print_r($data['jenis_list'], true) . '</pre>';
		// echo ' <pre> cf :' . print_r($data['cf'], true) . '</pre>';
		// echo ' <pre> sf :' . print_r($data['sf'], true) . '</pre>';
		$users =  $hitungid;
		$raw_aspek = [];
		foreach ($users as $key => $user) {
			$holds = $user->nilai;
			$holds = explode(',', $holds);
			//echo '<pre>' . print_r($holds, true) . '</pre>';
	  		array_push($raw_aspek, $holds);
		}
		//echo '<pre> $raw_aspek :' . print_r($raw_aspek, true) . '</pre>';
		$hasil = $this->gap($raw_aspek, $data);
		return $hasil;
	}

    public function hitung_bobot($val)
    {
        foreach ($this->selisih as $key => $value) {
            if($val == $value){return $this->bobot_nilai[$key];}
        }
    }

	public function gap($arr_aspek, $data)
	{
		$aspek = (Object)[
			'cf' => $data['cf']/100, //60%
			'sf' => $data['sf']/100, //40%
		];
		//echo '<pre> aspek_nilai = ' . print_r($aspek, true) . '</pre>';
		$aspek_nilai = $data['sub_kriteria_list']; //Nilai Target 
		//echo '<pre> aspek_nilai = ' . print_r($aspek_nilai, true) . '</pre>';
		$aspek_tipe = $data['jenis_list']; //Jenis Kriteria 
		//echo '<pre> aspek_tipe =' . print_r($aspek_tipe, true) . '</pre>';		
		$alt_aspek = $arr_aspek; //Nilai Profil Alternatif
		$gap_aspek = [];
		$bobot_aspek = [];

		// Menghitung Nilai CF/SF aspek
		foreach ($alt_aspek as $key => $value) {
			$cf_aspek[$key] = [];
			$sf_aspek[$key] = [];
			foreach ($value as $key2 => $value2) {
				$gap_aspek[$key][$key2] = $alt_aspek[$key][$key2] - $aspek_nilai[$key2]; //Selisih
				$bobot_aspek[$key][$key2] = $this->hitung_bobot($gap_aspek[$key][$key2]);
				// echo '$cf_aspek[$key]: <pre>' . print_r($cf_aspek[$key], true) . '</pre>';				
				if($aspek_tipe[$key2] == 'core')
					array_push($cf_aspek[$key], $bobot_aspek[$key][$key2]);
				else
					array_push($sf_aspek[$key], $bobot_aspek[$key][$key2]);
			}
		}
		
		// Menghitung Nilai Total aspek
		foreach ($alt_aspek as $key => $value) {
			// echo '$cf_aspek[$key]: <pre>' . print_r($cf_aspek[$key], true) . '</pre>';
			// echo '$sf_aspek[$key]: <pre>' . print_r($sf_aspek[$key], true) . '</pre>';
			$ncf_aspek[$key] = array_sum($cf_aspek[$key]) / count($cf_aspek[$key]);
			$nsf_aspek[$key] = array_sum($sf_aspek[$key]) / count($sf_aspek[$key]);
			//echo '$ncf_aspek[$key]: <pre>' . print_r($ncf_aspek[$key], true) . '</pre>';
			//echo '$nsf_aspek[$key]: <pre>' . print_r($nsf_aspek[$key], true) . '</pre>';
			$total_aspek[$key] = $aspek->cf * $ncf_aspek[$key] + $aspek->sf * $nsf_aspek[$key];
			//echo '$total_aspek[$key]: <pre>' . print_r($total_aspek[$key], true) . '</pre>';
		}
		
		$hasil = (Object)[
			'gap_aspek' 			=> $gap_aspek,		//Selisih (Gap)
			'bobot_aspek' 			=> $bobot_aspek, 	//Nilai Gap (Bobot Gap)
			'ncf_aspek' 			=> $ncf_aspek,		//Nilai Rata-rata Core Factor
			'nsf_aspek' 			=> $nsf_aspek,		//Nilai Rata-rata Secondary Factor
			'total_aspek' 			=> $total_aspek, 	//Nilai Total
			'alt_aspek' 			=> $alt_aspek,		//Nilai Profil Alternatif
            'aspek_nilai'           => $aspek_nilai,
			'selisih'				=> $this->selisih,
			'bobot_nilai'			=> $this->bobot_nilai,
			'cf'					=> $aspek->cf,
			'sf'					=> $aspek->sf,
		];
        // echo '<hr> Hasil alt_aspek 	: <pre>' . print_r($hasil->alt_aspek, true) . '</pre>';
        // echo '<hr> Hasil aspek_nilai : <pre>' . print_r($hasil->aspek_nilai, true) . '</pre>';
		// echo '<hr> Hasil gap_aspek 	: <pre>' . print_r($hasil->gap_aspek, true) . '</pre>';
		// echo '<hr> Hasil bobot_aspek : <pre>' . print_r($hasil->bobot_aspek, true) . '</pre>';
		// echo '<hr> Hasil ncf_aspek 	: <pre>' . print_r($hasil->ncf_aspek, true) . '</pre>';
		// echo '<hr> Hasil nsf_aspek 	: <pre>' . print_r($hasil->nsf_aspek, true) . '</pre>';
		//echo '<hr> Hasil total_aspek 	: <pre>' . print_r($hasil->total_aspek, true) . '</pre>';
		// echo '<hr> CF 				: <pre>' . print_r($hasil->cf, true) . '</pre>';
		// echo '<hr> SF 				: <pre>' . print_r($hasil->sf, true) . '</pre>';
		
		return $hasil;
	}

}
