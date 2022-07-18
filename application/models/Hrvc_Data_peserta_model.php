<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hasan .................. -->
<!-- Email : attoz.151@gmail.com ...... -->
<!-- .................................. -->
*/
class Hrvc_Data_peserta_model extends CI_Model
{

    public $table = 'data_peserta';
    public $id = 'id_data_peserta';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_data_peserta', $q);
        $this->db->or_like('nomor', $q);
        $this->db->or_like('nama_lengkap_fam', $q);
        $this->db->or_like('nomor_hp', $q);
        $this->db->or_like('dpc_dpw', $q);
        $this->db->or_like('no_registrasi', $q);
        $this->db->or_like('qrcode', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('link', $q);
        $this->db->or_like('insert_time', $q);
        $this->db->or_like('update_time', $q);
        $this->db->from($this->table);
        $test = $this->db->count_all_results();
        var_dump($test);
        die;
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_data_peserta', $q);
        $this->db->or_like('nomor', $q);
        $this->db->or_like('nama_lengkap_fam', $q);
        $this->db->or_like('nomor_hp', $q);
        $this->db->or_like('dpc_dpw', $q);
        $this->db->or_like('no_registrasi', $q);
        $this->db->or_like('qrcode', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('link', $q);
        $this->db->or_like('insert_time', $q);
        $this->db->or_like('update_time', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Hrvc_Data_peserta_model.php */
/* Location: ./application/models/Hrvc_Data_peserta_model.php */