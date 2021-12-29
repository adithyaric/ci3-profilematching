<?php

class User extends CI_Controller
{
    var $data;
    protected $view = 'v_user/'; //Nama Folder view
    protected $table = 'users'; //Nama Table
    protected $pk = 'id'; //Primary Key Table
    protected $home = 'admin/user'; //Redirect
    protected $orderby = 'id';
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
        } else if ($this->session->userdata('akses') != 'admin') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Anda tidak bisa akses halaman ini!!!
                </div>
                </div>'
            );
            redirect(base_url('auth'));
        }
        $nama = $this->input->post('nama');
        $password = md5($this->input->post('password'));

        $this->data = array(
            'username' => $nama,
            'password' => $password
        );
    }

    function setWhere($id)
    {
        return $this->where = array($this->pk => $id);
    }

    //Tampil Data
    function index()
    {
        $where = array('level ' => 'user');
        $getdata[$this->table]  = $this->m_data->edit_data($where, $this->table)->result();
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
    }

    //Hapus Data
    function hapus($id)
    {
        $this->setWhere($id);
        $this->m_data->hapus_data($this->where, $this->table);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Data berhasil di Hapus!
                    </div>
                </div>'
        );
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
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Data berhasil di tambahkan!
                    </div>
                </div>'
        );
        redirect($this->home);
    }

    //Edit Data
    function edit_aksi()
    {
        $id = $this->input->post('id');
        $this->setWhere($id);
        $data = $this->data;
        $this->m_data->update_data($this->where, $data, $this->table);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Data berhasil di ubah!
                    </div>
                </div>'
        );
        redirect($this->home);
    }
}
