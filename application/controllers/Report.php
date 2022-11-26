<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['page']  = 'pages/report/index';

        $this->view($data);
    }

    public function perday()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['title'] = 'Laporan Penjualan Harian';
        $data['tanggal'] = $tanggal;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['report'] = $this->report_model->perday($tanggal, $bulan, $tahun);
        $data['page']  = 'pages/report/perday';

        $this->view($data);
    }

    public function permonth()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['title'] = 'Laporan Penjualan Bulanan';
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['report'] = $this->report_model->permonth($bulan, $tahun);
        $data['page']  = 'pages/report/permonth';

        $this->view($data);
    }

    public function peryears()
    {
        $tahun = $this->input->post('tahun');
        $data['title'] = 'Laporan Penjualan Tahunan';
        $data['tahun'] = $tahun;
        $data['report'] = $this->report_model->peryears($tahun);
        $data['page']  = 'pages/report/peryear';

        $this->view($data);
    }
}

/* End of file Report.php */
