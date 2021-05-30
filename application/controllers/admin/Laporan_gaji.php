<?php
class Laporan_gaji extends CI_Controller
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
        $data['judul'] = "Laporan Gaji Karyawan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_laporan_gaji');
        $this->load->view('templates_admin/footer');
    }

    public function cetak_laporan_gaji()
    {
        $data['judul'] = 'Cetak Laporan Gaji Karyawan';
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data1['gaji'] = $this->db->query(
            "SELECT data_karyawan.nik,data_karyawan.nama, data_karyawan.jenis_kelamin, data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.transport, data_jabatan.uang_makan,data_kehadiran.alpha
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_karyawan.nama ASC"
        )->result_array();
        var_dump($data1);
        die;

        $this->load->view('templates_admin/header', $data);

        $this->load->view('admin/cetak_gaji', $data);
    }
}
