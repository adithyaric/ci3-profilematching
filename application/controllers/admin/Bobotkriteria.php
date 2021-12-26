<?php

class Bobotkriteria extends CI_Controller
{
    var $data;
    protected $view = 'v_bobotkriteria/'; //Nama Folder view
    protected $table = 'bobot_kriteria'; //Nama Table
    protected $pk = 'id_bobotkriteria'; //Primary Key Table
    protected $home = 'admin/bobotkriteria'; //Redirect
    protected $orderby = 'bobot_kriteria.id_kriteria, bobot_kriteria.nilai';
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
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');

        $this->data = array(
            'nama_bobotkriteria' => $nama,
            'id_kriteria' => $id_kriteria,
            'nilai' => $nilai
        );
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
        $data = array(
            $this->setDataJoin('kriteria', 'kriteria.id_kriteria = bobot_kriteria.id_kriteria')
        );
        $getdata[$this->table] = $this->m_data->getjoin($this->table, $data, $this->orderby, $this->sort);
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');        
    }
    //Tampil Data
    function detail($id)
    {
        $getdata['where'] = array('id_kriteria' => $id);
        $getdata[$this->table]  = $this->m_data->edit_data($getdata['where'], $this->table)->result();
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_detail', $getdata);
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
        $nama = $this->input->post('nama');
        foreach ($nama as $key => $namaSub) {
            $data = array(
                'nama_bobotkriteria' => $namaSub,                
            );
            echo '<pre>' . print_r($data, true) . '</pre>';            
            $cek = $this->db->get_where('bobot_kriteria', array('nama_bobotkriteria' => $namaSub));
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
        }        
        foreach ($nama as $key => $id_kriteriax) {
            $data = array(
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_bobotkriteria' => $id_kriteriax,
                'nilai' => $this->input->post('nilai')[$key],
            );
            echo '<pre>' . print_r($data, true) . '</pre>';
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
