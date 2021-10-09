<?php 

class Alternatif extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'alternatif/'; //Nama Folder view
    protected $table = 'alternatif'; //Nama Table
    protected $pk = 'id_alternatif'; //Primary Key Table
    protected $home = 'alternatif'; //Redirect
    protected $orderby = 'nama_alternatif';
	protected $sort = 'asc';

    function __construct(){
        parent::__construct();
        $nama = $this->input->post('nama');
		$detail = $this->input->post('detail');
		
        $this->data = array(
            'nama_alternatif' => $nama,
            'detail' => $detail
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
		$getdata[$this->table] = $this->m_data->edit_data($this->where, $this->table)->result();
        $getdata['aksi'] = $this->home;
        
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_edit', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';
	}

    function update(){
        $id = $this->input->post('id');
        $this->setWhere($id);
        $data = $this->data;
        $this->m_data->update_data($this->where, $data, $this->table);
        redirect($this->home);
    }

}