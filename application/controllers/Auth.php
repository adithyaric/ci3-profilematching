<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('v_login.php');
        $this->load->view('template/footer');
    }
    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $where = array(
            'username' => $username,
            'password' => md5($password),
            'level' => $level,
        );
        $cek = $this->m_data->edit_data($where, "users")->num_rows();
        $petani = $this->m_data->edit_data($where, "users")->row();
        if ($level == 'admin') {
            if ($cek > 0) {

                $data_session = array(
                    'nama' => $username,
                    'status' => "login",
                    'akses' => "admin",
                    'keterangan' => "                     
                        <ol>
                            <li>
                                Langkah pertama yang dilakukan yaitu mengelola data anggota Petani pada Halaman Data Petani.                                
                            </li>
                            <li>
                                Langkah kedua yang dilakukan yaitu mengelola data Kriteria bibit padi pada Halaman Data Kriteria.                                
                            </li>
                            <li>
                                Langkah kedua yang dilakukan yaitu mengelola data Bobot Kriteria bibit padi pada Halaman Data Bobot Kriteria.                                
                            </li>
                            <li>
                                Langkah kedua yang dilakukan yaitu mengelola data Bibit padi bibit padi pada Halaman Data Nilai Profile Alternatif.                                
                            </li>
                        </ol>
						<p>
                            Jika anda menggunakan Smartphone (<i class='fa fa-mobile'></i>) untuk melihat menu yang ada klik tombol 
                            <i class='fa fa-bars'></i>.                          
                        </p>                        
                    "
                );

                $this->session->set_userdata($data_session);

                redirect(base_url("home"));
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Username atau Password Salah!!!
                    </div>
                </div>'
                );
                redirect(base_url('auth'));
            }
        } elseif ($level == 'user') {
            if ($cek > 0) {

                $data_session = array(
                    'nama' => $username,
                    'status' => "login",
                    'akses' => "user",
                    'user_id' => $petani->id,
                    'keterangan' => "
                        <p>
                            Ini merupakan program untuk membantu anda dalam menentukan Bibit padi terbaik.
                        </p>
                        <ol>
                            <li>
                                Langkah pertama yang dilakukan yaitu masuk ke halaman perhitungan
                            </li>
                            <li>
                                Langkah kedua yang dilakukan yaitu masuk ke halaman riwayat untuk melihat hasil perangkingan yang sudah dilakukan                         
                            </li>
                        </ol>
						<p>
                            Jika anda menggunakan Smartphone (<i class='fa fa-mobile'></i>) untuk melihat menu yang ada klik tombol 
                            <i class='fa fa-bars'></i>.                          
                        </p>                         
                    "
                );

                $this->session->set_userdata($data_session);

                redirect(base_url("home"));
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Username atau Password Salah!!!
                    </div>
                </div>'
                );
                redirect(base_url('auth'));
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
