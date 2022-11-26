<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reset_model extends MY_Model
{
    public function get_member_by_username($email)
    {
        return $this->db->get_where('user', array('email' => $email, 'is_active' => '1'))->row();
    }

    public function update_reset_key($email, $reset_key)
    {
        $this->db->where('email', $email);
        $data = array('reset_password' => $reset_key);
        $this->db->update('user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function reset_password($reset_key, $password)
    {
        $this->db->where('reset_password', $reset_key);
        $data = array('password' => $password);
        $this->db->update('user', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }


    public function check_reset_key($reset_key)
    {
        $this->db->where('reset_password', $reset_key);
        $this->db->from('user');
        return $this->db->count_all_results();
    }
}
