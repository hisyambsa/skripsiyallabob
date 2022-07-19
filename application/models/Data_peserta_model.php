<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Data_peserta_model extends CI_Model
{

    public $table = 'data_peserta';
    public $id = 'id_data_peserta';
    public $no_registrasi = 'no_registrasi';
    public $order = 'DESC';

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

    // get data by id
    function get_by_no_registrasi($id)
    {
        $this->db->where($this->no_registrasi, $id);
        return $this->db->get($this->table)->row();
    }


    // get total rows
    function total_rows($status = NULL, $q = NULL)
    {

        if ($status != NULL) {
            foreach ($status as $data => $value) {
                $this->db->or_like('status', $value, 'BOTH');
            }
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);

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

    function reset_status($data)
    {
        $this->db->set('insert_time', null);
        $this->db->set('update_time', null);

        $this->db->update($this->table, $data);
    }


    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Wo_include_model.php */
/* Location: ./application/models/Wo_include_model.php */
