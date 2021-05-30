<?php
class Data_gaji  extends CI_Controller
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
        $data['judul'] = "Data Gaji";
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        $data['user'] = $this->db->get_where('data_karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $nik = $this->session->userdata('nik');

        $data['gaji'] = $this->db->query("SELECT data_karyawan.nama, data_karyawan.nik, data_jabatan.gaji_pokok, data_jabatan.transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan, data_kehadiran.id
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik= data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.nik='$nik'
        ORDER BY data_kehadiran.bulan DESC")->result_array();
        $this->load->view('templates_karyawan/header', $data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/data_gaji');
        $this->load->view('templates_karyawan/footer');
    }
    public function cetak_slip($id)
    {
        $data['judul'] = "Cetak Slip Gaji";
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        $data['print_slip'] = $this->db->query("SELECT data_karyawan.nik, data_karyawan.nama, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
        INNER JOIN data_jabatan  ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.id = '$id'")->result_array();
        $this->load->view('templates_karyawan/header', $data);
        $this->load->view('karyawan/cetak_slip_gaji', $data);
    }
}
