<?php
class Laporan_absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['judul'] = "Laporan Absensi Karyawan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_laporan_absensi');
        $this->load->view('templates_admin/footer');
    }

    public function cetak_laporan_absensi()
    {
        $data['judul'] = "Cetak Laporan Absensi Karyawan";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $bulantahun = $bulan . $tahun;
        $data['laporan_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran
        WHERE bulan='$bulantahun'
        ORDER BY nama ASC")->result_array();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak_laporan_absensi', $data);
    }
}
