<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
}

/* End of file ModelName.php */
