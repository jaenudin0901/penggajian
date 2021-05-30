<?php
class Data_karyawan extends CI_Controller
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

        $data['judul'] = 'Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getAllDataKaryawan();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_karyawan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {

        $data['judul'] = '  Tambah Data Karyawan';
        $this->form_validation->set_rules('nama', 'Nama ', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('photo', 'foto', 'required');
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_karyawan', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->Karyawan_model->tambahDataKaryawan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil ditambahkan</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
            redirect('admin/Data_karyawan');
        }
    }

    public function hapus($id)
    {
        $this->Karyawan_model->hapusDataKaryawan($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil dihapus!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
        redirect('admin/Data_karyawan');
    }

    public function ubah()
    {

        $data['judul'] = 'Ubah Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getDataKaryawanById();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_karyawan', $data);
        $this->load->view('templates_admin/footer');
    }
}
