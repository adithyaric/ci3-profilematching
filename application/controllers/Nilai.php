<?php 

class Nilai extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'nilai/'; //Nama Folder view
    protected $table = 'nilai_alternatif'; //Nama Table
    protected $pk = 'id_alternatif'; //Primary Key Table
    protected $home = 'nilai'; //Redirect
    protected $orderby = 'nilai_alternatif.id_alternatif, kriteria.nama_kriteria';
	protected $sort = 'asc';

    function __construct(){
        parent::__construct();
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

    //Hapus Data
	function hapus($id){
        $this->setWhere($id);
		$this->m_data->hapus_data($this->where, $this->table);
		redirect($this->home);
	}

    //Input Data
    /*** 
	function tambah(){
        $table = 'sub_kriteria'; //Nama Table
        $getdata['aksi'] = $this->home;
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif');
        $data = array(            
			$this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);
		$getdata['sub_kriteria'] = $this->m_data->getjoin($table,$data);

        $this->load->view('template/header');
		$this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
	}

	function tambah_aksi(){
        $data = $this->data;
		$this->m_data->input_data($data, $this->table);
		redirect($this->home);
	}
    */
	function tambah(){
        $getdata['aksi'] = $this->home;
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'jenis_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif','nama_alternatif','asc');
        
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
	}

	function tambah_aksi(){
        $sub_kriteria_list = $this->input->post('sub_kriteria');
        echo 'data : <pre>' . var_export($sub_kriteria_list, true) . '</pre>';
        foreach($sub_kriteria_list as $sub_kriterias) {
            $data= array(
                'id_alternatif' => $this->input->post('id_alternatif'),
                'id_subkriteria' => $sub_kriterias
            );
            echo 'data : <pre>' . var_export($data, true) . '</pre>';
            $this->m_data->input_data($data, $this->table);
        }
		redirect($this->home);
	}

    //Edit Data
    /*** 
	function edit($id){
        $this->setWhere($id);
        $data = array(
			$this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);

		$getdata[$this->table] = $this->m_data->edit_data($this->where, $this->table)->result();
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'jenis_kriteria', 'asc');
        $getdata['ambil_id']    = $this->m_data->ambil_id($this->where, $this->table, $data);

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
    */
    function edit($id){
        $this->setWhere($id);
        $getdata[$this->table] = $this->m_data->edit_data($this->where, $this->table)->result();

        $getdata['alternatif'] = $this->m_data->edit_data($this->where, 'alternatif')->result();
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'jenis_kriteria', 'asc');

        $getdata['aksi'] = $this->home;
        $this->load->view('template/header');
		$this->load->view($this->view . 'v_edit', $getdata);
        $this->load->view('template/footer');
	}

    function update(){
        //Update data attribut
        $id_nilai = $this->input->post('id_nilai');

        $result = array();
        foreach($id_nilai AS $key => $val){
            $result[] = array(
            "id_nilai" => $id_nilai[$key],
            "id_alternatif"  => $_POST['id_alternatif'][$key],
            "id_subkriteria"  => $_POST['sub_kriteria'][$key]
            );
        }
        $this->db->update_batch('nilai_alternatif', $result, 'id_nilai');
        redirect($this->home);      
	}

}