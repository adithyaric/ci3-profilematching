<?php

class Riwayat extends CI_Controller
{
    var $data;
    protected $view = 'v_riwayat/'; //Nama Folder view
    protected $table = 'riwayat'; //Nama Table
    protected $pk = 'id_keterangan'; //Primary Key Table
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

    function setDataJoin($namaTable, $namaColumn)
    {
        return array(
            "hasilTable" => $namaTable,
            "hasilColumn" => $namaColumn
        );
    }
    //Tampil Data
    function index()
    {
        if (isset($_GET['tanggal']) && !empty($_GET['tanggal'])) {
            $tgl = $_GET['tanggal'];
            $where = array(
                'tanggal ' => $tgl,
                'id_user ' => $this->session->userdata("user_id")
            );
            $data = array(
                $this->setDataJoin('keterangan', 'keterangan.id_keterangan = riwayat.id_keterangan')
            );
            $getdata[$this->table]  = $this->m_data->getjoin_byid($where, 'riwayat', $data);
        } else {
            $where = array(
                'id_user ' => $this->session->userdata("user_id")
            );
            $ket = $this->m_data->edit_data($where, "keterangan")->last_row();
            $cek = $this->m_data->edit_data($where, "keterangan")->num_rows();
            if ($cek > 0) {
                $tgl = $ket->tanggal;
            } else {
                $tgl = date('Y-m-d');
            }
            $where = array('tanggal ' => $tgl, 'id_user ' => $this->session->userdata("user_id"));
            $data = array(
                $this->setDataJoin('keterangan', 'keterangan.id_keterangan = riwayat.id_keterangan')
            );
            $getdata[$this->table]  = $this->m_data->getjoin_byid($where, 'riwayat', $data);
        }
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
        $this->m_data->hapus_data($this->where, 'keterangan');
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
        $cek1 = $this->db->get_where('keterangan', array('tanggal' => $tanggal));
        $cek2 = $this->db->get_where('keterangan', array('id_user ' => $this->session->userdata("user_id")));
        if ($cek1->num_rows() && $cek2->num_rows() != 0) {
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
        $dataket =
            array(
                'tanggal'   => $tanggal,
                'id_user'   => $_POST['user_id'],
                'detail'    => $_POST['keterangan']
            );
        $this->m_data->input_data($dataket, "keterangan");
        $newUserID = $this->db->insert_id();
        $rangking    = $this->input->post('rangking');
        foreach ($rangking as $key => $value) {
            $data = array(
                "rangking"          => $rangking[$key],
                'id_keterangan'     => $newUserID,
                "nama_alternatif"   => $_POST['nama_alternatif'][$key],
                "nilai"             => $_POST['nilai'][$key],
            );
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
