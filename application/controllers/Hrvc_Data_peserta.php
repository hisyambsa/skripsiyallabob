<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Hrvc_Data_peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hrvc_Data_peserta_model');
        $this->load->library('form_validation');

        $admin = array(
            'judul' => 'BERANDA ADMIN',
        );
        $this->load->view('inc/link-head-admin', $admin);
        $this->load->view('admin/sidebar');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'hrvc_data_peserta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hrvc_data_peserta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hrvc_data_peserta/index.html';
            $config['first_url'] = base_url() . 'hrvc_data_peserta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
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

        $this->load->view('hrvc_data_peserta/data_peserta_list', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function read($id)
    {
        $row = $this->Hrvc_Data_peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_data_peserta' => $row->id_data_peserta,
                'nomor' => $row->nomor,
                'nama_lengkap_fam' => $row->nama_lengkap_fam,
                'nomor_hp' => $row->nomor_hp,
                'dpc_dpw' => $row->dpc_dpw,
                'no_registrasi' => $row->no_registrasi,
                'qrcode' => $row->qrcode,
                'status' => $row->status,
                'link' => $row->link,
                'insert_time' => $row->insert_time,
                'update_time' => $row->update_time,
            );
            $this->load->view('hrvc_data_peserta/data_peserta_read', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            $this->session->set_flashdata('pesan', 'Data tidak ditemukan');
            redirect(site_url('hrvc_data_peserta'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('hrvc_data_peserta/create_action'),
            'id_data_peserta' => set_value('id_data_peserta'),
            'nomor' => set_value('nomor'),
            'nama_lengkap_fam' => set_value('nama_lengkap_fam'),
            'nomor_hp' => set_value('nomor_hp'),
            'dpc_dpw' => set_value('dpc_dpw'),
            'no_registrasi' => set_value('no_registrasi'),
            'qrcode' => set_value('qrcode'),
            'status' => set_value('status'),
            'link' => set_value('link'),
            'insert_time' => set_value('insert_time'),
            'update_time' => set_value('update_time'),
        );
        $this->load->view('hrvc_data_peserta/data_peserta_form', $data);
        $this->load->view('inc/footer-js-admin');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomor' => $this->input->post('nomor', TRUE),
                'nama_lengkap_fam' => $this->input->post('nama_lengkap_fam', TRUE),
                'nomor_hp' => $this->input->post('nomor_hp', TRUE),
                'dpc_dpw' => $this->input->post('dpc_dpw', TRUE),
                'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                'qrcode' => $this->input->post('qrcode', TRUE),
                'status' => $this->input->post('status', TRUE),
                'link' => $this->input->post('link', TRUE),
                'insert_time' => $this->input->post('insert_time', TRUE),
                'update_time' => $this->input->post('update_time', TRUE),
            );

            $this->Hrvc_Data_peserta_model->insert($data);
            $this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
            redirect(site_url('hrvc_data_peserta'));
        }
    }

    public function update($id)
    {
        $row = $this->Hrvc_Data_peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('hrvc_data_peserta/update_action'),
                'id_data_peserta' => set_value('id_data_peserta', $row->id_data_peserta),
                'nomor' => set_value('nomor', $row->nomor),
                'nama_lengkap_fam' => set_value('nama_lengkap_fam', $row->nama_lengkap_fam),
                'nomor_hp' => set_value('nomor_hp', $row->nomor_hp),
                'dpc_dpw' => set_value('dpc_dpw', $row->dpc_dpw),
                'no_registrasi' => set_value('no_registrasi', $row->no_registrasi),
                'qrcode' => set_value('qrcode', $row->qrcode),
                'status' => set_value('status', $row->status),
                'link' => set_value('link', $row->link),
                'insert_time' => set_value('insert_time', $row->insert_time),
                'update_time' => set_value('update_time', $row->update_time),
            );
            $this->load->view('hrvc_data_peserta/data_peserta_form', $data);
            $this->load->view('inc/footer-js-admin');
        } else {
            $this->session->set_flashdata('pesan', 'Data tidak ditemukan');
            redirect(site_url('hrvc_data_peserta'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_data_peserta', TRUE));
        } else {
            $data = array(
                'nomor' => $this->input->post('nomor', TRUE),
                'nama_lengkap_fam' => $this->input->post('nama_lengkap_fam', TRUE),
                'nomor_hp' => $this->input->post('nomor_hp', TRUE),
                'dpc_dpw' => $this->input->post('dpc_dpw', TRUE),
                'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                'qrcode' => $this->input->post('qrcode', TRUE),
                'status' => $this->input->post('status', TRUE),
                'link' => $this->input->post('link', TRUE),
                'insert_time' => $this->input->post('insert_time', TRUE),
                'update_time' => $this->input->post('update_time', TRUE),
            );

            $this->Hrvc_Data_peserta_model->update($this->input->post('id_data_peserta', TRUE), $data);
            $this->session->set_flashdata('pesan', 'Berhasil Ubah Data');
            redirect(site_url('hrvc_data_peserta'));
        }
    }

    public function delete($id)
    {
        $row = $this->Hrvc_Data_peserta_model->get_by_id($id);

        if ($row) {
            $this->Hrvc_Data_peserta_model->delete($id);
            $this->session->set_flashdata('pesan', 'Berhasil Hapus Data');
            redirect(site_url('hrvc_data_peserta'));
        } else {
            $this->session->set_flashdata('pesan', 'Data tidak ditemukan');
            redirect(site_url('hrvc_data_peserta'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nomor', 'nomor', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap_fam', 'nama lengkap fam', 'trim|required');
        $this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim|required');
        $this->form_validation->set_rules('dpc_dpw', 'dpc dpw', 'trim|required');
        $this->form_validation->set_rules('no_registrasi', 'no registrasi', 'trim|required');
        $this->form_validation->set_rules('qrcode', 'qrcode', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');
        $this->form_validation->set_rules('insert_time', 'insert time', 'trim|required');
        $this->form_validation->set_rules('update_time', 'update time', 'trim|required');

        $this->form_validation->set_rules('id_data_peserta', 'id_data_peserta', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Hrvc_Data_peserta.php */
/* Location: ./application/controllers/Hrvc_Data_peserta.php */