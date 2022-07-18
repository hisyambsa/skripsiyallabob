<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');


		$admin = array(
			'judul' => 'BERANDA ADMIN', 
		);
		// $this->load->view('inc/link-head-admin',$admin);
		// $this->load->view('admin/sidebar');
	}

	public function index()
	{
		$data = array(
			'judul' => 'Skripsi_Hasan', 
		);
		$this->load->view('inc/link-head-admin',$data);
		$this->load->view('user/login');
		$this->load->view('inc/footer-js-admin');
	}
	public function auth()
	{
		$user       = $this->input->post('username');
		$password   = $this->input->post('password');
		$this->db->where('username', $user);
		$this->db->where('password', $password);
		$loginAdmin = $this->db->get('login')->row();

		if ($loginAdmin) {

			$data = array(
				'logged' => true
			);
			$this->session->set_userdata($data);
			$messages = 'login succes';
			$this->session->set_tempdata('pesan', $messages, 5);
			redirect('admin','refresh');
		} else {
			$messages = 'login gagal';
			$this->session->set_tempdata('pesan', $messages, 5);
			redirect('login','refresh');
		}
	}
	public function beranda()
	{
		if ($this->session->userdata('akses')==0) {
			$this->load->view('admin/beranda');
		}elseif ($this->session->userdata('akses')==2) {
			$this->load->view('admin/beranda');
		}
		$this->load->view('inc/footer-js-admin');
	}

	public function logout()
	{
		$messages = 'logout berhasil';
		$this->session->set_tempdata('pesan', $messages, 5);
		$this->session->sess_destroy();	
		redirect('login','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */