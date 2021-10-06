<?php 

class Kriteria extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'kriteria/'; //Nama Folder view
    protected $table = 'kriteria'; //Nama Table
    protected $pk = 'id_kriteria'; //Primary Key Table
    protected $home = 'kriteria'; //Redirect
    protected $orderby = 'nama_kriteria';
	protected $sort = 'asc';

    function __construct(){
        parent::__construct();
        $nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		
        $this->data = array(
            'nama_kriteria' => $nama,
            'jenis_kriteria' => $jenis
        );
    }

    function setWhere($id){
		return $this->where = array($this->pk => $id);
	}

    //Tampil Data
	function index(){
		$getdata[$this->table] = $this->m_data->tampil_data($this->table, $this->orderby, $this->sort);
        $getdata['aksi'] = $this->home;
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
	}

    //Hapus Data
	function hapus($id){
        $this->setWhere($id);
		$this->m_data->hapus_data($this->where, $this->table);
		redirect($this->home);
	}

    //Input Data
	function tambah(){
        $getdata['aksi'] = $this->home;
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
	}

	function tambah_aksi(){
        $data = $this->data;
		$this->m_data->input_data($data, $this->table);
		redirect($this->home);
	}

    //Edit Data
	function edit($id){
        $this->setWhere($id);
		$getdata[$this->table] = $this->m_data->edit_data($this->where, $this->table)->result();
        $getdata['aksi'] = $this->home;
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_edit', $getdata);
        $this->load->view('template/footer');
	}

    function update(){
        $id = $this->input->post('id');
        $this->setWhere($id);
        $data = $this->data;
        $this->m_data->update_data($this->where, $data, $this->table);
        redirect($this->home);
    }

}