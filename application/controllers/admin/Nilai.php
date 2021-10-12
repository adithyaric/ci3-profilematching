<?php 

class Nilai extends CI_Controller{

    // "global" items
    var $data;
    protected $view = 'v_nilai/'; //Nama Folder view
    protected $table = 'nilai_alternatif'; //Nama Table
    protected $pk = 'id_alternatif'; //Primary Key Table
    protected $home = 'admin/nilai'; //Redirect
    protected $orderby = 'id_nilai';
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
        $getdata['setJoinKriteria'] = array(
			$this->setDataJoin('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria')
		);
        $getdata[$this->table] = $this->m_data->tampil_data($this->table, $this->orderby, $this->sort);
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif','nama_alternatif','asc');
        $getdata['aksi'] = $this->home;

        $selectAlternatif = 'nilai_alternatif.id_alternatif, nama_alternatif';
        $joinAlternatif = array(
			$this->setDataJoin('alternatif', 'alternatif.id_alternatif = nilai_alternatif.id_alternatif')
		);
        $getdata['nama'] = $this->m_data->joinGroup($selectAlternatif, $this->table, $joinAlternatif);    
        
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
        $sub_kriteria_list = $this->input->post('sub_kriteria');
        echo 'sub_kriteria_list : <pre>' . print_r($sub_kriteria_list, true) . '</pre>';
        foreach($sub_kriteria_list as $id_subkriteria) {
            $data= array(
                'id_alternatif' => $this->input->post('id_alternatif'),
                'id_subkriteria' => $id_subkriteria
            );
            //echo '<pre>' . print_r($data, true) . '</pre>';
            $this->m_data->input_data($data, $this->table);
        }
		redirect($this->home);
	}

    //Edit Data
    function edit($id){
        $this->setWhere($id);
        $getdata[$this->table] = $this->m_data->edit_data($this->where, $this->table)->result();
        $getdata['alternatif'] = $this->m_data->edit_data($this->where, 'alternatif')->result();
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
		$this->load->view($this->view . 'v_edit', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';        
	}

    function edit_aksi(){
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