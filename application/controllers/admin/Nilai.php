<?php

class Nilai extends CI_Controller
{
    var $data;
    protected $view = 'v_nilai/'; //Nama Folder view
    protected $table = 'nilai_alternatif'; //Nama Table
    protected $pk = 'id_alternatif'; //Primary Key Table
    protected $home = 'admin/nilai'; //Redirect
    protected $orderby = 'id_nilai';
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
        $this->data = array(
            'nama_alternatif' => $nama
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
        $getdata['setJoinKriteria'] = array(
            $this->setDataJoin('kriteria', 'kriteria.id_kriteria = bobot_kriteria.id_kriteria')
        );
        $getdata[$this->table] = $this->m_data->tampil_data($this->table, $this->orderby, $this->sort);
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif', 'id_alternatif', 'asc');
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_tampil', $getdata);
        $this->load->view('template/footer');
    }

    //Tampil Data
    function tambah()
    {
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
    }

    //Hapus Data
    function hapus($id)
    {
        $this->setWhere($id);
        $this->m_data->hapus_data($this->where, $this->table);
        $this->m_data->hapus_data($this->where, 'alternatif');
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
        $cek = $this->db->get_where('alternatif', array('nama_alternatif' => $this->input->post('nama')));
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
        $dataalter = $this->data;
        $this->m_data->input_data(
            $dataalter,
            'alternatif'
        );
        $newUserID = $this->db->insert_id();
        $sub_kriteria_list = $this->input->post('bobot_kriteria');
        foreach ($sub_kriteria_list as $id_bobotkriteria) {
            $data = array(
                'id_alternatif' => $newUserID,
                'id_bobotkriteria' => $id_bobotkriteria
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

    //Edit Data
    function edit($id)
    {
        $this->setWhere($id);
        $getdata[$this->table] = $this->m_data->edit_data($this->where, $this->table)->result();
        $getdata['alternatif'] = $this->m_data->edit_data($this->where, 'alternatif')->result();
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['aksi'] = $this->home;

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_edit', $getdata);
        $this->load->view('template/footer');
    }

    function edit_aksi()
    {
        //Update data attribut
        $id_alternatif = $this->input->post('id');
        $this->setWhere($id_alternatif);
        $data = $this->data;
        $this->m_data->update_data($this->where, $data, 'alternatif');
        $id_nilai = $this->input->post('id_nilai');
        $result = array();
        foreach ($id_nilai as $key => $val) {
            $result[] = array(
                "id_nilai"          => $id_nilai[$key],
                "id_alternatif"     => $_POST['id_alternatif'][$key],
                "id_bobotkriteria"    => $_POST['bobot_kriteria'][$key]
            );
        }
        $this->db->update_batch('nilai_alternatif', $result, 'id_nilai');
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
