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
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('v_home.php');
		$this->load->view('template/footer');
	}
	public function blank()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('blank.html');
		$this->load->view('template/footer');
	}
}
