<?php 

class Perhitungan extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'perhitungan/'; //Nama Folder view
    protected $table = 'nilai_alternatif'; //Nama Table
    protected $pk = 'id_nilai'; //Primary Key Table
    protected $home = 'perhitungan'; //Redirect
    protected $orderby = 'nilai_alternatif.id_alternatif, kriteria.nama_kriteria';
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
	function hasil(){
        $sub_kriteria_list = $this->input->post('sub_kriteria');
        echo 'sub_kriteria_list : <pre>' . var_export($sub_kriteria_list, true) . '</pre>';
        
        $data = array(
			$this->setDataJoin('alternatif', 'alternatif.id_alternatif = nilai_alternatif.id_alternatif'),            
			$this->setDataJoin('sub_kriteria', 'sub_kriteria.id_subkriteria = nilai_alternatif.id_subkriteria'),
            $this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);
		$getdata[$this->table] = $this->m_data->getjoin($this->table, $data, $this->orderby, $this->sort);
        $getdata['aksi'] = $this->home;
		$this->load->view('template/header');
		$this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
	}

    //Input Data
	function index(){
        $getdata['aksi'] = $this->home;
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'nama_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif','nama_alternatif','asc');
        
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
	}

    function coba(){
        $data = array(
			$this->setDataJoin('sub_kriteria', 'sub_kriteria.id_subkriteria = nilai_alternatif.id_subkriteria'),
            $this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);
		$getdata[$this->table] = $this->m_data->getjoin($this->table, $data, $this->orderby, $this->sort);
        //$getdata[$this->table] = $this->m_data->tampil_data($this->table, 'id_alternatif', $this->sort);

        // var_export($getdata[$this->table]);
		$hitungid = $this->m_data->hitungid();
        $getdata['pm'] = $this->m_gap->hitung($hitungid);
        //foreach($hitungid as $h){echo '<pre>' . var_export($h, true) . '</pre>';}
        
        $this->load->view('template/header');
		// $this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');

    }

}