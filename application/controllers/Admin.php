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
		$this->load->view('example', $output);
	}

	public function data()
	{
		$data = array(
			'judul' => 'ADMIN SCAN',
		);
		$this->load->view('inc/link-head-admin', $data);
		$crud = new grocery_CRUD();
		$crud->set_table('data_peserta');
		$crud->set_theme('datatables');
		$crud->order_by('timestamp', 'asc');

		$crud->display_as('nama_lengkap_fam', 'Nama dan Marga');
		$crud->display_as('dpc_dpw', 'Asal Cabang');
		$crud->display_as('insert_time', 'First Scan');
		$crud->display_as('update_time', 'Last Scan');

		$crud->add_fields(array('nama_lengkap_fam', 'email', 'nomor_hp', 'dpc_dpw'));
		$crud->columns(array('timestamp', 'nama_lengkap_fam', 'status', 'email', 'nomor_hp', 'dpc_dpw', 'insert_time', 'update_time'));
		$crud->edit_fields(array('nama_lengkap_fam', 'email', 'nomor_hp', 'dpc_dpw'));
		$crud->required_fields(array('nama_lengkap_fam', 'email', 'nomor_hp', 'dpc_dpw'));

		$crud->set_language("indonesian");
		// $crud->unset_export();
		$crud->unset_print();
		$crud->unset_clone();

		$crud->callback_after_insert(array($this, 'log_user_after_insert'));
		$crud->callback_column('status', array($this, '_callback_status'));
		$output = $crud->render();
		$this->_example_output($output);
		$this->load->view('inc/footer-js-crud');
	}

	function log_user_after_insert($post_array, $primary_key)
	{
		$object = array(
			"no_registrasi" => 'yallabob-' . str_pad($primary_key, 4, 0, STR_PAD_LEFT),
			"status" => 0,
			"link" => base_url('beranda') . '?code=yallabob-' . str_pad($primary_key, 4, 0, STR_PAD_LEFT),
		);


		$this->db->where('id_data_peserta', $primary_key);
		$this->db->update('data_peserta', $object);

		return true;
	}

	public function _callback_status($value, $row)
	{
		if ($value == 0) {
			return 'BELUM CHECK-IN';
		} else {
			return 'SUDAH CHECK-IN';
		}
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