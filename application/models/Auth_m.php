<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    public function cek_user($where, $table)
    {
        return $this->db->get_where($table, $where)->row_array(); // jika 1 baris cocok
    }
}

/* End of file ModelName.php */