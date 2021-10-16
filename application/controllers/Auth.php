<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
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
            'password' => $password,
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
            echo "Username dan password salah !";
            redirect(base_url('auth'));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
