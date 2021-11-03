<?php

class Perhitungan extends CI_Controller
{

    // "global" items
    var $data;
    protected $view = 'v_perhitungan/'; //Nama Folder view
    protected $table = 'nilai_alternatif'; //Nama Table
    protected $pk = 'id_nilai'; //Primary Key Table
    protected $home = 'admin/perhitungan'; //Redirect
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
        $this->load->model('m_gap');
        $id_alternatif = $this->input->post('id_alternatif');
        $id_subkriteria = $this->input->post('id_subkriteria');

        $this->data = array(
            'id_alternatif' => $id_alternatif,
            'id_subkriteria' => $id_subkriteria
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
        $getdata['aksi'] = $this->home;
        $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
        $getdata['alternatif'] = $this->m_data->tampil_data('alternatif', 'nama_alternatif', 'asc');

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view($this->view . 'v_input', $getdata);
        $this->load->view('template/footer');
        //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';
    }

    function hasil()
    {
        $data['sub_kriteria_list'] = $this->input->post('sub_kriteria');
        $data['jenis_list'] = $this->input->post('jenis_kriteria');
        $data['cf'] = $this->input->post('cf');
        $data['sf'] = $this->input->post('sf');
        $maxPercentage = 100;
        $totalPercentage = $data['cf'] + $data['sf'];
        //echo ' <pre> data = ' . print_r($data, true) . '</pre>';

        if ($totalPercentage == NULL) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Anda harus mengisi nilai terlebih dahulu!!
                    </div>
                </div>'
            );
            redirect(base_url('admin/perhitungan'));
        }
        if ($totalPercentage < $maxPercentage) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Total Core factor & secondary Kurang dari 100%
                    </div>
                </div>'
            );
            redirect(base_url('admin/perhitungan'));
        } elseif ($totalPercentage > $maxPercentage) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Total Core factor & secondary Lebih dari 100%
                    </div>
                </div>'

            );
            redirect(base_url('admin/perhitungan'));
        } else {
            $selectSub_kriteriaNilai = 'nilai_alternatif.id_alternatif, GROUP_CONCAT(nilai) as nilai';
            $joinSub_kriteria = array(
                $this->setDataJoin('sub_kriteria', 'sub_kriteria.id_subkriteria = nilai_alternatif.id_subkriteria')
            );
            $hitungnilai = $this->m_data->joinGroup($selectSub_kriteriaNilai, $this->table, $joinSub_kriteria);

            $getdata['hasil'] = $this->m_gap->hitung($hitungnilai, $data);
            //echo ' <pre> hitungid = ' . print_r($hitungnilai, true) . '</pre>';

            $selectAlternatif = 'nilai_alternatif.id_alternatif, nama_alternatif';
            $joinAlternatif = array(
                $this->setDataJoin('alternatif', 'alternatif.id_alternatif = nilai_alternatif.id_alternatif')
            );
            $getdata['nama'] = $this->m_data->joinGroup($selectAlternatif, $this->table, $joinAlternatif);
            $getdata['kriteria'] = $this->m_data->tampil_data('kriteria', 'id_kriteria', 'asc');
            $getdata['nilai_alternatif'] = $this->m_data->tampil_data('nilai_alternatif', 'id_alternatif', 'asc');

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view($this->view . 'v_tampil', $getdata);
            $this->load->view('template/footer');
            //echo ' <pre> getdata = ' . print_r($getdata, true) . '</pre>';
        }
    }
}
