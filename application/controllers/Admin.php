<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	private function _example_output($output = null)
	{
		$this->load->view('example.php', $output);
	}

	public function index()
	{
		$output = $this->grocery_crud->render();
		$this->_example_output($output);
	}
	public function lama()
	{
		$data = array(
			'judul' => 'ADMIN SCAN',
		);
		$this->load->view('inc/link-full', $data);
		// $this->load->view('admin/sidebar');

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'admin/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'admin/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'admin/index.html';
			$config['first_url'] = base_url() . 'admin/index.html';
		}

		$config['per_page'] = 1000;
		$config['page_query_string'] = TRUE;

		$this->load->model('Hrvc_Data_peserta_model');
		$config['total_rows'] = $this->Hrvc_Data_peserta_model->total_rows($q);
		$hrvc_data_peserta = $this->Hrvc_Data_peserta_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'hrvc_data_peserta_data' => $hrvc_data_peserta,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);


		$this->load->view('admin/beranda', $data);
		// $this->load->view('inc/footer-js-admin');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */