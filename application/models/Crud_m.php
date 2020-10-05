<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Crud_m extends CI_Model
{
    public function lihat_data($table)
    {
        return  $query = $this->db->get($table)->result_array();
    }
    public function lihat_data_sort($table, $var, $sort)
    {
        $this->db->order_by($var, $sort);
        return  $query = $this->db->get($table)->result_array();
    }
    public function get_data($where, $table)
    {
        return  $row = $this->db->get_where($table, $where)->result_array(); // jika 1 baris cocok
    }

    public function get_row($where, $table)
    {
        return  $row = $this->db->get_where($table, $where)->row(); // jika 1 baris cocok
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

/* End of file ModelName.php */