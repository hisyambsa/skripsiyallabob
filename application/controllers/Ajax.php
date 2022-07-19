<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    // require_once BASEPATH.'core/copyright.php';
  }

  public function cekPasswordAdmin()
  {
    $this->load->model('login_model');
    $user       = 'admin';
    $password   = $this->input->post('pass');
    $loginadmin = $this->login_model->loginadmin($user, $password);

    if ($loginadmin) {
      echo "true";
    } else {
      echo "false";
    }
  }


  public function update_status()
  {
    $this->load->model('data_peserta_model');
    $id_data_peserta   = $this->input->post('id_data_peserta');

    $row = $this->data_peserta_model->get_by_id($id_data_peserta);


    $myObj = new stdClass();
    $myObj->code = $id_data_peserta;


    $jamSekarang = date('Y-m-d H:i:s');

    if ($row->status == 2) {

      $data = array(
        'status' => '1',
        'update_time' => $jamSekarang,
      );
    } elseif ($row->status == 1) {
      $data = array(
        'status' => '2',
        'update_time' => $jamSekarang,
      );
    }
    $total = $this->data_peserta_model->update($id_data_peserta, $data);


    $myJSON = json_encode($myObj);

    echo $myJSON;
  }

  public function update_data()
  {
    $this->load->model('data_peserta_model');
    $code   = $this->input->post('code');
    $id_data_peserta   = $this->input->post('id_data_peserta');
    $id_nomor_hp   = $this->input->post('id_nomor_hp');

    $data = array('nomor_hp' => $id_nomor_hp,);
    $total = $this->data_peserta_model->update($id_data_peserta, $data);


    $myObj = new stdClass();
    $myObj->code = $code;
    $myObj->id_nomor_hp = $id_nomor_hp;
    $myJSON = json_encode($myObj);

    echo $myJSON;
  }

  public function total()
  {
    $this->load->model('data_peserta_model');
    $data_status = array("0", "1", "2", "3");
    $total = $this->data_peserta_model->total_rows();
    echo $total;
  }

  public function checkin()
  {
    $this->load->model('data_peserta_model');
    $data_status = array("1", "2", "3");
    $total = $this->data_peserta_model->total_rows($data_status);
    echo $total;
  }
  public function data_masuk()
  {
    $this->load->model('data_peserta_model');
    $data_status = array("1");
    $total = $this->data_peserta_model->total_rows($data_status);
    echo $total;
  }

  public function data_keluar()
  {
    $this->load->model('data_peserta_model');
    $data_status = array("2");
    $total = $this->data_peserta_model->total_rows($data_status);
    echo $total;
  }

  public function reset_status()
  {
    $this->load->model('data_peserta_model');
    $data_status = array(
      'status' => "0"
    );
    $total = $this->data_peserta_model->reset_status($data_status);
    echo $total;
  }
}
/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */