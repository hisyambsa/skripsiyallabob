<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'judul' => 'qrcodescanner', 
		);

		if (empty($_GET['code'])) {
			$this->load->view('loader');
		}


		if (isset($_GET['code'])) {
			$this->load->view('inc/link-head-admin',$data);
		// $this->load->view('user/nav');    tidak menggunakan navigasi

			$codeurl = $_GET['code'];
			// echo $codeurl;


			$this->load->model('data_peserta_model');
			$data_no_registrasi = $this->data_peserta_model->get_by_no_registrasi($codeurl);
			// var_dump($data_no_registrasi->link);

			if ($data_no_registrasi) {

				$id=$data_no_registrasi->id_data_peserta;
				$status=$data_no_registrasi->status;

				$jamSekarang = date('Y-m-d H:i:s');

				if ($status == 0) {
					$data = array(
						'status' => '1',
						'insert_time' => $jamSekarang, 
					);
					$this->data_peserta_model->update($id, $data);	
				}else{

				}
				$data = array(
					'data_no_registrasi' => true,
					'id_data_peserta' => $data_no_registrasi->id_data_peserta, 
					'nomor' => $data_no_registrasi->nomor, 
					'nama_lengkap_fam' => $data_no_registrasi->nama_lengkap_fam, 
					'nomor_hp' => $data_no_registrasi->nomor_hp, 
					'dpc_dpw' => $data_no_registrasi->dpc_dpw, 
					'no_registrasi' => $data_no_registrasi->no_registrasi, 
					'qrcode' => $data_no_registrasi->qrcode, 
					'status' => $data_no_registrasi->status, 
					'link' => $data_no_registrasi->link, 
					'insert_time' => $data_no_registrasi->insert_time, 
					'update_time' => $data_no_registrasi->update_time, 
				);
				$this->load->view('user/beranda',$data);
				$this->load->view('inc/footer-js-admin');
			}else{

				$data = array(
					'data_no_registrasi' => false,
				);

				$this->load->view('user/beranda',$data);
				$this->load->view('inc/footer-js-admin');
			}
		}

	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */