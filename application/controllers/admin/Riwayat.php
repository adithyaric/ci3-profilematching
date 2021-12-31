<?php

class Riwayat extends CI_Controller
{
    var $data;
    protected $view = 'v_riwayat/'; //Nama Folder view
    protected $table = 'riwayat'; //Nama Table
    protected $pk = 'id_riwayat'; //Primary Key Table
    protected $home = 'admin/riwayat'; //Redirect
    protected $orderby = 'id_riwayat';
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
        } else if ($this->session->userdata('akses') != 'user') {
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
    }

    function setWhere($id)
    {
        return $this->where = array($this->pk => $id);
    }

    //Tampil Data
    function index()
    {
        if (isset($_GET['tanggal'])) {
            $tgl = $_GET['tanggal'];
            $where = array('tanggal ' => $tgl);
            $getdata[$this->table]  = $this->m_data->edit_data($where, $this->table)->result();
        } else {       
            $tgl = date('Y-m-d');
            $where = array('tanggal ' => $tgl);
            $getdata[$this->table]  = $this->m_data->edit_data($where, $this->table)->result();
            // $getdata[$this->table] = $this->m_data->tampil_data($this->table, $this->orderby, $this->sort);
        }
        $getdata['tanggal'] = $tgl;
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
        $tanggal    = $this->input->post('tanggal');        
        $cek = $this->db->get_where('riwayat', array('tanggal' => $tanggal[0]));
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
        //nama, nilai, rangking, tanggal
        $rangking    = $this->input->post('rangking');
        foreach ($rangking as $key => $value) {
            $data = array(
                "rangking"          => $rangking[$key],
                "nama_alternatif"   => $_POST['nama_alternatif'][$key],
                "nilai"             => $_POST['nilai'][$key],
                "tanggal"           => $tanggal[$key],
            );
            echo "<pre>" . json_encode($data);
            $this->m_data->input_data($data, $this->table);
        }        
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
}
