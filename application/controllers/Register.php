<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function form()
	{
		$admin = array(
			'judul' => 'BERANDA ADMIN',
		);
		$this->load->view('inc/link-head-admin', $admin);
		$this->load->view('register/form');
	}
	public function form_action()
	{
		var_dump($_POST);
		die;

		$this->load->helper('string');
		$qrcode_legal_statement = strtoupper(random_string('alpha', 10) . '17');

		$data = array(

			'nomor'		=> $_POST['nomor'],
			'nama_lengkap_fam' 	=> $_POST['nama_lengkap_fam'],
			'nomor_hp'	=> $_POST['nomor_hp'],
			'dpc_dpw'	=> $_POST['dpc_dpw'],
		);
		$query = $this->db->insert('data_peserta', $data);
		var_dump($query);
		die;
		if ($query) {
			//kalau berhasil alihkan ke halaman index.php dengan status = sukses
			//	header('Location: home.php?status=sukses');
			$messages = 'succes';
			$this->session->set_tempdata('pesan', $messages, 5);
			redirect(base_url('admin'));
		} else {
			//kalau gagal alihkan ke halaman index.php dengan status = gagal
			//	header('Location :home.php?status=gagal');
			$messages = 'gagal';
			$this->session->set_tempdata('pesan', $messages, 5);
			redirect(base_url('admin'));
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */