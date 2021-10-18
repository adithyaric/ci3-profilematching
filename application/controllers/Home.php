<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			$this->session->set_flashdata(
				'pesan',
				'Anda harus login terlebih dahulu'
			);
			redirect(base_url('auth'));
		}
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('v_home.php');
		$this->load->view('template/footer');
	}
}
