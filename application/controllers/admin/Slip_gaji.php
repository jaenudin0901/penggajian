<?php
class Slip_gaji extends CI_Controller
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
        $data['judul'] = "Slip Gaji Karywan";
        $data['karyawan'] = $this->Penggajian_model->get_data('data_karyawan')
            ->result_array();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_slip_gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetak_slip_gaji()
    {
        $data['judul'] = "Cetak Slip Gaji";
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        $nama = $this->input->post('nama');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan . $tahun;
        $data['print_slip'] = $this->db->query("SELECT data_karyawan.nik, data_karyawan.nama, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
        INNER JOIN data_jabatan  ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.bulan = '$bulantahun' AND data_kehadiran.nama='$nama'")->result_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak_slip_gaji', $data);
    }
}
