<?php
class Data_gaji extends CI_Controller
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

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('M');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        $data['judul'] = 'Data Gaji Karyawan';
        $data['gaji'] = $this->db->query(
            "SELECT data_karyawan.nik,data_karyawan.nama, data_karyawan.jenis_kelamin, data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.transport, data_jabatan.uang_makan,data_kehadiran.alpha
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_karyawan.nama ASC"
        )->result_array();
        // $data['jabatan'] = $this->Penggajian_model->get_data('data_jabatan')->result();
        // $data['jabatan'] = $this->Penggajian_model->getAllDataJabatan();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetak_gaji()
    {
        $data['judul'] = 'Cetak Gaji Karyawan';
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('M');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['gaji'] = $this->db->query(
            "SELECT data_karyawan.nik,data_karyawan.nama, data_karyawan.jenis_kelamin, data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.transport, data_jabatan.uang_makan,data_kehadiran.alpha
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_karyawan.nama ASC"
        )->result_array();
        $this->load->view('templates_admin/header', $data);

        $this->load->view('admin/cetak_gaji', $data);
    }
}
