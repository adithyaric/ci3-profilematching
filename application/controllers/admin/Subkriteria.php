<?php 

class Subkriteria extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'subkriteria/'; //Nama Folder view
    protected $table = 'sub_kriteria'; //Nama Table
    protected $pk = 'id_subkriteria'; //Primary Key Table
    protected $home = 'admin/subkriteria'; //Redirect
    protected $orderby = 'sub_kriteria.id_kriteria, sub_kriteria.nilai';
	protected $sort = 'asc';

    function __construct(){
        parent::__construct();
        $nama = $this->input->post('nama');
        $id_kriteria = $this->input->post('id_kriteria');
		$nilai = $this->input->post('nilai');
		
        $this->data = array(
            'nama_subkriteria' => $nama,
            'id_kriteria' => $id_kriteria,
            'nilai' => $nilai
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
        $data = array(
			$this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);
		$getdata[$this->table] = $this->m_data->getjoin($this->table, $data, $this->orderby, $this->sort);
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['aksi'] = $this->home;
		
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';
	}

    //Hapus Data
	function hapus($id){
        $this->setWhere($id);
		$this->m_data->hapus_data($this->where, $this->table);
		redirect($this->home);
	}

    //Input Data
	function tambah_aksi(){
        $data = $this->data;
		$this->m_data->input_data($data, $this->table);
		redirect($this->home);
	}

    //Edit Data
	function edit($id){
        $this->setWhere($id);
        $data = array(
			$this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);
		$getdata[$this->table]  = $this->m_data->edit_data($this->where, $this->table)->result();
        $getdata['kriteria']    = $this->m_data->tampil_data('kriteria', 'jenis_kriteria', 'asc');
        $getdata['ambil_id']    = $this->m_data->ambil_id($this->where, $this->table, $data);
        $getdata['aksi'] = $this->home;
        
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_edit', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata['ambil_id'], true) . '</pre>';
	}

    function update(){
        $id = $this->input->post('id');
        $this->setWhere($id);
        $data = $this->data;
        $this->m_data->update_data($this->where, $data, $this->table);
        redirect($this->home);
    }

}