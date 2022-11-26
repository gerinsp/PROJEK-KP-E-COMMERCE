<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends MY_Model
{
    public function perday($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('orders_detail');
        $this->db->join('orders', 'orders.id = orders_detail.id_orders', 'left');
        $this->db->join('product', 'product.id = orders_detail.id_product', 'left');
        $this->db->where('DAY(orders.date)', $tanggal);
        $this->db->where('MONTH(orders.date)', $bulan);
        $this->db->where('YEAR(orders.date)', $tahun);
        return $this->db->get()->result();
    }

    public function permonth($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('orders_detail');
        $this->db->join('orders', 'orders.id = orders_detail.id_orders', 'left');
        $this->db->where('MONTH(orders.date)', $bulan);
        $this->db->where('YEAR(orders.date)', $tahun);
        $this->db->where('status="accepted"');

        return $this->db->get()->result();
    }

    public function peryears($tahun)
    {
        $this->db->select('*');
        $this->db->from('orders_detail');
        $this->db->join('orders', 'orders.id = orders_detail.id_orders', 'left');
        $this->db->where('YEAR(orders.date)', $tahun);
        $this->db->where('status="accepted"');

        return $this->db->get()->result();
    }
}

/* End of file Report_model.php */
