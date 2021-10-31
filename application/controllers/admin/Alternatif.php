<?php

class Alternatif extends CI_Controller
{

    // "global" items
    var $data;
    protected $view = 'v_alternatif/'; //Nama Folder view
    protected $table = 'alternatif'; //Nama Table
    protected $pk = 'id_alternatif'; //Primary Key Table
    protected $home = 'admin/alternatif'; //Redirect
    protected $orderby = 'nama_alternatif';
    protected $sort = 'asc';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata(
                'pesan',
                'Anda harus login terlebih dahulu'
            );
            redirect(base_url('auth'));
        }
        $nama = $this->input->post('nama');
        $detail = $this->input->post('detail');

        $this->data = array(
            'nama_alternatif' => $nama,
            'detail' => $detail
        );
    }

    function setWhere($id)
    {
        return $this->where = array($this->pk => $id);
    }

    //Tampil Data
    function index()
    {
        $getdata[$this->table] = $this->m_data->tampil_data($this->table, $this->orderby, $this->sort);
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';
    }

    //Hapus Data
    function hapus($id)
    {
        $this->setWhere($id);
        $this->m_data->hapus_data($this->where, $this->table);
        $this->session->set_flashdata(
            'pesan',
            'Data berhasil dihapus'
        );
        redirect($this->home);
    }

    //Input Data
    function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = $this->data;
            $this->m_data->input_data($data, $this->table);
            $this->session->set_flashdata(
                'pesan',
                'Data berhasil ditambahkan'
            );
            redirect($this->home);
        }
    }

    //Edit Data
    function edit_aksi()
    {
        $id = $this->input->post('id');
        $this->setWhere($id);
        $data = $this->data;
        $this->m_data->update_data($this->where, $data, $this->table);
        redirect($this->home);
    }

    public function _rules()
    {
        $validations = array(
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Nama wajib diisi!',
                ),
            ),
            array(
                'field' => 'detail',
                'label' => 'detail',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Detail wajib diisi!',
                ),
            ),
        );
        $this->form_validation->set_rules($validations);
    }
}
