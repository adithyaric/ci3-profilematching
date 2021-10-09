<?php 

class Perhitungan extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'perhitungan/'; //Nama Folder view
    protected $table = 'nilai_alternatif'; //Nama Table
    protected $pk = 'id_nilai'; //Primary Key Table
    protected $home = 'perhitungan'; //Redirect
    protected $orderby = 'nilai_alternatif.id_alternatif, kriteria.id_kriteria';
	protected $sort = 'asc';

    function __construct(){
        parent::__construct();
        $this->load->model('m_gap');
        $id_alternatif = $this->input->post('id_alternatif');
        $id_subkriteria = $this->input->post('id_subkriteria');
		
        $this->data = array(
            'id_alternatif' => $id_alternatif,
            'id_subkriteria' => $id_subkriteria
        );
    }

    function setWhere($id){
		return $this->where = array($this->pk => $id);
	}

	function setDataJoin($namaTable, $namaColumn){
		return array(
			"hasilTable" => $namaTable,
			"hasilColumn" => $namaColumn
		);
	}

    //Tampil Data
	function index(){
        $getdata['aksi'] = $this->home;
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif','nama_alternatif','asc');
        
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';
	}

    function hasil(){
        $sub_kriteria_list = $this->input->post('sub_kriteria');
        $jenis_list = $this->input->post('jenis_kriteria');

        if($sub_kriteria_list && $jenis_list != NULL):
            $hitungid = $this->m_data->hitungid();
            //echo ' <pre> hitungid = ' . print_r($hitungid, true) . '</pre>';
            $getdata['pm'] = $this->m_gap->hitung($hitungid, $sub_kriteria_list, $jenis_list);
        endif;

        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'nama_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif','nama_alternatif','asc');
        $getdata['nilai_alternatif'] = $this->m_data->tampil_data('nilai_alternatif','id_nilai','asc');
        $getdata['nama'] = $this->m_data->nama();

        $this->load->view('template/header');
		$this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';

    }

}