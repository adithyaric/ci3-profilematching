<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('v_users/v_login.php');
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
        if ($cek > 0) {
            $data_session = array(
                'nama' => $username,
                'status' => "login"
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

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
