<?php
class Data_absensi extends CI_Controller
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
        $data['judul'] = 'Data Absensi Karyawan';

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['absensi'] = $this->db->query("SELECT  data_kehadiran.*, data_karyawan.nama, data_karyawan.jenis_kelamin, data_karyawan.jabatan 
        FROM data_kehadiran 
        INNER JOIN data_karyawan ON data_kehadiran.nik = data_karyawan.nik 
        INNER JOIN data_jabatan ON data_karyawan.jabatan = data_jabatan.nama_jabatan 
        WHERE data_kehadiran.bulan ='$bulantahun' 
        ORDER BY data_karyawan.nama ASC")->result_array();

        // $data['kehadiran']  = $this->Absensi_model->getAllDataAbsensi();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_absensi', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_absensi()
    {
        if ($this->input->post('submit', true) == 'submit') {

            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = array(
                        'bulan'  => $post['bulan'][$key],
                        'nik'  => $post['nik'][$key],
                        'nama'  => $post['nama'][$key],
                        'jenis_kelamin'  => $post['jenis_kelamin'][$key],
                        'nama_jabatan'  => $post['nama_jabatan'][$key],
                        'hadir'  => $post['hadir'][$key],
                        'sakit'  => $post['sakit'][$key],
                        'alpha'  => $post['alpha'][$key]
                    );
                }
            }
            $this->Absensi_model->insert_batch('data_kehadiran', $simpan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil ditambahkan</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
            redirect('admin/Data_absensi');
        }
        $data['judul'] = 'Form Input Absensi ';

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['inputAbsensi'] = $this->db->query("SELECT  data_karyawan.*, data_jabatan.nama_jabatan 
        FROM data_karyawan 
        INNER JOIN  data_jabatan ON data_karyawan.jabatan=data_jabatan.nama_jabatan  
        WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_karyawan.nik = data_kehadiran.nik) ORDER BY data_karyawan.nama ASC")->result_array();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_absensi', $data);
        $this->load->view('templates_admin/footer');
    }
}
