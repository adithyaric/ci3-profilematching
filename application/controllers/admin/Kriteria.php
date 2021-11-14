<?php

class Kriteria extends CI_Controller
{

    // "global" items
    var $data;
    protected $view = 'v_kriteria/'; //Nama Folder view
    protected $table = 'kriteria'; //Nama Table
    protected $pk = 'id_kriteria'; //Primary Key Table
    protected $home = 'admin/kriteria'; //Redirect
    protected $orderby = 'id_kriteria';
    protected $sort = 'asc';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Anda harus Login terlebih dahulu!!!
                    </div>
                </div>'
            );
            redirect(base_url('auth'));
        }
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');

        $this->data = array(
            'nama_kriteria' => $nama,
            'jenis_kriteria' => $jenis
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
        redirect($this->home);
    }

    //Input Data
    function tambah_aksi()
    {
        $cek = $this->db->get_where('kriteria', array('nama_kriteria' => $this->input->post('nama')));
        if ($cek->num_rows() != 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Maaf Data sudah ada!
                    </div>
                </div>'
            );
            redirect($this->home);
        }        
        $data = $this->data;
        $this->m_data->input_data($data, $this->table);
        redirect($this->home);
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
}
